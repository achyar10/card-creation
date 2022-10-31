@extends('layouts')
@section('title', 'Riwayat Poin')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
        </div>

        <section class="section section__home1">
            <div class="section__ornament">
                <div class="ornament__wrapper goodtime_product">
                    <img class="ornament__img" src="{{ asset('frontend/images/icons/goodtime_product_1.png') }}">
                </div>
                <div class="ornament__wrapper goodtime_card_preview">
                    <img class="ornament__img" src="{{ asset('frontend/images/icons/goodtime_card_preview.png') }}">
                </div>
            </div>
            <div class="section__content container">
                <div class="col-md-6 text-center">
                    <img class="mb-3" height="150px" src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                    <h4 class="mb-3">Kumpulin Poin Reward Yuk</h4>
                    <div class="point__counter justify-content-center mb-4">
                        @foreach ($points as $point)
                            <div class="point__digit_wrapper">
                                <span class="point__digit">{{ $point }}</span>
                            </div>
                        @endforeach
                        <span class="point__unit">Poin</span>
                    </div>
                </div>
                <div class="col-md-6 mb-4 pt-4">
                    <div class="leaderboard mb-4">
                        <h4 class="leaderboard__title">Riwayat Poinmu</h4>

                        @foreach ($socials as $social)
                            <div class="leaderboard__item">
                                <div class="leaderboard__rank">
                                    <span class="rank__icon">
                                        <img src="{{ asset($social['icon']) }}">
                                    </span>
                                    <p class="rank__name">
                                        <span class="text-white">{{ $social['name'] }}</span>
                                        <span class="text-white">{{ $social['date'] }}</span>
                                    </p>
                                </div>
                                <div class="leaderboard__point btn-cust-yellow">
                                    <span class="fw-bold">+{{ $social['point'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
