<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Services\HistoryService;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function __construct(Request $request)
    {
        $this->member = new MemberService($request);
        $this->history = new HistoryService($request);
    }

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
                Auth::guard('members')->login($findMember);
                Member::where('id', $findMember->id)->update([
                    'photo' => $user->getAvatar(),
                    'name' => $user->getName(),
                ]);
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
                'photo' => $user->getAvatar(),
            ]);
            $this->member->updatePoint($new->id, 10);
            $this->history->create('Sign Up (Email)', 10, $new->id);
            $newMember = Member::where('id', $new->id)->first();
            Auth::guard('members')->login($newMember);
            return redirect()->intended(route('profile.update'));
        } catch (\Throwable $th) {
            return redirect()->route('signIn');
        }
    }
}
