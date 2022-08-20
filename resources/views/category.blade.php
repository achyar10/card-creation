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
                        <input type="text" name="tags" class="form-control custom-form-control" placeholder="Cari.."
                            aria-label="Cari.." value="{{ request()->tags }}">
                    </div>
                </form>
            </div>
            <div class="col-12 content-content mb-4">
                <div class="w-100 mb-4">
                    @foreach ($tags as $row)
                        <a href="?tags={{ str_replace('#', '', $row) }}" style="text-decoration: none;"><span
                                class="hashtags">{{ $row }}</span></a>
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
