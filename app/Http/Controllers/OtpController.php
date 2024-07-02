<?php

namespace App\Http\Controllers;
use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    public function show()
    {
        return view('otp.otpverif');
    }
    public function successOtp()
    {
        return view('otp.sucessotp');
    }

    public function verify(Request $request)
    {
        // Valider le champ OTP si nécessaire
        // $request->validate([
        //     'otp' => 'required|numeric',
        // ]);
        $user = Auth::user();

        if ($request->otpcode == $user->otpcode) {
            // session(['otp_attempts' => 0]);
            $user->update(['is_otp_validate' => true]);
            return redirect()->route('successOtp')->with('success', 'Vérification réussie');
        } else {
            // $attempts++;
            // session(['otp_attempts' => $attempts]);
            return redirect()->back()->with('error', 'Code OTP incorrect');
        }
    }
    
    public function createNewOtp(){

        $user = Auth::user();
        // $userUpdate = User::where("id", $user->id)->first();
        $otp = rand(100000, 999999);
        // die($otp);
        Mail::to($user->email)->send(new \App\Mail\Otpmail($otp));
        // response()->json(['otp' => $otp]);

        session(['otp' => $otp]);

        return response()->json(['status' => 'success','otp' => $otp]);
    }
    
    public function verifyNewOtp(Request $request)
    {
        // Récupérer l'OTP soumis depuis la requête
        $otp = $request->input('otp');

        // Vérifier si l'OTP correspond à celui attendu (simulé ici)
        $expectedOtp = Session::get('otp'); // Vous devez ajuster cette valeur avec votre logique réelle

        if ($otp == $expectedOtp) {
            // L'OTP est valide
            return response()->json(['status' => 'success']);
        } else {
            // L'OTP est invalide
            return response()->json(['status' => 'error']);
        }

    }
}

