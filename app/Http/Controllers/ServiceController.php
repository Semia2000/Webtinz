<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Company;
use App\Models\Template;
use App\Models\Subscriptionplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
    //start servives
    public function startservices()
    {
        return view('front_include.letstart');
    }

    // Save service
    public function saveService(Request $request)
    {
        $request->validate([
            'service_type' => 'required|string|max:255',
        ]);

        $serviceType = $request->input('service_type');

        // Crée une nouvelle demande de service
        $service = Service::create([
            'user_id' => Auth::id(),
            'service_type' => $serviceType
        ]);

        return redirect()->route('contactinfo', ['service_id' => $service->id]);
    }

    // forms for service
    public function showFormgenerale($service_id)
    {
        $service = Service::findOrFail($service_id);
        $productcategorys = ProductCategory::orderBy('name', 'asc')->get();
        return view('front_include.formgenerale', compact('service','productcategorys'));
    }

    // save form service
    public function store(Request $request, $service_id)
    {
        try {
            $service = Service::findOrFail($service_id);

            // Valider les données du formulaire
            if ($service->service_type == 'ecom') {
                $request->validate([
                    'commerce_mode' => 'required|string',
                    'productcategory' => 'required|array',
                    'productcategory.*' => 'string',
                ]);
            } elseif ($service->service_type == 'web') {
                $request->validate([
                    'description' => 'required|string|max:255',
                    'others_services' => 'required|string|max:255',
                    'products_services' => 'required|string|max:255',
                    'sector' => 'required|string|max:255',
                ]);
            }


            // Mettre à jour les attributs du service
            $service->description = $request->input('description');
            $service->products_services = $request->input('products_services');
            $service->sector = $request->input('sector');
            $service->commerce_mode = $request->input('commerce_mode');
            $service->others_services = $request->input('others_services');

            // Traiter les champs 'productcategory'
            $productcategories = $request->input('productcategory');

            if (is_array($productcategories)) {
                $service->productcategory = implode(',', $productcategories);
            } else {
                $service->productcategory = $productcategories;
            }

            // Sauvegarder les changements
            $service->save();

            // Rediriger avec un message de succès
            return redirect()->route('summaryinfo', ['service_id' => $service->id])
                ->with('success', 'Template uploaded successfully');
        } catch (\Exception $e) {
            // Afficher l'erreur pour le débogage
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    // Summary page
    public function showsummarypage($service_id)
    {
        $user = auth()->user()->id;
        $service = Service::findOrFail($service_id);
        $companyinfo = Company::where('user_id', $user)->first();

        return view('websites.summarywebsite', compact('companyinfo', 'service'));
    }

    public function updateSummary(Request $request, $companyId, $service_id)
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


        // Mettre à jour les attributs du service
        $service->description = $request->input('description');
        $service->products_services = $request->input('products_services');
        $service->sector = $request->input('sector');
        $service->commerce_mode = $request->input('commerce_mode');
        $service->others_services = $request->input('others_services');

        // Traiter les champs 'productcategory'
        $productcategories = $request->input('productcategory');

        if (is_array($productcategories)) {
            $service->productcategory = implode(',', $productcategories);
        } else {
            $service->productcategory = $productcategories;
        }

        // Sauvegarder les changements
        $service->save();

        $servicetype = $service->service_type;
        $templates = Template::where('typeservice', $servicetype)->get();

        // Rediriger l'utilisateur vers une autre page après la mise à jour
        return view('front_include.choosetemplates', compact('templates', 'service'));
    }

    // Save template

    public function saveTemplateSelection(Request $request, $service_id)
    {
        $service = Service::findOrFail($service_id);
        $service->update(['template_id' => $request->input('template_id')]);

        return redirect()->route('viewsubscription', ['service_id' => $service->id])
            ->with(['message' => 'Template Successfully selected']);
    }


    // Save subscription
    public function viewsubscription($service_id)
    {
        $service = Service::findOrFail($service_id);
        $servicetype= $service->service_type;
        $subscriptionplans = Subscriptionplan::where('typeservice',$servicetype)->get();
        foreach ($subscriptionplans as $plan) {
            $plan->features = json_decode($plan->features);
        }
        return view('front_include.payement', compact('subscriptionplans', 'service'));
    }

    public function saveplanSelection(Request $request, $service_id)
    {
        // Valide les données du formulaire
        // $request->validate([
        //     'website_id' => 'required|integer',
        //     'plan_id' => 'required|integer|exists:subscriptionplans,id',
        // ]);

        // Récupère l'utilisateur authentifié
        $service = Service::findOrFail($service_id);

        $service->start_date = now();
        // Calcule la date de fin en fonction de la durée du plan sélectionné
        $plan = SubscriptionPlan::find($request->input('plan_id'));
        $service->end_date = now()->addMonths($plan->duration);
        $service->subscription_id = $request->input('plan_id');
        $service->save();


        // subscription_summary
        return view('front_include.payement-process', compact('service'));

    }

}
