<?php

namespace App\Services;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberService
{

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function getAll()
    {
        return Member::orderBy('name', 'asc')->paginate(10);
    }

    public function findAll()
    {
        return Member::orderBy('name', 'asc')->get();
    }

    public function getById($id)
    {
        return Member::find($id);
    }

    public function create()
    {
        $data =  Member::create([
            'name' => $this->req->name,
            'fullname' => $this->req->fullname,
            'email' => $this->req->email,
            'photo' => $this->req->photo,
            'phone' => $this->req->phone,
            'oauth_id' => $this->req->oauth_id,
        ]);
        return $data;
    }

    public function update($id)
    {
        $data = Member::find($id);
        $data->name = $this->req->name;
        $data->email = $this->req->email;
        $data->phone = $this->req->phone;
        $data->photo = $this->req->photo;
        $data->oauth_id = $this->req->oauth_id;
        $data->save();
        return $data;
    }

    public function updatePoint($id, $point)
    {
        $data = Member::where('id', $id)->increment('point', $point);
        return $data;
    }

    public function delete($id)
    {
        $data = Member::find($id);
        $data->delete();
        return $data;
    }

    public function signIn()
    {
        $check = Member::where('phone', $this->req->phone)->first();
        if ($check) {
            if (Hash::check($this->req->password, $check->password)) {
                return $check;
            }
            return false;
        }
        return false;
    }
}
