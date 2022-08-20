<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleCallbackFacebook(Request $request)
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $findMember = Member::where('oauth_id', $user->getId())->first();

            if ($findMember) {
                $request->session()->put('login_member', $findMember);
                return redirect()->intended(route('theme.category'));
            }
            $new = Member::create([
                'oauth_id' => $user->getId(),
                'oauth_from' => 'facebook',
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make('merdeka', ['rounds' => 10]),
            ]);
            $request->session()->put('login_member', $new);
            return redirect()->intended(route('theme.category'));
        } catch (\Throwable $th) {
            return redirect()->route('signIn');
        }
    }
}
