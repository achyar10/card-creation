<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallbackGoogle(Request $request)
    {
        $user = Socialite::driver('google')->user();
        $findMember = Member::where('oauth_id', $user->getId())->first();

        if ($findMember) {
            $request->session()->put('login_member', $findMember);
            Auth::guard('members')->login($findMember);
            if (empty($findMember->fullname) && empty($findMember->phone)) {
                return redirect()->intended(route('profile.update'));
            }
            return redirect()->intended(route('profile'));
        }
        $new = Member::create([
            'oauth_id' => $user->getId(),
            'oauth_from' => 'google',
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'photo' => $user->getAvatar()
        ]);
        $newMember = Member::where('id', $new->id())->first();
        Auth::guard('members')->login($newMember);
        return redirect()->intended(route('profile.update'));
    }
}
