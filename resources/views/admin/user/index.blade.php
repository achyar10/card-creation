@extends('admin.layouts.main')
@section('title', 'Kelola Pengguna')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover data-tables table-sm">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rows as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->username }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->position }}</td>
                                                <td>{{ $row->phone }}</td>
                                                <td>
                                                    @if ($row->is_active == 1)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/admin/user/{{ $row->id }}/edit"
                                                        class="btn btn-primary btn-sm btn-rounded"><i class="bx bxs-pencil"></i></a>
                                                    <a href="/admin/user/{{ $row->id }}/delete"
                                                        class="btn btn-danger btn-sm btn-rounded"><i class="bx bxs-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
