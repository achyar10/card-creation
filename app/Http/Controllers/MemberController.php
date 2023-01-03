<?php

namespace App\Http\Controllers;

use App\Services\CreationService;
use App\Services\HistoryService;
use App\Services\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function __construct(Request $request)
    {
        $this->member = new MemberService($request);
        $this->history = new HistoryService($request);
        $this->creation = new CreationService($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar Member';
        $data['uri'] = 'member';
        $data['rows'] = $this->member->findAll();
        $view = 'admin.member.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Member';
        $data['uri'] = 'member';
        $view = 'admin.member.create';
        return view($view, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->member->create();
        return redirect()->route('member')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Detail Member';
        $data['uri'] = 'member';
        $data['row'] = $this->member->getById($id);
        $data['histories'] = $this->history->getByMemberPage($id);
        $data['creations'] = $this->creation->getByMemberPage($id);
        // return $data;
        $view = 'admin.member.detail';
        return view($view, $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Ubah Member';
        $data['uri'] = 'member';
        $data['row'] = $this->member->getById($id);
        $view = 'admin.member.edit';
        return view($view, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $this->member->update($id);
        return redirect()->route('member')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->member->delete($request->id);
        return redirect()->route('member')->with('success', 'Data berhasil dihapus');
    }

    public function updateStatus($id)
    {
        $this->member->status($id);
        return redirect(url("/admin/member/$id/detail"))->with('success', 'Data berhasil diubah');
    }

    public function exportCSV($id)
    {
        $fileName = time() . '.csv';
        $rows = $this->history->getByMember($id);

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Via', 'Point', 'IP Address', 'Tanggal Share', 'Tanggal Buat Kartu');

        $callback = function () use ($rows, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($rows as $data) {
                $row['via']  = $data->via;
                $row['point']    = $data->point;
                $row['ip_address']    = $data->ip_address;
                $row['created_at']  = $data->created_at;
                $row['card_date']  = isset($data->creation) ? $data->creation->created_at : '-';

                fputcsv($file, array($row['via'], $row['point'], $row['ip_address'], $row['created_at'], $row['card_date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
