<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceUpgrade;
use App\Models\User;

use Illuminate\Http\Request;

class UsermanageController extends Controller
{
    //Manage subscription
    // confirm whether the site is deployed or not
    public function UserSubscription(){
        $services = Service::with(['template', 'subscription','user'])->get();

        return view('admin.UserManage.subscriptionmanage', compact('services'));
    }

    public function toggleDeployment($service_id, $action)
    {
        $service = Service::with(['subscription'])->findOrFail($service_id);
        if ($action == 'deployed') {
            // remplir la table subscription
            $service->start_date = now();
            // Calcule la date de fin en fonction de la durée du plan sélectionné
            $service->end_date = now()->addMonths($service->subscription->duration);
            $service->is_deployed = 1;
            $service->save();
        } elseif ($action == 'nodeployed') {
            $service->is_deployed = 0;
            $service->save();
        }

        // Redirection ou réponse appropriée
        return redirect()->back()->with('success', 'Operation successfully completed.');
    }

    // user list
    // activate and desactvate user
    public function userlist(){
        $users = User::all();
        return view('admin.UserManage.useraccount', compact('users'));
    }

    public function activate(User $user)
    {
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'User successfully activated.');
    }
    
    public function deactivate(User $user)
    {
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('success', 'User successfully disabled.');
    }
    
    // user purchase history
    public function userpurchasehistory()
    {
        $services = Service::with(['template', 'subscription','user'])->get();

        return view('admin.UserManage.subscriptionmanage', compact('services'));
    }
}
