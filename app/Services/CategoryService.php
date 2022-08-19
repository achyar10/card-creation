<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return Category::orderBy('id', 'desc')->paginate(10);
    }

    public function findAll()
    {
        return Category::orderBy('id', 'desc')->get();
    }

    public function getById($id)
    {
        return Category::find($id);
    }

    public function create()
    {
        $nameFile = null;
        if ($this->req->thumbnail) $nameFile = $this->upload('category', $this->req->thumbnail);
        $data =  Category::create([
            'tag_name' => $this->req->tag_name,
            'thumbnail' => $nameFile,
            'is_active' => $this->req->is_active,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = Category::find($id);
        $data->tag_name = $this->req->tag_name;
        $data->is_active = $this->req->is_active;
        if ($this->req->thumbnail) $data->thumbnail = $this->upload('category', $this->req->thumbnail);
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = Category::find($id);
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
