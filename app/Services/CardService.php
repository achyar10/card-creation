<?php

namespace App\Services;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CardService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return Card::with('category')->orderBy('id', 'desc')->paginate(10);
    }

    public function findAll()
    {
        $query = Card::where('is_active', true)->orderBy('id', 'desc');
        if (isset($this->req->q)) {
            $query->where('name', 'like', '%' . $this->req->q . '%');
        }
        if (isset($this->req->category_id)) {
            $query->where('category_id', $this->req->category_id);
        }
        return $query->get();
    }

    public function getById($id)
    {
        return Card::with('category')->find($id);
    }

    public function create()
    {
        $nameFile = null;
        if ($this->req->image) $nameFile = $this->upload('card', $this->req->image);
        $data =  Card::create([
            'name' => $this->req->name,
            'category_id' => $this->req->category_id,
            'image' => $nameFile,
            'is_active' => $this->req->is_active,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = Card::find($id);
        $data->name = $this->req->name;
        $data->category_id = $this->req->category_id;
        $data->is_active = $this->req->is_active;
        if ($this->req->image) $data->image = $this->upload('card', $this->req->image);
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = Card::find($id);
        $data->delete();
        return $data;
    }

    public function upload($path, $image)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        $nameFile = time() . '.' . $image->extension();
        $image->move(public_path($path), $nameFile);
        return $nameFile;
    }
}
