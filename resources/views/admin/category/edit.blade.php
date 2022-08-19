@extends('admin.layouts.main')
@section('title', 'Ubah Kategori')
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
                            <form action="{{ url("admin/$uri/$row->id/edit") }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group mb-2">
                                            <label for="">Nama Kategori</label>
                                            <input type="text" name="tag_name"
                                                class="form-control @error('tag_name') is-invalid @enderror"
                                                value="{{ old('tag_name', $row->tag_name) }}" placeholder="Kategori"
                                                autocomplete="off">
                                            @error('tag_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Status Aktif <span class="text-danger">*</span></label>
                                            <select id="is_active" name="is_active"
                                                class="form-control @error('is_active') is-invalid @enderror">
                                                <option value="1" {{ $row->is_active ? 'selected' : null }}>Publish
                                                </option>
                                                <option value="0" {{ !$row->is_active ? 'selected' : null }}>Draft
                                                </option>
                                            </select>
                                            @error('is_active')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Thumbnail Gambar</label><br>
                                            @if ($row->thumbnail)
                                                <img id="target" src="{{ asset("category/$row->thumbnail") }}" alt="no image"
                                                    class="img-thumbnail" style="height: 150px">
                                            @else
                                                <img id="target" src="{{ asset('assets/images/user.jpeg') }}"
                                                    alt="no image" class="img-thumbnail" style="height: 150px">
                                            @endif
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
@endsection
