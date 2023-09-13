<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests = User::whereHas('profile', function ($query) {
            $query->where('is_admin', NULL);
        })->get();
        $revisorRequests = User::whereHas('profile', function ($query) {
            $query->where('is_revisor', NULL);
        })->get();
        $writerRequests = User::whereHas('profile', function ($query) {
            $query->where('is_writer', NULL);
        })->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user){
        $user->profile->update([
            'is_admin' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso amministratore l\'utente scelto');
    }

    public function setRevisor(User $user){
        $user->profile->update([
            'is_revisor' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso revisore l\'utente scelto');
    }

    public function setWriter(User $user){
        $user->profile->update([
            'is_writer' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso redattore l\'utente scelto');
    }
}
