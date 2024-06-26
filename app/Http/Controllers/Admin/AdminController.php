<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;

class AdminController extends Controller
{
    
    // send news letter to All user
    public function shownewsletterForm()
    {
        return view('admin.Newsletter.welcomealluser');
    }

    public function sendnewsletter(Request $request)
    {
        $subject = $request->input('subject');
        $content = $request->input('content');

        // Récupérez tous les utilisateurs
        $users = User::all();

        // Envoyez un email à chaque utilisateur
        foreach ($users as $user) {
            Mail::to($user->email)->send(new \App\Mail\SendNewsletter($subject, $content));
        }

        // Redirigez avec un message de succès
        return redirect()->back()->with('success', 'Email sent to all users.');
    }
}
