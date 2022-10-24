<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallbackGoogle(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $findMember = Member::where('oauth_id', $user->getId())->first();

            if ($findMember) {
                $request->session()->put('login_member', $findMember);
                return redirect()->intended(route('theme.category'));
            }
            $new = Member::create([
                'oauth_id' => $user->getId(),
                'oauth_from' => 'google',
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'photo' => $user->getAvatar()
            ]);
            $request->session()->put('login_member', $new);
            return redirect()->intended(route('theme.category'));
        } catch (\Throwable $th) {
            return redirect()->route('signIn');
        }
    }
}
