<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Creation;
use App\Services\CardService;
use App\Services\CategoryService;
use App\Services\DisclaimerService;
use App\Services\FaqService;
use App\Services\MemberService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __construct(Request $request)
    {
        $this->member = new MemberService($request);
        $this->category = new CategoryService($request);
        $this->card = new CardService($request);
        $this->faq = new FaqService($request);
        $this->disclaimer = new DisclaimerService($request);
    }

    public function index()
    {
        return view('welcome');
    }

    public function login()
    {
        // $session = request()->session()->all();
        // if (isset($session['login_member'])) return redirect()->route('theme.category');
        return view('login');
    }

    public function profile()
    {
        // $session = request()->session()->all();
        // if (isset($session['login_member'])) return redirect()->route('theme.category');
        return view('profile.index');
    }

    public function historyPoint()
    {
        return view('profile.history');
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
        // $session = request()->session()->all();
        // if (isset($session['login_member'])) return redirect()->route('theme.category');
        return view('register');
    }

    public function faq()
    {
        $data['faqs'] = $this->faq->findAll();
        return view('faq', $data);
    }

    public function disclaimer()
    {
        $data['disclaimer'] = $this->disclaimer->first();
        return view('disclaimer', $data);
    }

    public function category()
    {
        // $session = request()->session()->all();
        // if (!isset($session['login_member'])) return redirect()->route('signIn');
        $data['categories'] = $this->category->findAll();
        $categories = Category::where('is_active', true)->get();
        $tags = [];
        foreach ($categories as $key) {
            $pieces = json_decode($key->tags);
            if (count((array)$pieces) > 1) {
                for ($i = 0; $i < count((array)$pieces); $i++) {
                    array_push($tags, $pieces[$i]->value);
                }
            }
        }
        $data['tags'] = $tags;
        return view('category', $data);
    }

    public function template($id)
    {
        // $session = request()->session()->all();
        // if (!isset($session['login_member'])) return redirect()->route('signIn');
        $data['row'] = $this->category->getByIdCards($id);
        return view('template', $data);
    }

    public function editor($id)
    {
        // $session = request()->session()->all();
        // if (!isset($session['login_member'])) return redirect()->route('signIn');
        $data['row'] = $this->card->getById($id);
        // $data['member_id'] = $session['login_member']->id;
        return view('editor', $data);
    }

    public function share($id)
    {
        // $session = request()->session()->all();
        // if (!isset($session['login_member'])) return redirect()->route('signIn');
        $data['row'] = Creation::where('id', $id)->first();
        return view('share', $data);
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
