@extends('admin.layouts.main')
@section('title', 'Tambah FAQ')
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
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group mb-2">
                                            <label for="">Judul</label>
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}" placeholder="Contoh: Cara membuat kartu"
                                                autocomplete="off">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Deskripsi</label>
                                            <input id="x" type="hidden" name="description">
                                            <trix-editor input="x">
                                            </trix-editor>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid gap-2 mt-4">
                                            <button class="btn btn-success"><i class="bx bx-check"></i>
                                                Simpan</button>
                                            <a href="{{ route($uri) }}" class="btn btn-secondary"><i class="bx bx-x"></i>
                                                Batal</a>
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

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#target').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#thumbnail").change(function() {
            readURL(this);
        });
    </script>
@endsection
