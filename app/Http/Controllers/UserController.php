<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\User;
use App\Mail\Otpmail;
use App\Models\Company;
use App\Models\Sectorbusiness;
use App\Models\Subscriptionplan;
use App\Models\Service;
use App\Models\ServiceUpgrade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User_subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function showcontactinfo(Request $request, $service_id){
        $service = Service::findOrFail($service_id);
        $sectorsbusiness = Sectorbusiness::orderBy('name', 'asc')->get();

        return view('front_include.contactinfo', ['service' => $service, 'sectorsbusiness' => $sectorsbusiness]);
    }

    public function storeContactInfo(Request $request){
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
    public function dashboarduserview(){
        $user = Auth::user();
        $services = Service::with(['template', 'subscription'])->where('user_id', $user->id)->get();
        return view('dashboarduser.dashboard', compact('user', 'services'));
    }
    public function viewtemplates(){
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

    // Current plan subscription
    public function currentPlan()
    {
        $user = Auth::user();
        $services = Service::with(['template', 'subscription'])->where('user_id', $user->id)->get();

        return view('dashboarduser.subscription.currentplan', compact('user', 'services'));
    }

    // New plan subscription for upgrades

    public function newupgradePlan()
    {
        $user = Auth::user();
        $services = Service::with(['template', 'subscription'])->where('user_id', $user->id)->get();
    
        // Filtrage des plans d'abonnement par type de service et ajout des upgrades
        $subscriptionsByServiceType = [];
        foreach ($services as $service) {
            // Récupérer le plan actif du service s'il existe
            $currentSubscription = $service->subscription;
    
            // Récupérer tous les plans d'abonnement pour ce type de service
            $subscriptionPlans = Subscriptionplan::where('typeservice', $service->service_type)->get();
    
            // Récupérer les upgrades pour ce service
            $upgradePlans = ServiceUpgrade::where('service_id', $service->id)->get();
    
            // Exclure le plan actif s'il existe des plans d'abonnement
            $filteredSubscriptionPlans = $subscriptionPlans->reject(function ($plan) use ($currentSubscription) {
                return $currentSubscription && $plan->id === $currentSubscription->id;
            });
    
            // Ajouter les données filtrées au tableau
            $subscriptionsByServiceType[$service->id] = [
                'current' => $currentSubscription,
                'upgrades' => $upgradePlans,
                'plans' => $filteredSubscriptionPlans,
            ];
        }
    
        return view('dashboarduser.subscription.newplan', compact('user', 'services', 'subscriptionsByServiceType'));
    }
    

    //Edit Profile
    public function showEditForm(Request $request){
        $user = Auth::user();
        $company = Company::where('user_id', $user->id)->first();

        $stateSelects = array();
        $stateSelects = DB::table('companys')->select('state')->get();
        // dd($stateSelects);
        return view('dashboarduser.myprofile', compact('company', 'stateSelects'));
    }

    public function updateCompany(Request $request){
        $user = Auth::user();
        $company = Company::where('user_id', $user->id)->first();

        $companyData = $request->validate([
            'name' => 'string | required',
            'email' => 'email | required',
            'address' => 'string | required',
            'tel' => 'required |string',
            'country' => 'string | required',
            'state' => 'string | required',
        ]);

        // firstname lastname pemail ptel
        $personalData = $request->validate([
            'firstname' => 'string | required',
            'lastname' => 'string | required',
            'pemail' => 'email | required',
            'ptel' => 'required |string',
        ]);

        // Personal information 
        $firstname = $request->input('firstname');
        $pemail = $request->input('pemail');
        $ptel = $request->input('ptel');
        $lastname = $request->input('lastname');

        // Mettre à jour les données de l'utilisateur
        $userUpdate = User::where("id", $user->id)->first();

        // $otp = rand(100000, 999999);  \Mail::to($user->email)->send(new \App\Mail\Otpmail($otp));


        $userUpdate->update([
            'firstname' => $firstname,
            'email' => $pemail,
            'tel' => $ptel,
            'lastname' => $lastname
        ]);

        if ($request->password != "") {
            // $userUpdate = User::where("id", $user->id)->first();
            $oldPass = $user->password;
            $oldPassInput = $request->Oldpassword;
            $newPassInput = $request->password;
            $confPasswordInput = $request->Confpassword;

            if ($newPassInput === $confPasswordInput) {

                if (Hash::check($oldPassInput, $oldPass)) {

                    if ($newPassInput === $oldPassInput) {

                        return back()->with("Error", "You can't use the same password like the old, please change it !");
                    } else {

                        $updateUserPass = $request->validate([
                            "password" => "string | min:8"
                        ]);

                        $updateUserPassHash = Hash::make($updateUserPass["password"]);

                        $userUpdate->update([
                            'password' => $updateUserPassHash  // Mise à jour du mot de passe dans la base de données
                        ]);
                    }
                } else {
                    return back()->with("Error", "The old password is wrong, Try again");
                }
            } else {
                return back()->with("Error", "The new password isn't confirm, Try again");
            }
        }

        $company->update($companyData);

        if ($company->update($companyData)) {

            return back()->with("Sucess", "Update Successfuly");
        } else {

            return back()->with("Error", "Error message");
        }
    }


}
