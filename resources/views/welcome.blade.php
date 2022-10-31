@extends('layouts')
@section('title', 'Home')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Good time background" />
        </div>
        <div class="section__float_bg animate__animated">
            <img class="section__img chocochip chocochip1 animate__animated animate__infinite" src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip2 animate__animated animate__infinite" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip3 animate__animated animate__infinite"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip4 animate__animated animate__infinite"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip5 animate__animated animate__infinite" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
        </div>
        <section class="section section__home1 animate__animated" id="scrollspySection1">
            <div class="section__content container">
                <div class="col-12 text-center">
                    <img class="img-fluid home__logo animate__animated" src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                    <p class="text-white lh-lg mb-4">Hai, kamu bisa berkreasi seru membuat ucapan untuk diberikan kepada
                        orang spesial di momen-momen istimewa. <br> Ikuti petunjuk dan selamat berkreasi!</p>
                    <div class="cta-button">
                        <button type="button" class="btn btn-cust-white mb-3" data-bs-toggle="modal"
                            data-bs-target="#rulesModal">Lihat Aturan Main</button>
                        <a href="#scrollspySection2" class="btn btn-cust-yellow">Let's Create</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section__home2 animate__animated" id="scrollspySection2">
            <div class="section__ornament d-none">
                <div class="ornament__wrapper ornament__cut_left firework_left animate__animated">
                    <img class="ornament__img" src="{{ asset('frontend/images/decorations/firework.png') }}">
                </div>
                <div class="ornament__wrapper cloud_left animate__animated">
                    <img class="ornament__img" src="{{ asset('frontend/images/decorations/cloud_left.png') }}">
                </div>
                <div class="ornament__wrapper cloud_right animate__animated">
                    <img class="ornament__img" src="{{ asset('frontend/images/decorations/cloud_right.png') }}">
                </div>
                <div class="ornament__wrapper firework_right animate__animated">
                    <img class="ornament__img" src="{{ asset('frontend/images/decorations/firework.png') }}">
                </div>
            </div>
            <div class="section__content container d-none">
                <div class="col-12 mb-5">
                    <h3 class="w-50">Pilih Momen disini</h3>
                </div>
                <div class="col-12">
                    <div class="gallery mt-5">
                        <div class="gallery-container">
                            @foreach ($categories as $category)
                                <img class="gallery-item" style="cursor: pointer" data-id="{{ $category->id }}"
                                    src="{{ asset('category/' . $category->thumbnail) }}">
                            @endforeach
                        </div>
                        <div class="gallery-controls"></div>

                </div>
            </div>
        </div>
    </section>

    <section class="section section__home3 animate__animated" id="scrollspySection3">
        <div class="section__content container d-none">
            <div class="col-lg-6">
                <img class="img-fluid" src="{{ asset('frontend/images/icons/goodtime_product_1.png') }}">
            </div>
            <div class="col-lg-6 mb-4">
                <div class="d-flex flex-column flex-nowrap">
                    <img class="d-block img-fluid home__logo" src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                    <h3 class="my-4">Kumpulin Poin Reward Yuk!</h3>
                    <div class="point__counter mb-4">
                        @foreach ($points as $point)
                            <div class="point__digit_wrapper">
                                <span class="point__digit">{{ $point }}</span>
                            </div>
                        @endforeach
                        <span class="point__unit">Poin</span>
                    </div>
                    <p class="text-white lh-lg mb-4">Ikuti semua keseruannya dan dapatkan hadiah menarik bagi peserta
                        dengan
                        poin terbanyak.</p>
                    <div class="w-100">
                        <a class="btn btn-cust-yellow" href="#">Ayo buat kartumu sekarang!</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        const imgs = document.querySelectorAll('.gallery-item');

        for (const img of imgs) {
            img.addEventListener("click", function() {
                const id = img.getAttribute('data-id');
                const redirect = `/theme?category_id=${id}`;
                window.location.href = redirect;
            });
        }
    </script>
@endsection
