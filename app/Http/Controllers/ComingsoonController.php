<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comingsoon;

class ComingsoonController extends Controller
{
    //
    public function comingsoon(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:comingsoons,email',
            'companyname' => 'required|string',
            'tel' => 'required|string|max:20',
        ]);
    
        Comingsoon::create([
            'email' => $request->input('email'),
            'companyname' => $request->input('companyname'),
            'tel' => $request->input('tel'),
        ]);
        return redirect()->back()->with('message', 'Successfully submitted');
    }
    
}
