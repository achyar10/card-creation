@extends('layouts')
@section('title', 'Update Profile')
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
                    <h4 class="mb-4">Data Diri</h4>
                    <p class="fs-6 fw-light mb-4">Masukan nama sesuai KTP dan nomor<br>handphone mu yang dapat dihubungi
                        jika kamu mendapatkan hadiah.
                    </p>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <form action="" method="POST">
                                @csrf
                                @error('fullname')
                                    <div class="alert alert-danger alert-dismissible fade show rounded-pill" role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @enderror
                                @error('phone')
                                    <div class="alert alert-danger alert-dismissible fade show rounded-pill" role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @enderror
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <span class="material-symbols-outlined">
                                            person
                                        </span><span class="text-danger fs-6">*</span>
                                    </span>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark"
                                        style="z-index: 1;">+5
                                        Poin
                                        <span class="visually-hidden">point</span>
                                    </span>
                                    <input type="text" name="fullname" class="form-control custom-form-control"
                                        placeholder="Masukan Nama Sesuai KTP" aria-label="Nama"
                                        value="{{ old('fullname') }}" autocomplete="off">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <span class="material-symbols-outlined">
                                            phone
                                        </span><span class="text-danger fs-6">*</span>
                                    </span>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark"
                                        style="z-index: 1;">+5
                                        Poin
                                        <span class="visually-hidden">point</span>
                                    </span>
                                    <input type="number" name="phone" class="form-control custom-form-control"
                                        placeholder="Masukan Nomor Handphone" aria-label="No. Handphone"
                                        value="{{ old('phone') }}" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-cust-yellow w-100 mt-4">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
