<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboarduser';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Check if the user account is active
        if ($user->status == 0) {
            Auth::logout(); // Déconnexion de l'utilisateur
            return redirect()->route('login')->with('error', 'Your account has been deactivated. Please contact the administrator.');
        }
    
        // Check if the user has validated OTP
        if (!$user->is_otp_validate) {
            // Auth::logout();
            return redirect()->route('otpverif')->with('warning', 'You need to check your OTP code.');
        }
    
        // Handle "Remember Me" functionality
        if ($request->has('remember')) {
            $this->guard()->setRememberDuration(1209600); // 14 days
        }


        // if admin roles : master_admin / admin_user / sale_manager / technical_manager
        if ($user->hasRole('master_admin') || $user->hasRole('admin_user') || $user->hasRole('sale_manager') || $user->hasRole('technical_manager')) {
            return redirect('/backoffice');
        }
        // Redirect to the intended path
        return redirect()->intended($this->redirectPath());
    }
    

}
