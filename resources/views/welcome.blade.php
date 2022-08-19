@extends('layouts')
@section('title', 'Home')
@section('content')
    <div class="top-ornament">
        <div class="row m-0 w-100">
            <div class="col-6 m-0 p-0 text-start">
                <img class="ornament topleft-ornament" src="{{ asset('frontend/images/element_2.png') }}">
            </div>

            <div class="col-6 m-0 p-0 text-end">
                <img class="ornament topright-ornament" src="{{ asset('frontend/images/element_3.png') }}">
            </div>
        </div>
    </div>
    <div class="main-content container d-flex flex-column justify-content-center">
        <div class="home-wrapper row">
            <div class="col-12 text-center">
                <img class="img-fluid center-ornament" src="{{ asset('frontend/images/m_element_3.png') }}">
            </div>
            <div class="col-12 text-center">
                <a href="/login" class="btn btn-cust-secondary w-50">Mulai</a>
            </div>
        </div>
    </div>
    <div class="bottom-ornament">
        <div class="row m-0 w-100 align-items-end ">
            <div class="col-6 m-0 p-0 text-start">
                <img class="ornament bottomleft-ornament" src="{{ asset('frontend/images/element_1.png') }}">
            </div>

            <div class="col-6 m-0 p-0 text-end align-items-end ">
                <img class="ornament bottomright-ornament" src="{{ asset('frontend/images/element_4.png') }}">
            </div>
        </div>
    </div>
@endsection
