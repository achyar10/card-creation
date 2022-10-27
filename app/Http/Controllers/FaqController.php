<?php

namespace App\Http\Controllers;

use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function __construct(Request $request)
    {
        $this->faq = new FaqService($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar FAQ';
        $data['uri'] = 'faq';
        $data['rows'] = $this->faq->getAll();
        $view = 'admin.faq.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah FAQ';
        $data['uri'] = 'faq';
        $view = 'admin.faq.create';
        return view($view, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $this->faq->create();
        return redirect()->route('faq')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Ubah Kategori';
        $data['uri'] = 'faq';
        $data['row'] = $this->faq->getById($id);
        $view = 'admin.faq.edit';
        return view($view, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $this->faq->update($id);
        return redirect()->route('faq')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->faq->delete($request->id);
        return redirect()->route('faq')->with('success', 'Data berhasil dihapus');
    }
}
