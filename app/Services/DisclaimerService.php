<?php

namespace App\Services;

use App\Models\Disclaimer;
use Illuminate\Http\Request;

class DisclaimerService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return Disclaimer::orderBy('id', 'desc')->paginate(10);
    }

    public function findAll()
    {
        return Disclaimer::orderBy('id', 'desc')->get();
    }

    public function getById($id)
    {
        return Disclaimer::find($id);
    }

    public function first()
    {
        return Disclaimer::first();
    }

    public function create()
    {
        $data =  Disclaimer::create([
            'description' => $this->req->description,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = Disclaimer::find($id);
        $data->description = $this->req->description;
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = Disclaimer::find($id);
        $data->delete();
        return $data;
    }
}
