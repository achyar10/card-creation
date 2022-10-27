@extends('layouts')
@section('title', 'Disclaimer')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
        </div>

        <section class="section" id="">
            <div class="section__content container">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('frontend/images/icons/goodtime_product_1.png') }}">
                </div>
                <div class="col-md-6 mb-4">
                    <div class="mt-5">
                        <p class="fw-bold">Disclaimer</p>
                        <div class="card border border-light bg-light bg-opacity-25">
                            <div class="card-body">
                                {!! $disclaimer->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection