<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User_subscription;
use App\Models\Subscriptionplan;
use App\Models\Website;
use App\Models\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function showcontactinfo(Request $request, $service_id)
    {
        $service = Service::findOrFail($service_id);

        return view('front_include.contactinfo', ['service' => $service]);
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
        return view('dashboarduser.dashboard');
    }
}
