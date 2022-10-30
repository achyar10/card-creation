@extends('layouts')
@section('title', 'Login')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
        </div>
        <div class="section__float_bg">
            <img class="section__img chocochip chocochip1 animate__animated animate__infinite"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip2 animate__animated animate__infinite" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip3 animate__animated animate__infinite"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip4 animate__animated animate__infinite"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip5 animate__animated animate__infinite" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
        </div>
        <section class="section section__home1" id="">
            <div class="section__ornament">
                <div class="ornament__wrapper goodtime_product">
                    <img class="ornament__img" src="{{ asset('frontend/images/icons/goodtime_product_1.png') }}">
                </div>
            </div>
            <div class="section__content container">
                <div class="col-12 text-center">
                    <img class="home__logo animate__animated" src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                    <h4 class="mb-4">Sebelum mulai, login dulu yuk!</h4>
                    <p class="fs-6 fw-light mb-4">Silahkan memilih akun yang kamu miliki<br>
                        untuk dapat masuk
                        kedalam aplikasi.
                    </p>
                    <div class="cta-button">
                        <a href="{{ route('google.login') }}" class="btn btn-cust-white mb-3 position-relative"> <img
                                class="img-fluid social-icon" src="{{ asset('frontend/images/google.png') }}">
                            &nbsp;&nbsp;Email
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">+10
                                Poin
                                <span class="visually-hidden">point</span>
                            </span>
                        </a>
                        <a href="{{ route('facebook.login') }}" class="btn btn-cust-white mb-3 position-relative"> <img
                                class="img-fluid social-icon" src="{{ asset('frontend/images/facebook.png') }}">
                            &nbsp;&nbsp;Facebook
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">+10
                                Poin
                                <span class="visually-hidden">point</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
