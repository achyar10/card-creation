@extends('layouts')
@section('title', 'Kamu Mendapatkan Ucapan')
@section('og:title', 'Kamu Mendapatkan Ucapan')
@section('og:image', $row->url_path)
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
        </div>
        <div class="section__float_bg">
            <img class="section__img chocochip chocochip1"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip2" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip3"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip4"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip5" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
        </div>
        <section class="section section__home1">
            <div class="section__content container">
                <div class="col-md-12 text-center">
                    {{-- <h4 class="mb-3">Hore! Desainmu sudah selesai!</h4> --}}
                    <p class="mb-5">Ayo bagikan dengan keluarga dan orang terdekatmu</p>
                    <img class="img-fluid mb-3" width="324px" height="575px" id="image" data-id="{{ $row->id }}"
                        src="{{ $row->url_path }}">
                    <a href="{{ route('home') }}" class="btn btn-share btn-cust-yellow col-md-3 text-white mx-auto mt-5">
                        <span class="share-label">Buat Versi Kamu Klik Disini!</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
