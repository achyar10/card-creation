<?php

namespace App\Services;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HistoryService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return History::orderBy('id', 'desc')->paginate(10);
    }

    public function findAll()
    {
        return History::orderBy('id', 'desc')->get();
    }

    public function getById($id)
    {
        return History::find($id);
    }

    public function create()
    {
        $data =  History::create([
            'via' => $this->req->via,
            'point' => $this->req->point,
            'member_id' => $this->req->member_id,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = History::find($id);
        $data->via = $this->req->via;
        $data->point = $this->req->point;
        $data->member_id = $this->req->member_id;
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = History::find($id);
        $data->delete();
        return $data;
    }
}
