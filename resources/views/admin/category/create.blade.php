@extends('admin.layouts.main')
@section('title', 'Tambah Kategori')
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
                                            <label for="">Nama Kategori</label>
                                            <input type="text" name="tag_name"
                                                class="form-control @error('tag_name') is-invalid @enderror"
                                                value="{{ old('tag_name') }}" placeholder="Contoh: Happy New Year"
                                                autocomplete="off">
                                            @error('tag_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Tags</label>
                                            <input type="text" name="tags"
                                                class="form-control tags-input @error('tags') is-invalid @enderror"
                                                placeholder="Contoh: #Newyear" value="{{ old('tags') }}"
                                                autocomplete="off">
                                            @error('tags')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Urutan Ke</label>
                                            <input type="number" name="order"
                                                class="form-control @error('order') is-invalid @enderror"
                                                value="{{ old('order') }}" placeholder="Contoh: 1" autocomplete="off">
                                            @error('order')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Status Aktif <span class="text-danger">*</span></label>
                                            <select id="is_active" name="is_active"
                                                class="form-control @error('is_active') is-invalid @enderror">
                                                <option value="1">Publish</option>
                                                <option value="0">Draft</option>
                                            </select>
                                            @error('is_active')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Thumbnail Gambar</label><br>
                                            <img id="target" src="{{ asset('assets/images/placeholder.jpg') }}"
                                                alt="no image" class="img-thumbnail" style="height: 150px;">
                                            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                            @error('thumbnail')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
