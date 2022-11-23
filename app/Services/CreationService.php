<?php

namespace App\Services;

use App\Models\Creation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreationService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return Creation::orderBy('created_at', 'asc')->paginate(10);
    }

    public function findAll()
    {
        return Creation::orderBy('name', 'asc')->get();
    }

    public function getById($id)
    {
        return Creation::find($id);
    }

    public function create()
    {
        $data =  Creation::create([
            'url_path' => $this->req->url_path,
            'uuid' => Str::random(32),
            'member_id' => $this->req->member_id,
            'card_id' => $this->req->card_id,
        ]);
        return $data;
    }

    /**
     * Mark giftcard as shared
     *
     * @param  integer  $id
     * @param  string  $via
     * @return boolean
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function markAsShared($id, $via)
    {
        $data = Creation::find($id);

        switch ($via) {
            case 'wa':
                if ($data->share_whatsapp === 0) {
                    $data->share_whatsapp = 1;
                } else {
                    return false;
                }
                break;
            case 'fb':
                if ($data->share_facebook === 0) {
                    $data->share_facebook = 1;
                } else {
                    return false;
                }
                break;
            case 'ig':
                if ($data->share_instagram === 0) {
                    $data->share_instagram = 1;
                } else {
                    return false;
                }
                break;
            case 'email':
                if ($data->share_email === 0) {
                    $data->share_email = 1;
                } else {
                    return false;
                }
                break;
            case 'tw':
                if ($data->share_twitter === 0) {
                    $data->share_twitter = 1;
                } else {
                    return false;
                }
                break;

            default:
                return false;
        }
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = Creation::find($id);
        $data->delete();
        return $data;
    }
}
