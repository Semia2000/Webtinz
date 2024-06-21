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




    // user list
    // activate and desactvate user
    public function userlist(){
        $users = User::all();
        return view('admin.UserManage.useraccount', compact('users'));
    }
}
