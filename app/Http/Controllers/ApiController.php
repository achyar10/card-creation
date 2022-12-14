<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use App\Services\CreationService;
use App\Services\HistoryService;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{

    protected $member;

    protected $history;

    protected $creation;

    public function __construct(Request $request)
    {
        $this->member = new MemberService($request);
        $this->history = new HistoryService($request);
        $this->creation = new CreationService($request);
    }

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
            'uuid' => Str::random(32),
            'member_id' => $request->member_id,
            'card_id' => $request->card_id,
        ]);
        return response()->json($save, 200);
    }

    public function updateCreation(Request $request)
    {
        Creation::where('id', $request->id)->update(['member_id' => $request->member_id]);
        return response()->json('OK', 200);
    }

    /**
     * Update member's point when sharing giftcard
     * and mark giftcard as shared.
     * route: POST /update-point
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePoint(Request $request)
    {
        // Check User credentials
        $session = auth()->guard('members')->user();
        if (!isset($session)) {
            return response(['error' => 'Not Authenticated'], Response::HTTP_FORBIDDEN);
        }

        $markAsShared = $this->creation->markAsShared($request->id, $request->via);

        if (!$markAsShared) {
            return response(['error' => 'Card already shared'], Response::HTTP_BAD_REQUEST);
        }

        $this->member->updatePoint($request->member_id, 10);
        $this->history->create($request->via, 10, $request->member_id, $request->id, $request->getClientIp());
        return response()->json([
            'message' => 'OK'
        ], 200);
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
