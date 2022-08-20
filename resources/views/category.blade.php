@extends('layouts')
@section('title', 'Kategori')
@section('content')
    <div class="main-content container">
        <div class="content-wrapper row">
            <div class="col-12 text-center content-header mb-4">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <button type="submit" class="input-group-text" id="basic-addon1">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </button>
                        <input type="text" name="tag_name" class="form-control custom-form-control" placeholder="Cari.."
                            aria-label="Cari.." value="{{ request()->tag_name }}">
                    </div>
                </form>
            </div>
            <div class="col-12 content-content mb-4">
                <div class="w-100 mb-4">
                    @foreach ($categories as $row)
                        <a href="?tag_name={{ str_replace('#', '', $row->tag_name) }}" style="text-decoration: none;"><span
                                class="hashtags">{{ $row->tag_name }}</span></a>
                    @endforeach
                </div>
                <div class="row w-100">
                    @foreach ($categories as $row)
                        <div class="col-6 col-md-4 mb-4">
                            <a href="{{ url("/template/$row->id") }}">
                                <img class="img-fluid rounded" src="{{ asset('category/' . $row->thumbnail) }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
