<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriptionplan;
class SubscriptionplanController extends Controller
{
    //









    // admin
    public function showsubscriptionform()
    {
        return view('admin.Subscriptionplan.addsubscription');
    }

    public function addsubscription(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
        ]);

        // Création du plan avec les fonctionnalités converties en JSON
        $plans = Subscriptionplan::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'features' => json_encode($request->features), // Conversion en JSON
            'setupfee' =>$request->setupfee,
        ]);

        return redirect()->route('subscriptionlist')->with('success', 'Plan created successfully.');
    }

    // liste de tout les plans
    public function listsubscription()
    {
        $subscriptionplans = Subscriptionplan::all();
        return view('admin.Subscriptionplan.list',compact('subscriptionplans'));
    }

    public function view($id)
    {
        $subscriptionplan = Subscriptionplan::findOrFail($id);
        $subscriptionplan ->features = json_decode($subscriptionplan->features);
        return view('admin.Subscriptionplan.view', compact('subscriptionplan'));

    }
    // public function edit(Plan $plan)
    // {
    //     $plan->features = json_decode($plan->features);
    //     return view('admin.plans.edit', compact('plan'));
    // }
    public function edit($id)
    {
        $subscriptionplan = Subscriptionplan::findOrFail($id);
        $subscriptionplan ->features = json_decode($subscriptionplan->features);
        return view('admin.Subscriptionplan.update', compact('subscriptionplan'));

    }

    public function update(Request $request,$id)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
        ]);
        $Subscriptionplanid = Subscriptionplan::findOrFail($id);
        // Mise à jour du plan avec les fonctionnalités converties en JSON
        $Subscriptionplanid -> update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'description' => $request->description,
            'features' => json_encode($request->features), // Conversion en JSON
            'setupfee' =>$request->setupfee,
        ]);

        return redirect()->route('subscriptionlist')->with('success', 'Plan updated successfully.');
    }

    public function destroy(Rquest)
    {
        // Affiche une boîte de dialogue de confirmation avant la suppression
        if (confirm("Are you sure you want to delete this plan?")) {
            $plan->delete();
            return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully.');
        } else {
            // Si l'utilisateur annule, redirigez simplement sans effectuer la suppression
            return redirect()->route('admin.plans.index')->with('info', 'Plan deletion canceled.');
        }
    }
    
}
