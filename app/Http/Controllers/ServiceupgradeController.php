<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Company;
use App\Models\Template;
use App\Models\Subscriptionplan;
use App\Models\ServiceUpgrade;
use Illuminate\Support\Facades\Auth;

class ServiceupgradeController extends Controller
{
    //
    public function serviceBegin($service_id)
    {
        $service = Service::findOrFail($service_id);
        $newServiceType = $service->service_type == 'web' ? 'ecom' : 'web';

        $serviceupgrade = ServiceUpgrade::create([
            'user_id' => Auth::user()->id,
            'service_id' => $service_id,
            'service_type' => $newServiceType,
        ]);
        return redirect()->route('showUpgradeForm', ['id' => $serviceupgrade->id]);
    }


    public function showUpgradeForm($id)
    {
        $serviceupgrade = ServiceUpgrade::find($id);
        $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
        return view('Upgrade.formsaboutcompany', compact('serviceupgrade', 'productcategorys'));
    }

    // save form service
    public function store(Request $request, $id)
    {
        try {
            $serviceupgrade = ServiceUpgrade::findOrFail($id);

            // Valider les données du formulaire
            if ($serviceupgrade->service_type == 'ecom') {
                $request->validate([
                    'commerce_mode' => 'required|string',
                    'productcategory' => 'required|array',
                    'productcategory.*' => 'string',
                ]);
            } elseif ($serviceupgrade->service_type == 'web') {
                $request->validate([
                    'description' => 'required|string|max:255',
                    'others_services' => 'required|string|max:255',
                    'products_services' => 'required|string|max:255',
                    'sector' => 'required|string|max:255',
                ]);
            }

            // Mettre à jour les attributs du service
            $serviceupgrade->description = $request->input('description');
            $serviceupgrade->products_services = $request->input('products_services');
            $serviceupgrade->sector = $request->input('sector');
            $serviceupgrade->commerce_mode = $request->input('commerce_mode');
            $serviceupgrade->others_services = $request->input('others_services');

            // Traiter les champs 'productcategory'
            $productcategories = $request->input('productcategory');

            if (is_array($productcategories)) {
                $serviceupgrade->productcategory = implode(',', $productcategories);
            } else {
                $serviceupgrade->productcategory = $productcategories;
            }
            // Sauvegarder les changements
            $serviceupgrade->save();

            // Rediriger avec un message de succès
            return redirect()->route('showUpgradesummary', ['id' => $serviceupgrade->id])
                ->with('success', 'Template uploaded successfully');
        } catch (\Exception $e) {
            // Afficher l'erreur pour le débogage
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    // Summary page

    public function showUpgradesummary($id)
    {
        $user = Auth::user()->id;
        $companyinfo = Company::where('user_id', $user)->first();
        $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
        $service = null; // Initialiser le service à null par défaut

        // Vérifier si le service d'upgrade existe dans la table ServiceUpgrade
        $serviceupgrade = ServiceUpgrade::find($id);

        // Si le service d'upgrade existe, charger les données du service d'upgrade
        if ($serviceupgrade) {
            $selectedSector = explode(',', $serviceupgrade->sector);
        } else {
            // Sinon, charger les données du service d'origine (service avec l'ID $id)
            $service = Service::findOrFail($id);
            $selectedSector = explode(',', $service->sector);
        }

        return view('Upgrade.Summarypage', compact('companyinfo', 'serviceupgrade', 'service', 'selectedSector', 'productcategorys'));
    }
    // public function showUpgradesummary($id)
    // {
    //     $user = Auth::user()->id;
    //     $serviceupgrade = ServiceUpgrade::findOrFail($id);
    //     $companyinfo = Company::where('user_id', $user)->first();
    //     $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
    //     $selectedSector = explode(',', $serviceupgrade->sector);

    //     return view('Upgrade.Summarypage', compact('companyinfo', 'serviceupgrade','selectedSector','productcategorys'));
    // }

    public function upgradeSummary(Request $request, $companyId, $id)
    {
        $company = Company::findOrFail($companyId);
        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'tel' => $request->input('tel'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
        ]);

        // Vérifier si l'entrée existe dans ServiceUpgrade
        $serviceupgrade = ServiceUpgrade::find($id);

        // Si $serviceupgrade n'existe pas, créer une nouvelle entrée
        if (!$serviceupgrade) {
            $service = Service::find($id);
            $serviceupgrade = new ServiceUpgrade();
            $serviceupgrade->user_id = Auth::user()->id;
            $serviceupgrade->service_id= $service->id;
            $serviceupgrade->service_type = $service->service_type;
        }

        // Valider les données du formulaire
        if ($serviceupgrade->service_type == 'ecom') {
            $request->validate([
                'commerce_mode' => 'required|string',
                'productcategory' => 'required',
            ]);
        } elseif ($serviceupgrade->service_type == 'web') {
            $request->validate([
                'description' => 'required|string|max:255',
                'others_services' => 'required|string|max:255',
                'products_services' => 'required|string|max:255',
                'sector' => 'required|string|max:255',
            ]);
        }

        // Mettre à jour les champs
        $serviceupgrade->description = $request->input('description');
        $serviceupgrade->products_services = $request->input('products_services');
        $serviceupgrade->sector = $request->input('sector');
        $serviceupgrade->commerce_mode = $request->input('commerce_mode');
        $serviceupgrade->others_services = $request->input('others_services');

        // Traiter les champs 'productcategory'
        $productcategories = $request->input('productcategory');

        if (is_array($productcategories)) {
            $serviceupgrade->productcategory = implode(',', $productcategories);
        } else {
            $serviceupgrade->productcategory = $productcategories;
        }

        // Sauvegarder les changements
        $serviceupgrade->save();

        $servicetype = $serviceupgrade->service_type;
        $templates = Template::where('typeservice', $servicetype)->get();

        // Redirection vers une autre page après la mise à jour
        return view('Upgrade.choosetemplate', compact('templates', 'serviceupgrade'));
    }



    // public function upgradeSummary(Request $request, $companyId, $id)
    // {
    //     $company = Company::findOrFail($companyId);
    //     $company->update([
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'address' => $request->input('address'),
    //         'tel' => $request->input('tel'),
    //         'country' => $request->input('country'),
    //         'state' => $request->input('state'),
    //     ]);

    //     $serviceupgrade = ServiceUpgrade::findOrFail($id);

    //     // Valider les données du formulaire
    //     if ($serviceupgrade->service_type == 'ecom') {
    //         $request->validate([
    //             'commerce_mode' => 'required|string',
    //             'productcategory' => 'required',
    //         ]);
    //     } elseif ($serviceupgrade->service_type == 'web') {
    //         $request->validate([
    //             'description' => 'required|string|max:255',
    //             'others_services' => 'required|string|max:255',
    //             'products_services' => 'required|string|max:255',
    //             'sector' => 'required|string|max:255',
    //         ]);
    //     }


    //     // $upgrade = new ServiceUpgrade();
    //     // $upgrade->user_id = Auth::user()->id;
    //     // $upgrade->service_id= $service->id;
    //     // $upgrade->service_type = $service->service_type;
    //     $serviceupgrade->description = $request->input('description');
    //     $serviceupgrade->products_services = $request->input('products_services');
    //     $serviceupgrade->sector = $request->input('sector');
    //     $serviceupgrade->commerce_mode = $request->input('commerce_mode');
    //     $serviceupgrade->others_services = $request->input('others_services');

    //     // Traiter les champs 'productcategory'
    //     $productcategories = $request->input('productcategory');

    //     if (is_array($productcategories)) {
    //         $serviceupgrade->productcategory = implode(',', $productcategories);
    //     } else {
    //         $serviceupgrade->productcategory = $productcategories;
    //     }

    //     // Sauvegarder les changements
    //     $serviceupgrade->save();

    //     $servicetype = $serviceupgrade->service_type;
    //     $templates = Template::where('typeservice', $servicetype)->get();

    //     // Rediriger l'utilisateur vers une autre page après la mise à jour
    //     return view('Upgrade.choosetemplate', compact('templates', 'serviceupgrade'));
    // }

    // Save template

    public function saveTemplateUpgrade(Request $request, $id)
    {
        $serviceupgrade = ServiceUpgrade::findOrFail($id);
        $serviceupgrade->update(['template_id' => $request->input('template_id')]);

        return redirect()->route('viewUpgradesubscription', ['id' => $serviceupgrade->id])
            ->with(['message' => 'Template Successfully selected']);
    }


    // Save subscription
    public function viewUpgradesubscription($id)
    {
        $serviceupgrade = ServiceUpgrade::findOrFail($id);
        $servicetype = $serviceupgrade->service_type;
        $subscriptionplans = Subscriptionplan::where('typeservice', $servicetype)->get();
        foreach ($subscriptionplans as $plan) {
            $plan->features = json_decode($plan->features);
        }
        return view('Upgrade.payment', compact('subscriptionplans', 'serviceupgrade'));
    }

    public function saveUpgradeplanSelection(Request $request, $id)
    {
        // Valide les données du formulaire
        // $request->validate([
        //     'website_id' => 'required|integer',
        //     'plan_id' => 'required|integer|exists:subscriptionplans,id',
        // ]);

        // Récupère l'utilisateur authentifié
        $serviceupgrade = ServiceUpgrade::findOrFail($id);
        $serviceupgrade->subscription_id = $request->input('plan_id');
        $serviceupgrade->save();


        // subscription_summary
        return view('Upgrade.payment-process', compact('serviceupgrade'));

    }


    // For modify final summary page :process-payment
    public function showallUpgradeTemplate($id)
    {
        $serviceupgrade = ServiceUpgrade::find($id);
        $templates = Template::where('typeservice', $serviceupgrade->service_type)->get();
        return view('Upgrade.choosetemplate', compact('serviceupgrade', 'templates'));
    }

}
