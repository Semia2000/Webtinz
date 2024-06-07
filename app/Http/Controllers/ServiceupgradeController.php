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

    // public function showUpgradeForm($service_id)
    // {
    //     $service = Service::find($service_id);
    //     $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
    //     return view('Upgrade.formsaboutcompany', compact('service','productcategorys'));
    // }

    // // save form service
    // public function store(Request $request, $service_id)
    // {
    //     try {
    //         $service = Service::findOrFail($service_id);

    //         // Valider les données du formulaire
    //         if ($service->service_type == 'ecom') {
    //             $request->validate([
    //                 'commerce_mode' => 'required|string',
    //                 'productcategory' => 'required|array',
    //                 'productcategory.*' => 'string',
    //             ]);
    //         } elseif ($service->service_type == 'web') {
    //             $request->validate([
    //                 'description' => 'required|string|max:255',
    //                 'others_services' => 'required|string|max:255',
    //                 'products_services' => 'required|string|max:255',
    //                 'sector' => 'required|string|max:255',
    //             ]);
    //         }

    //         // Mettre à jour les attributs du service
            // $upgrade = new ServiceUpgrade();
            // $upgrade->user_id = Auth::user()->id;
            // $upgrade->service_type = $service->service_type;
    //         $upgrade->description = $request->input('description');
    //         $upgrade->products_services = $request->input('products_services');
    //         $upgrade->sector = $request->input('sector');
    //         $upgrade->commerce_mode = $request->input('commerce_mode');
    //         $upgrade->others_services = $request->input('others_services');

    //         // Traiter les champs 'productcategory'
    //         $productcategories = $request->input('productcategory');

    //         if (is_array($productcategories)) {
    //             $upgrade->productcategory = implode(',', $productcategories);
    //         } else {
    //             $upgrade->productcategory = $productcategories;
    //         }

    //         // Sauvegarder les changements
    //         $upgrade->save();

    //         // Rediriger avec un message de succès
    //         return redirect()->route('showUpgradesummary', ['service_id' => $service->id])
    //             ->with('success', 'Template uploaded successfully');
    //     } catch (\Exception $e) {
    //         // Afficher l'erreur pour le débogage
    //         return back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }



    // Summary page
    public function showUpgradesummary($service_id)
    {
        $user = Auth::user()->id;
        $service = Service::findOrFail($service_id);
        $companyinfo = Company::where('user_id', $user)->first();
        $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
        $selectedSector = explode(',', $service->sector);

        return view('Upgrade.Summarypage', compact('companyinfo', 'service','selectedSector','productcategorys'));
    }

    public function upgradeSummary(Request $request, $companyId, $service_id)
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

        $service = Service::findOrFail($service_id);

        // Valider les données du formulaire
        if ($service->service_type == 'ecom') {
            $request->validate([
                'commerce_mode' => 'required|string',
                'productcategory' => 'required',
            ]);
        } elseif ($service->service_type == 'web') {
            $request->validate([
                'description' => 'required|string|max:255',
                'others_services' => 'required|string|max:255',
                'products_services' => 'required|string|max:255',
                'sector' => 'required|string|max:255',
            ]);
        }


        $upgrade = new ServiceUpgrade();
        $upgrade->user_id = Auth::user()->id;
        $upgrade->service_id= $service->id;
        $upgrade->service_type = $service->service_type;
        $upgrade->description = $request->input('description');
        $upgrade->products_services = $request->input('products_services');
        $upgrade->sector = $request->input('sector');
        $upgrade->commerce_mode = $request->input('commerce_mode');
        $upgrade->others_services = $request->input('others_services');

        // Traiter les champs 'productcategory'
        $productcategories = $request->input('productcategory');

        if (is_array($productcategories)) {
            $upgrade->productcategory = implode(',', $productcategories);
        } else {
            $upgrade->productcategory = $productcategories;
        }

        // Sauvegarder les changements
        $upgrade->save();

        $servicetype = $upgrade->service_type;
        $templates = Template::where('typeservice', $servicetype)->get();

        // Rediriger l'utilisateur vers une autre page après la mise à jour
        return view('Upgrade.choosetemplate', compact('templates', 'upgrade'));
    }

    // Save template

    public function saveTemplateUpgrade(Request $request, $upgrade_id)
    {
        $upgrade = ServiceUpgrade::findOrFail($upgrade_id);
        $upgrade->update(['template_id' => $request->input('template_id')]);

        return redirect()->route('viewUpgradesubscription', ['upgrade_id' => $upgrade->id])
            ->with(['message' => 'Template Successfully selected']);
    }


    // Save subscription
    public function viewUpgradesubscription($upgrade_id)
    {
        $upgrade = ServiceUpgrade::findOrFail($upgrade_id);
        $servicetype= $upgrade->service_type;
        $subscriptionplans = Subscriptionplan::where('typeservice',$servicetype)->get();
        foreach ($subscriptionplans as $plan) {
            $plan->features = json_decode($plan->features);
        }
        return view('Upgrade.payment', compact('subscriptionplans', 'upgrade'));
    }

    public function saveUpgradeplanSelection(Request $request, $service_id)
    {
        // Valide les données du formulaire
        // $request->validate([
        //     'website_id' => 'required|integer',
        //     'plan_id' => 'required|integer|exists:subscriptionplans,id',
        // ]);

        // Récupère l'utilisateur authentifié
        $upgrade = ServiceUpgrade::findOrFail($service_id);
        $upgrade->subscription_id = $request->input('plan_id');
        $upgrade->save();
        

        // subscription_summary
        return view('Upgrade.payment-process', compact('upgrade'));

    }


    // For modify final summary page :process-payment
        public function showallUpgradeTemplate($upgrade_id)
    {
        $upgrade = ServiceUpgrade::find($upgrade_id);
        $templates = Template::where('typeservice',$upgrade->service_type)->get();
        return view('Upgrade.choosetemplate',compact('upgrade','templates'));
    }

}
