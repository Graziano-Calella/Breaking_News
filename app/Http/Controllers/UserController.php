<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function registerRetry(){
        Cookie::queue(Cookie::forget(strtolower(str_replace(' ', '_', config('app.name'))) . '_session'));
        Auth::user()->delete();
        return redirect('/register');
    }
    
    public function profile(){
        return view('user.profile');
    }
}
