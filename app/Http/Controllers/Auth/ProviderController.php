<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class ProviderController extends Controller
{
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {
        try {
            $SocialUser = Socialite::driver($provider)->user();

            $profile = Profile::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id
            ])->first();

            if(!$profile){
                if(User::where('email', $SocialUser->getEmail())->exists()){
                    return redirect('/login')->withErrors(['email' => 'Questa email usa un metodo diverso per loggarsi']);
                }
                $user = User::create([
                    'name' => $SocialUser->getName(),
                    'email' => $SocialUser->getEmail(),
                    'password' => 'Pippo21@',
                ]);
                $user->markEmailAsVerified();

                $user->profile()->create([
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token
                ]);
            }else{
                $user = $profile->user;
            }
            
            Auth::login($user);
            return redirect('/');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
