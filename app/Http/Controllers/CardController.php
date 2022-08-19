<?php

namespace App\Http\Controllers;

use App\Services\CardService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function __construct(Request $request)
    {
        $this->card = new CardService($request);
        $this->category = new CategoryService($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar Kartu';
        $data['uri'] = 'card';
        $data['rows'] = $this->card->getAll();
        $view = 'admin.card.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Kartu';
        $data['uri'] = 'card';
        $data['categories'] = $this->category->findAll();
        $view = 'admin.card.create';
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
            'name' => 'required',
            'category_id' => 'required'
        ]);
        $this->card->create();
        return redirect()->route('card')->with('success', 'Data berhasil ditambah');
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
        $data['title'] = 'Ubah Kartu';
        $data['uri'] = 'card';
        $data['row'] = $this->card->getById($id);
        $data['categories'] = $this->category->findAll();
        $view = 'admin.card.edit';
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
            'name' => 'required',
            'category_id' => 'required'
        ]);
        $this->card->update($id);
        return redirect()->route('card')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->card->delete($request->id);
        return redirect()->route('card')->with('success', 'Data berhasil dihapus');
    }
}
