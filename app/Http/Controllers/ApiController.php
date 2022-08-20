<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{

    public function uploadFile(Request $request)
    {
        $ext = $request->ext;
        $file = explode(',', $request->file);
        $path = null;

        if (!empty($file)) {
            $result = $this->upload($file[1], 'creations', $ext);
            $path = asset('creations/' . $result);
        }
        $save = Creation::create([
            'url_path' => $path,
            'member_id' => $request->member_id,
            'card_id' => $request->card_id,
        ]);
        return response()->json($save, 200);
    }

    public function upload($img, $path, $ext)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        $image_base64 = base64_decode($img);
        $fileName = uniqid() . '-' . time() . '.' . $ext;
        $process = file_put_contents($path . '/' . $fileName, $image_base64);
        if ($process === false) {
            return null;
        } else {
            return $fileName;
        }
    }
}
