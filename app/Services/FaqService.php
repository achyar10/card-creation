<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return Faq::orderBy('id', 'desc')->paginate(10);
    }

    public function findAll()
    {
        return Faq::orderBy('id', 'desc')->get();
    }

    public function getById($id)
    {
        return Faq::find($id);
    }

    public function create()
    {
        $data =  Faq::create([
            'title' => $this->req->title,
            'description' => $this->req->description,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = Faq::find($id);
        $data->title = $this->req->title;
        $data->description = $this->req->description;
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = Faq::find($id);
        $data->delete();
        return $data;
    }
}
