<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class TwitterController extends Controller
{
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleCallbackTwitter(Request $request)
    {
        $user = Socialite::driver('twitter')->user();
        $findMember = Member::where('oauth_id', $user->getId())->first();

        if ($findMember) {
            $request->session()->put('login_member', $findMember);
            return redirect()->intended(route('theme.category'));
        }
        $new = Member::create([
            'oauth_id' => $user->getId(),
            'oauth_from' => 'twitter',
            'name' => $user->getName(),
            'email' => $user->getNickname(),
            'password' => Hash::make('merdeka', ['rounds' => 10]),
        ]);
        $request->session()->put('login_member', $new);
        return redirect()->intended(route('theme.category'));
    }
}
