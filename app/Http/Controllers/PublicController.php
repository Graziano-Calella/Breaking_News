<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('home', compact('articles'));
    }

    public function careers(){
        return view('user.careers');
    }

    public function careersSubmit(Request $request){
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user()->profile;
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        $adminEmails = User::whereHas('profile', function ($query) {
            $query->where('is_admin', true);
        })->pluck('email');

        foreach ($adminEmails as $adminEmail) {
            Mail::to($adminEmail)->send(new CareerRequestMail(compact('role', 'email', 'message')));
        }

        if (!$user) {
            $user = Auth::user()->profile()->create();
        }

        switch($role){
            case 'admin':
                $user->is_admin = NULL;
                break;
            case 'revisor':
                $user->is_revisor = NULL;
                break;
            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        $user->update();
        return redirect(route('home'))->with('message', 'Grazie per averci contattato!');
    }
}