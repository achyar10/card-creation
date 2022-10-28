@extends('layouts')
@section('title', 'Kategori')
@section('content')
<div class="main-content">
    <div class="section__bg">
        <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
    </div>
    <section class="section">
        <div class="section__content container">
            <div class="col-12 text-center content-header mb-4">
                <img height="150px" src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                <h5 class="my-3">Momen</h5>

                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" name="tags" class="form-control custom-form-control" placeholder="Cari.." aria-label="Cari.." value="{{ request()->tags }}">
                        <button type="submit" class="input-group-text" id="basic-addon1">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </button>
                    </div>
                </form>
                <div class="row">
                    @foreach ($tags as $row)
                    <div class="col-auto">
                        <a class="chip" href="?tags={{ str_replace('#', '', $row) }}"><span>{{ $row }}</span></a>
                    </div>
                    @endforeach
                    <div class="col-auto">
                        <a class="chip active" href="#"><span>#NewYear</span></a>
                    </div>
                    <div class="col-auto">
                        <a class="chip disabled" href="#" ><span>Soon</span></a>
                    </div>
                </div>
            </div>
            <div class="col-12 content-body mb-4">
                <h5 class="w-100 text-center mb-3">Pilih desainmu disini</h5>
                <div class="row w-100 mb-3">
                    @foreach ($categories as $row)
                    <div class="col-6 col-md-4 mb-4">
                        <a href="{{ url("/template/$row->id") }}">
                            <img class="img-fluid rounded" src="{{ asset('category/' . $row->thumbnail) }}">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-cust-yellow">Let's Create</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
