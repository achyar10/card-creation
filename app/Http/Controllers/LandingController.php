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
    }

    public function index()
    {
        $session = auth()->guard('members')->user();
        $point = $session ? $session->point : 0;
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
        $data['member'] = $session;
        $data['points'] = $this->showPoint($session->point);
        return view('profile.index', $data);
    }

    public function profileUpdate()
    {
        $session = auth()->guard('members')->user();
        if (!isset($session)) return redirect()->route('signIn');
        return view('profile.update');
    }

    public function profileUpdatePost()
    {
        $session = auth()->guard('members')->user();
        if (!isset($session)) return redirect()->route('signIn');

        $this->member->update($session->id);
        return redirect()->route('profile');
    }

    public function historyPoint()
    {
        $socials = [
            [
                'icon' => 'frontend/images/whatsapp.png',
                'name' => 'WhatsApp (Share)',
                'date' => date('d F'),
                'point' => '+10'
            ],
            [
                'icon' => 'frontend/images/email.png',
                'name' => 'Share (Email)',
                'date' => date('d F'),
                'point' => '+10'
            ],
            [
                'icon' => 'frontend/images/instagram.png',
                'name' => 'Instagram (Share)',
                'date' => date('d F'),
                'point' => '+10'
            ],
            [
                'icon' => 'frontend/images/twitter.png',
                'name' => 'Twitter (Share)',
                'date' => date('d F'),
                'point' => '+10'
            ],
            [
                'icon' => 'frontend/images/facebook.png',
                'name' => 'Facebook (Share)',
                'date' => date('d F'),
                'point' => '+10'
            ],
            [
                'icon' => 'frontend/images/email.png',
                'name' => 'Sign Up (Email)',
                'date' => date('d F'),
                'point' => '+10'
            ],
            [
                'icon' => 'frontend/images/signup.png',
                'name' => 'Sign Up',
                'date' => date('d F'),
                'point' => '+5'
            ],
        ];
        return view('profile.history', [
            'socials' => $socials
        ]);
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
