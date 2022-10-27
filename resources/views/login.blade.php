@extends('layouts')
@section('title', 'Login')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
        </div>

        <section class="section" id="">
            <div class="container">
                <div class="text-center">
                    <img class="" height="200px" src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                    <h4 class="mb-4">Sebelum mulai, login dulu yuk!</h4>
                    <p class="fs-6 fw-light mb-4">Silahkan memilih akun yang kamu miliki<br>
                        untuk dapat masuk
                        kedalam aplikasi.
                    </p>
                    <div class="d-grid gap-2 col-md-4 col-xs-3 mx-auto">
                        <a href="{{ route('theme.category') }}" class="btn btn-cust-white mb-3 position-relative"> <img
                                class="img-fluid social-icon" src="{{ asset('frontend/images/google.png') }}">
                            &nbsp;&nbsp;Email
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">+10
                                Poin
                                <span class="visually-hidden">point</span>
                            </span>
                        </a>
                        <a href="{{ route('theme.category') }}" class="btn btn-cust-white mb-3 position-relative"> <img
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
