<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Sectorbusiness;
use App\Models\Subscriptionplan;
use App\Models\Service;
use App\Models\ServiceUpgrade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function showcontactinfo(Request $request, $service_id)
    {
        $service = Service::findOrFail($service_id);
        $sectorsbusiness = Sectorbusiness::orderBy('name','asc')->get();

        return view('front_include.contactinfo', ['service' => $service , 'sectorsbusiness'=>$sectorsbusiness]);
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

        $companyData = [
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
        $service = Service::findOrFail($request->input('selected_service_id'));

        $selectedService = $request->input('selected_service');

        if ($selectedService == 'web' || $selectedService == 'ecom') {
            return redirect()->route('formsaboutservices', ['service_id' => $service->id]);
        } elseif ($selectedService == 'Custom') {
            return redirect()->route('custumform');
        }

        return redirect()->route('letstart'); // Option par défaut
    }

    // dashboard
    public function dashboarduserview()
    {
        $user = Auth::user();
        $services = Service::with(['template', 'subscription'])->where('user_id', $user->id)->get();
        return view('dashboarduser.dashboard', compact('user', 'services'));
    }
    public function viewtemplates()
    {
        $user = Auth::user();
        $services = Service::with(['template', 'subscription'])->where('user_id', $user->id)->get();
        return view('dashboarduser.viewtemplates', compact('user', 'services'));
    }
    // public function subscriptionuser()
    // {
    //     $user = Auth::user();
    //     $services = Service::with(['template', 'subscription'])->where('user_id', $user->id)->get();

    //     // Filtrage des plans d'abonnement par type de service
    //     $subscriptionsByServiceType = [];
    //     foreach ($services as $service) {
    //         $subscriptionsByServiceType[$service->id] = Subscriptionplan::where('typeservice', $service->service_type)->get();
    //     }

    //     return view('dashboarduser.subscription', compact('user', 'services', 'subscriptionsByServiceType'));
    // }

    //  coming sonn submit

    public function subscriptionuser()
    {
        $user = Auth::user();
        $services = Service::with(['template', 'subscription'])->where('user_id', $user->id)->get();

        // Filtrage des plans d'abonnement par type de service et ajout des upgrades
        $subscriptionsByServiceType = [];
        foreach ($services as $service) {
            $subscriptionPlans = Subscriptionplan::where('typeservice', $service->service_type)->get();
            $upgradePlans = ServiceUpgrade::where('service_id', $service->id)->get();
            $subscriptionsByServiceType[$service->id] = [
                'current' => $service->subscription,
                'upgrades' => $upgradePlans,
                'plans' => $subscriptionPlans,
            ];
        }

        return view('dashboarduser.subscription', compact('user', 'services', 'subscriptionsByServiceType'));
    }




}
