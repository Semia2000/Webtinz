<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Str;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';


    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('check.old.password')->only('reset');
    }

    protected function resetPassword($user, $password)
    {
        \Log::info('Resetting password for user: ' . $user->email);
    
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
    
        $user->save();
    
        event(new PasswordReset($user));
    
        $this->guard()->login($user);
    
        \Log::info('Password reset successful, user logged in.');
    }

}
