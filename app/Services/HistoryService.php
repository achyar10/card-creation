<?php

namespace App\Services;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HistoryService
{

    private $req;

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

    public function getByMember($member_id)
    {
        return History::where('member_id', $member_id)
            ->with('creation')
            ->orderBy('id', 'desc')->get();
    }

    public function getByMemberPage($member_id)
    {
        return History::where('member_id', $member_id)
            ->with('creation')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function getById($id)
    {
        return History::find($id);
    }

    public function create($via, $point, $member_id, $creation_id = null, $ip_address = null)
    {
        $data =  History::create([
            'via' => $this->_getVia($via),
            'point' => $point,
            'member_id' => $member_id,
            'ip_address' => $ip_address,
            'creation_id' => $creation_id,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = History::find($id);
        $data->via = $this->_getVia($this->req->via);
        $data->point = $this->req->point;
        $data->member_id = $this->req->member_id;
        $data->ip_address = $this->req->ip_address;
        $data->creation_id = $this->req->creation_id;
        $data->save();
        return $data;
    }

    public function delete($id)
    {
        $data = History::find($id);
        $data->delete();
        return $data;
    }

    private function _getVia($value): string {

        switch ($value) {
            case 'wa':
                $via = 'Share (Whatsapp)';
                break;

            case 'fb':
                $via = 'Share (Facebook)';
                break;

            case 'ig':
                $via = 'Share (Instagram)';
                break;

            case 'tw':
                $via = 'Share (Twitter)';
                break;

            case 'email':
                $via = 'Share (Email)';
                break;

            default:
                $via = 'Share (Email)';
                break;
        }

        return $via;
    }
}
