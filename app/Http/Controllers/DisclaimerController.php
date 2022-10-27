<?php

namespace App\Http\Controllers;

use App\Services\DisclaimerService;
use Illuminate\Http\Request;

class DisclaimerController extends Controller
{

    public function __construct(Request $request)
    {
        $this->disclaimer = new DisclaimerService($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Disclaimer';
        $data['uri'] = 'disclaimer';
        $data['row'] = $this->disclaimer->first();
        $view = 'admin.disclaimer.index';
        return view($view, $data);
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
        $data['uri'] = 'disclaimer';
        $data['row'] = $this->disclaimer->getById($id);
        $view = 'admin.disclaimer.edit';
        return view($view, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);
        $row = $this->disclaimer->first();
        $this->disclaimer->update($row->id);
        return redirect()->route('disclaimer')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->disclaimer->delete($request->id);
        return redirect()->route('disclaimer')->with('success', 'Data berhasil dihapus');
    }
}
