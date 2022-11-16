@extends('admin.layouts.main')
@section('title', 'Disclaimer')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $title }} </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route($uri) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group mb-2">
                                            <label for="">Deskripsi</label>
                                            <input id="x" type="hidden" name="description">
                                            <trix-editor input="x">{!! $row->description !!}
                                            </trix-editor>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid gap-2 mt-4">
                                            <button class="btn btn-success"><i class="bx bx-check"></i>
                                                Ubah</button>
                                            <a href="{{ route('dashboard') }}" class="btn btn-secondary"><i
                                                    class="bx bx-x"></i>
                                                Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
