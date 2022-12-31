@extends('admin.layouts.main')
@section('title', 'Detail Member')
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
                                <table class="table table-sm table-hover">
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $row->fullname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $row->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Join</td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Point</td>
                                        <td><span class="badge bg-danger">{{ $row->point }}</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h4>History Member</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
