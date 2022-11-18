@extends('layouts')
@section('title', 'Good Time Giftcard')
@section('description',
    request()->via == 'wa'
    ? 'Hai ada kartu ucapan special yang #DipBanget untuk kamu, yuk lihat ucapannya dan bikin versi
    kamu disini ya 👉 https://arnottsgiftingmoments.com/ ada hadiah special dari GOOD TIME untuk kamu.'
    : 'Ada hadiah yang keren dan menarik dari GOOD TIME ! yang bisa kamu dapatkan 👌🏻✨ yuk bikin kartu ucapan spesial yang
    #DipBanget dan kirim ke orang tersayang, jangan lupa ajak temanmu untuk ikutan disini
    https://arnottsgiftingmoments.com/')
@section('og:title', 'Good Time Giftcard')
@section('og:image', $url_path)
@section('og:image:width', request()->via == 'wa' ? '720' : '300')
@section('og:image:height', request()->via == 'wa' ? '1280' : '300')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg"></div>
        {{-- <div class="section__float_bg d-none">
            <img class="section__img chocochip chocochip1"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip2" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip3"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip4"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip5" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
        </div> --}}
        <section class="section section__home1">
            <div class="section__content container">
                <div class="col-md-12 text-center">
                    <img class="img-fluid mb-3" width="324px" height="575px" id="image" data-id="{{ $row->id }}"
                        src="{{ $row->url_path }}">
                    <h4 class="mb-3">Anda mendapatkan gift card</h4>
                    <p class="mb-3">Ayo buat gift cardmu sekarang, dan bagikan ke orang tersayang dan temanmu</p>
                    <a href="{{ route('home') }}"
                        class="btn btn-share btn-cust-yellow col-md-3 text-white mx-auto mt-5 mb-5">
                        <span class="share-label">Mulai Sekarang</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
