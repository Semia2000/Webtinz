<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function adminLogin(){
        return view('admin.adminlogin');
    }


    public function index(){
        return  view('admin.usersmanagement.index');
    }

    public function create(){
        //    $roles = Role::where('name', '!=', 'user')->get();
        
       $user = Auth::user();

       if ($user->role_id == 2) {
           $excludeRoles = [
               1, //"user"
           ];

           $roles = Role::whereNotIn('id', $excludeRoles)->get();
       } elseif($user->role_id == 3) {
           $excludeRoles = [
               1, //"user"
               2, //"master_admin",
           ];
           $roles = Role::whereNotIn('id', $excludeRoles)->get();

       } elseif($user->role_id == 4) {
           $excludeRoles = [
               1, //"user"
               2, //"master_admin",
               3, //"master_admin",
           ];
           $roles = Role::whereNotIn('id', $excludeRoles)->get();

       } elseif($user->role_id == 5) {
           $excludeRoles = [
               1, //"user"
               2, //"user"
               3, //"master_admin",
               4, //"master_admin",
           ];
           $roles = Role::whereNotIn('id', $excludeRoles)->get();
       }
        return view('admin.usersmanagement.create', compact('roles'));
    } 

    public function store(Request $request){
        
        $user = $request->validate([
            'firstname' =>'required|string|max:255',
            'lastname' =>'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password' =>'required|string|min:8|confirmed',
            'role_id' =>'required|integer',
            'right' => 'array|required',
            'right.*' => 'integer'
        ]);
        
        $user['password'] = Hash::make($user['password']);
        $user['is_otp_validate'] = 1;
        $user['otpcode'] = rand(200000, 999999);
        User::create($user);
 
        return back()->with('success', 'User created successfully.');

    }

    public function list(){
        
        $users = User::where('role_id','!=', 1)->get();
        
        return view('admin.usersmanagement.view', compact('users'));
    }

    public function edit(Request $request, $id){
        $user = User::findOrFail($id);
        $userAuth = Auth::user();
 
        if ($userAuth->role_id == 2) {
            $excludeRoles = [
                1, //"user"
            ];
 
            $roles = Role::whereNotIn('id', $excludeRoles)->get();
        } elseif($userAuth->role_id == 3) {
            $excludeRoles = [
                1, //"user"
                2, //"master_admin",
            ];
            $roles = Role::whereNotIn('id', $excludeRoles)->get();
 
        } elseif($userAuth->role_id == 4) {
            $excludeRoles = [
                1, //"user"
                2, //"master_admin",
                3, //"master_admin",
            ];
            $roles = Role::whereNotIn('id', $excludeRoles)->get();
 
        } elseif($userAuth->role_id == 5) {
            $excludeRoles = [
                1, //"user"
                2, //"user"
                3, //"master_admin",
                4, //"master_admin",
            ];
            $roles = Role::whereNotIn('id', $excludeRoles)->get();
        }

        return view('admin.usersmanagement.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        $userUpdate = User::where("id", $user->id)->first();
 
        $fields = $request->validate([
            'role_id' =>'required|integer',
            'right' => 'required',
            /*'right.*' => 'integer'*/
        ]);
        // dd($userUpdate->update($fields));
        $userUpdate->update($fields);

        return back()->with('success', 'User created successfully.');
    }

    public function updateStatus(Request $request, $id){

        $user = User::findOrFail($id);

        $userUpdate = User::where("id", $user->id)->first();
 
        $fields = $request->validate([
            'status' =>'required|integer',
        ]);
       // dd($fields);
        $userUpdate->update($fields);

        return back()->with('success', 'User status has been changed.');
    }
    public function listservices(){

        $servicesList = Service::all();

        return view('admin.usersmanagement.listservices', compact("servicesList"));
    }

    public function show($id){
        $serviceShow = Service::findOrFail($id);

        return view("admin.usersmanagement.servicedetails", compact("serviceShow"));
    }

    public function joinSalesOrTech($id){
        
        $salesManagers = User::where('role_id','=', 4)->get();
        $techManagers = User::where('role_id','=', 5)->get();
        $serviceShow = Service::findOrFail($id);

        return view("admin.usersmanagement.joinsalesortech", compact("serviceShow","salesManagers","techManagers", ));
    }

    public function joinSales(Request $request, $idproj){
        $idSales = $request->validate([
            'sales_id' =>'required|integer',
        ]);
        $service = Service::where('id', '=', $idproj);

        $service->update($idSales);

        return back()->with("success","Sales has be join to the project");
    }


    public function jointech(Request $request, $idproj){
        $idTech = $request->validate([
            'tech_id' =>'required|integer',
        ]);
        $service = Service::where('id', '=', $idproj);

        $service->update($idTech);
        
        return back()->with("success","Tech has be join to the project");
    }
}
