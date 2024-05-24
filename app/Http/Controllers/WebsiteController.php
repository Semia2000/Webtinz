<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Company;
use App\Models\Template;

class WebsiteController extends Controller
{
    public function showForm()
    {
        return view('websites.formsaboutcompany');
    }

    public function storeForm(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'others_services' => 'required|string|max:255',
            'products_services' => 'required|string|max:255',
            'sector' => 'required|array',  
            'sector.*' => 'string', 
        ]);

        $websiterequest = new Website();
        $websiterequest->description = $request->input('description');
        $websiterequest->products_services = $request->input('products_services');
        $websiterequest->sector = implode(',', $request->input('sector')); 
        $websiterequest->others_services = $request->input('others_services');
        $websiterequest->user_id = auth()->user()->id; 
        $websiterequest->save();

        return redirect()->route('summarywebsite')->with('success', 'Info enregistre!');

    }


    public function showsummarypage()
    {
        $user = auth()->user()->id;
        $companyinfo = Company::where('user_id', $user)->get();
        $websites = Website::where('user_id', $user)->latest()->first();

        return view('websites.summarywebsite',compact('companyinfo','websites'));
    }

    public function updateSummary()
    {

    // $request->validate([

    // ]);

    // $company = Company::findOrFail($companyId);
    // $company->update([

    // ]);


    // $website = Website::findOrFail($websiteId);
    // $website->update([

    // ]);
    
    $templates = Template::where('typeservice', 'web')->get();

    // Rediriger l'utilisateur vers une autre page après la mise à jour
    return view('front_include.choosetemplates',compact('templates'));
    }

}
