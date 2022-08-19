<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Services\CategoryService;
use App\Services\MemberService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __construct(Request $request)
    {
        $this->member = new MemberService($request);
        $this->category = new CategoryService($request);
    }

    public function index()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function category()
    {
        $data['categories'] = $this->category->findAll();
        return view('category', $data);
    }

    public function createMember(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required|unique:members',
        ]);
        $this->member->create();
        return redirect()->route('theme.category')->with('success', 'Data berhasil ditambah');
    }
}
