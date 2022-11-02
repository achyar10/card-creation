<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Creation;
use App\Services\CardService;
use App\Services\CategoryService;
use App\Services\DisclaimerService;
use App\Services\FaqService;
use App\Services\HistoryService;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function __construct(Request $request)
    {
        $this->member = new MemberService($request);
        $this->category = new CategoryService($request);
        $this->card = new CardService($request);
        $this->faq = new FaqService($request);
        $this->disclaimer = new DisclaimerService($request);
        $this->history = new HistoryService($request);
    }

    public function index()
    {
        $session = auth()->guard('members')->user();
        $point = $session ? $session->point : 888;
        $data['points'] = $this->showPoint($point);
        $data['categories'] = $this->category->getCaro();
        return view('welcome', $data);
    }

    public function login()
    {
        // $session = request()->session()->all();
        // if (isset($session['login_member'])) return redirect()->route('theme.category');
        return view('login');
    }

    public function profile()
    {
        $session = auth()->guard('members')->user();
        if (!isset($session)) return redirect()->route('signIn');

        if (!isset($session->fullname) && !isset($session->phone)) return redirect()->route('profile.update');

        $data['member'] = $session;
        $socials = [
            [
                'icon' => 'frontend/images/whatsapp.png',
                'name' => 'Share (Whatsapp)',
            ],
            [
                'icon' => 'frontend/images/email.png',
                'name' => 'Share (Email)',
            ],
            [
                'icon' => 'frontend/images/instagram.png',
                'name' => 'Share (Instagram)',
            ],
            [
                'icon' => 'frontend/images/twitter.png',
                'name' => 'Share (Twitter)',
            ],
            [
                'icon' => 'frontend/images/facebook.png',
                'name' => 'Share (Facebook)',
            ],
            [
                'icon' => 'frontend/images/email.png',
                'name' => 'Sign Up (Email)',
            ],
            [
                'icon' => 'frontend/images/signup.png',
                'name' => 'Sign Up',
            ],
        ];

        $histories = $this->history->getByMember($session->id);

        $result = [];
        foreach ($histories as $key) {
            foreach ($socials as $social) {
                if ($social['name'] == $key->via) {
                    array_push($result, [
                        'name' => $social['name'],
                        'icon' => $social['icon'],
                        'point' => $key->point,
                        'date' => date('d F Y')
                    ]);
                }
            }
        }
        // return $result;
        $data['socials'] = $result;
        $data['points'] = $this->showPoint($session->point);

        $data['leaderboards'] = $this->member->leaderboard();
        // return $members;
        return view('profile.index', $data);
    }

    public function profileUpdate()
    {
        $session = auth()->guard('members')->user();
        if (!isset($session)) return redirect()->route('signIn');
        return view('profile.update');
    }

    public function profileUpdatePost(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'phone' => 'required'
        ]);

        $session = auth()->guard('members')->user();
        if (!isset($session)) return redirect()->route('signIn');

        $this->member->update($session->id);

        if (isset($request->fullname)) {
            $this->member->updatePoint($session->id, 10);
            $this->history->create('Sign Up', 10, $session->id);
        }
        if (isset($request->phone)) {
            $this->member->updatePoint($session->id, 10);
            $this->history->create('Sign Up', 10, $session->id);
        }

        return redirect()->route('profile');
    }

    public function historyPoint()
    {
        $session = auth()->guard('members')->user();
        $socials = [
            [
                'icon' => 'frontend/images/whatsapp.png',
                'name' => 'Share (Whatsapp)',
            ],
            [
                'icon' => 'frontend/images/email.png',
                'name' => 'Share (Email)',
            ],
            [
                'icon' => 'frontend/images/instagram.png',
                'name' => 'Share (Instagram)',
            ],
            [
                'icon' => 'frontend/images/twitter.png',
                'name' => 'Share (Twitter)',
            ],
            [
                'icon' => 'frontend/images/facebook.png',
                'name' => 'Share (Facebook)',
            ],
            [
                'icon' => 'frontend/images/email.png',
                'name' => 'Sign Up (Email)',
            ],
            [
                'icon' => 'frontend/images/signup.png',
                'name' => 'Sign Up',
            ],
        ];

        $histories = $this->history->getByMember($session->id);

        $result = [];
        foreach ($histories as $key) {
            foreach ($socials as $social) {
                if ($social['name'] == $key->via) {
                    array_push($result, [
                        'name' => $social['name'],
                        'icon' => $social['icon'],
                        'point' => $key->point,
                        'date' => date('d F Y')
                    ]);
                }
            }
        }
        // return $result;
        $data['points'] = $this->showPoint($session->point);
        $data['socials'] = $result;
        return view('profile.history', $data);
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

    public function logout()
    {
        Auth::guard('members')->logout();
        return redirect()->route('home');
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
        $data['cards'] = $this->card->findAll();
        $categories = Category::where('is_active', true)->get();
        $tags = [];
        // foreach ($categories as $key) {
        //     $pieces = json_decode($key->tags);
        //     if (count((array)$pieces) > 1) {
        //         for ($i = 0; $i < count((array)$pieces); $i++) {
        //             array_push($tags, $pieces[$i]->value);
        //         }
        //     }
        // }
        $data['tags'] = $categories;
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
        $data['row'] = $this->card->getById($id);
        return view('editor', $data);
    }

    public function share($id)
    {
        $data['row'] = Creation::where('id', $id)->first();
        return view('share', $data);
    }

    public function preview($uuid)
    {
        $data['row'] = Creation::where('uuid', $uuid)->first();
        return view('preview', $data);
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



    private function showPoint($point)
    {
        $digit = str_pad($point, 3, '0', STR_PAD_LEFT);
        $points = [];
        for ($i = 0; $i < strlen($digit); $i++) {
            array_push($points, $digit[$i]);
        }
        return $points;
    }
}
