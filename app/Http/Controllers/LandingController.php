<?php

namespace App\Http\Controllers;

use App\Services\CardService;
use App\Services\CategoryService;
use App\Services\MemberService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __construct(Request $request)
    {
        $this->member = new MemberService($request);
        $this->category = new CategoryService($request);
        $this->card = new CardService($request);
    }

    public function index()
    {
        return view('welcome');
    }

    public function login()
    {
        $session = request()->session()->all();
        if (isset($session['login_member'])) return redirect()->route('theme.category');
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $request->validate(['phone' => 'required', 'password' => 'required']);

        if ($this->member->signIn()) {
            $session = $this->member->signIn();
            $request->session()->put('login_member', $session);
            return redirect()->intended(route('theme.category'));
        }
        return redirect()->route('signIn')->with('error', 'No Handphone atau Password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('login_member');
        return redirect()->route('signIn');
    }

    public function register()
    {
        $session = request()->session()->all();
        if (isset($session['login_member'])) return redirect()->route('theme.category');
        return view('register');
    }

    public function category()
    {
        $session = request()->session()->all();
        if (!isset($session['login_member'])) return redirect()->route('signIn');
        $data['categories'] = $this->category->findAll();
        return view('category', $data);
    }

    public function template($id)
    {
        $session = request()->session()->all();
        if (!isset($session['login_member'])) return redirect()->route('signIn');
        $data['row'] = $this->category->getByIdCards($id);
        return view('template', $data);
    }

    public function editor($id)
    {
        $session = request()->session()->all();
        if (!isset($session['login_member'])) return redirect()->route('signIn');
        $data['row'] = $this->card->getById($id);
        return view('editor', $data);
    }

    public function createMember(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required|unique:members',
        ]);
        $data = $this->member->create();
        $request->session()->put('login_member', $data);
        return redirect()->route('theme.category')->with('success', 'Data berhasil ditambah');
    }
}
