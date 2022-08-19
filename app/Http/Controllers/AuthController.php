<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(Request $request)
    {
        $this->auth = new UserService($request);
    }

    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $request->validate(['username' => 'required', 'password' => 'required']);

        if ($this->auth->signIn()) {
            $session = $this->auth->signIn();
            Auth::login($session);
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->route('login')->with('error', 'Username atau Password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
