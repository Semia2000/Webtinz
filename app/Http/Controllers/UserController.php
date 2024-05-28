<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\User_subscription;
use App\Models\Subscriptionplan;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function showcontactinfo(Request $request)
    {
        $selectedService = $request->query('service');

        return view('front_include.contactinfo', ['selectedService' => $selectedService]);
    }
    public function storeContactInfo(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        $user->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'tel' => $request->input('tel'),
        ]);

        $companyData  = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'tel' => $request->input('tel'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'sector' => $request->input('sector'),
            'description' => $request->input('description'),
            'chiffre_affaire' => $request->input('chiffre_affaire'),
            'nbr_employes' => $request->input('nbr_employes')
        ];

        if ($user->company) {
            $user->company->update($companyData);
        } else {
            $company = new Company($companyData);
            $user->company()->save($company);
        }

        $selectedService = $request->input('selected_service');
        switch ($selectedService) {
            case 'option1':
                return redirect()->route('formsaboutcompany');
            case 'option2':
                return redirect()->route('formsecom');
            case 'option3':
                return redirect()->route('custumform');
            default:
                return redirect()->route('letstart'); // Option par défaut
        }
    }

    public function startservices()
    {
        return view('front_include.letstart');
    }

    // dashboard
    public function dashboarduserview()
    {
        return view('dashboarduser.dashboard');
    }


    //  subscription for user 
    public function saveplanSelection(Request $request)
    {
        // Valide les données du formulaire
        // $request->validate([
        //     'website_id' => 'required|integer',
        //     'plan_id' => 'required|integer|exists:subscriptionplans,id',
        // ]);

        // Récupère l'utilisateur authentifié
        $user = Auth::user();
        $userSubscription = new User_Subscription();
        $userSubscription->user_id = $user->id;
        $userSubscription->website_id = $request->input('website_id');
        $userSubscription->subscription_plan_id = $request->input('plan_id');
        $userSubscription->start_date = now();
        // Calcule la date de fin en fonction de la durée du plan sélectionné
        $plan = SubscriptionPlan::find($request->input('plan_id'));
        $userSubscription->end_date = now()->addMonths($plan->duration);
        $userSubscription->save();

        // Enregistrer l'id du plan dan website

        $website = Website::with('subscription', 'template')->findOrFail($request->input('website_id'));
        $website ->update(['subscription_id' => $request->input('plan_id')]);

        // subscription_summary
        return view('front_include.payement-process',compact('website'));

    }
}
