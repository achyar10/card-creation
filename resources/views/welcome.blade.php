@extends('layouts')
@section('title', 'Home')
@section('content')
    <div class="main-content container" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
        <section class="section section__home1" id="scrollspySection1">
            <div class="section__bg">
                <img
                    class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}"
                    alt="Rainforest view with sunset"
                />
            </div>
            <div class="section__content">
                <div class="col-12 text-center mb-4">
                    <img class="img-fluid home__logo" src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                    <p class="text-white lh-lg mb-4">Hai, kamu bisa berkreasi seru membuat ucapan untuk diberikan kepada orang spesial di momen-momen istimewa. <br> Ikuti petunjuk dan selamat berkreasi!</p>
                    <a class="btn btn-cust-yellow w-25">Lihat Aturan Main</a>
                </div>
            </div>
        </section>
    </div>
@endsection
