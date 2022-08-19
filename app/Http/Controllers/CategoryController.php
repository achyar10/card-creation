<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(Request $request)
    {
        $this->category = new CategoryService($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar Kategori';
        $data['uri'] = 'category';
        $data['rows'] = $this->category->getAll();
        $view = 'admin.category.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Kategori';
        $data['uri'] = 'category';
        $view = 'admin.category.create';
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
            'tag_name' => 'required',
        ]);
        $this->category->create();
        return redirect()->route('category')->with('success', 'Data berhasil ditambah');
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
        $data['uri'] = 'category';
        $data['row'] = $this->category->getById($id);
        $view = 'admin.category.edit';
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
            'tag_name' => 'required',
        ]);
        $this->category->update($id);
        return redirect()->route('category')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->category->delete($request->id);
        return redirect()->route('category')->with('success', 'Data berhasil dihapus');
    }
}
