<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
    
        // $attempts = session('otp_attempts', 0);
        // if ($attempts >= 2) {
        //     Auth::logout();

        //     // Invalider la session actuelle
        //     $request->session()->invalidate();
    
        //     // Générer un nouveau token pour la session suivante
        //     $request->session()->regenerateToken();
            
        //     return redirect()->route('register')->with('error', 'You have exceeded the maximum number of attempts. Please sign up again with the correct email address.');
        // }

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
    
}

