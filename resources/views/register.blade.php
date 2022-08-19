@extends('layouts')
@section('title', 'Register')
@section('content')
    <div class="main-content container">
        <div class="content-wrapper row">
            <div class="col-12 text-center content-header mb-4">
                <img class="img-fluid content-logo" src="{{ asset('frontend/images/m_element_3.png') }}">
                <h1 class="text-white content-title">Halo</h1>
                <h4 class="text-white content-subtitle">Silakan melakukan pendaftaran</h4>
            </div>
            <div class="col-12 text-center content-content mb-4">
                <form action="" method="POST">
                    @csrf
                    @error('phone')
                        <div class="alert alert-danger alert-dismissible fade show rounded-pill" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    @error('password')
                        <div class="alert alert-danger alert-dismissible fade show rounded-pill" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    @error('name')
                        <div class="alert alert-danger alert-dismissible fade show rounded-pill" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <span class="material-symbols-outlined">
                                person
                            </span>
                        </span>
                        <input type="text" name="name" class="form-control custom-form-control" placeholder="Nama"
                            aria-label="Nama" value="{{ old('name') }}">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <span class="material-symbols-outlined">
                                phone
                            </span>
                        </span>
                        <input type="text" name="phone" class="form-control custom-form-control"
                            placeholder="No. Handphone" aria-label="No. Handphone" value="{{ old('phone') }}">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">
                            <span class="material-symbols-outlined">
                                key
                            </span>
                        </span>
                        <input type="password" name="password" class="form-control custom-form-control"
                            placeholder="Password" aria-label="Password">
                    </div>
                    <button type="submit" class="btn btn-cust-secondary w-100">Daftar</button>
                </form>
            </div>

            <div class="col-12 text-center content-footer">
                <h4 class="text-white content-subtitle or-login mb-4">atau login dengan</h4>

                <div class="row mb-4">
                    <div class="col-4">
                        <a href="#" class="btn btn-cust-secondary">
                            <img class="img-fluid social-icon" src="{{ asset('frontend/images/google.png') }}">
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="btn btn-cust-secondary">
                            <img class="img-fluid social-icon" src="{{ asset('frontend/images/facebook.png') }}">
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="btn btn-cust-secondary">
                            <img class="img-fluid social-icon" src="{{ asset('frontend/images/instagram.png') }}">
                        </a>
                    </div>
                </div>

                <p class="text-white content-subtitle">Sudah punya akun? <a href="/login"
                        class="text-warning text-decoration-none fw-bold">Login</a></p>
            </div>
        </div>
    </div>
@endsection
