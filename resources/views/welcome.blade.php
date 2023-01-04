@extends('layouts')
@section('title', 'Good Time Giftcard')
@section('description', 'Kamu bisa berkreasi seru membuat ucapan untuk diberikan kepada orang tersayang dan
    teman-temanmu di momen-momen istimewa')
@section('og:image', asset('frontend/images/goodtime_thumbnail.jpg'))
@section('og:image:width', '300')
@section('og:image:height', '300')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg"></div>
        {{-- <div class="section__float_bg d-none">
            <img class="section__img chocochip chocochip1 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip2 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip3 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip4 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip5 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip6 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip7 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
        </div> --}}
        <section class="section section__home1 animate__animated" id="scrollspySection1">
            <div class="section__content container">
                <div class="col-12 text-center">
                    <img class="img-fluid home__logo animate__animated"
                        src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}" alt="Goodtime Gift Card Logo">
                    <p class="text-white lh-lg mb-4">Kamu bisa berkreasi seru membuat ucapan untuk diberikan<br>kepada orang
                        tersayang dan teman-temanmu di momen-momen istimewa</p>
                    <div class="cta-button">
                        <button type="button" class="btn btn-cust-white mb-3" data-bs-toggle="modal"
                            data-bs-target="#rulesModal">Cara Ikutan</button>
                        <a href="#scrollspySection2" class="btn btn-cust-yellow"
                            aria-label="Ayo buat kartumu sekarang!">Mulai Sekarang</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section__home2 animate__animated" id="scrollspySection2">
            {{-- <div class="section__ornament d-none">
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
            </div> --}}
            <div class="section__content container">
                <div class="col-12 title">
                    <h2 class="btn btn-cust-yellow">Pilih Momen disini</h2>
                </div>
                <div class="col-12">
                    <div class="gallery">
                        <div class="gallery-container">
                            @foreach ($categories as $category)
                                <img class="gallery-item" data-id="{{ $category->id }}"
                                    src="{{ asset('category/' . $category->thumbnail) }}" alt="" loading="lazy">
                            @endforeach
                        </div>
                        <div class="gallery-controls"></div>

                    </div>
                </div>
            </div>
        </section>

        <section class="section section__home3 animate__animated" id="scrollspySection3">
            <div class="section__content container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img class="img-fluid" src="{{ asset('frontend/images/icons/goodtime_packshoot.png') }}"
                            width="100%" height="auto" alt="Goodtime Packshoot">
                        <h3 class="text-center my-4 fs-5">Kunjungi Marketplace</h3>
                        <div class="shops">
                            <a href="https://www.tokopedia.com/arnotts/etalase/good-time-special-package" class="shop-icon"
                                target="_blank" aria-label="Tokopedia Arnotts">
                                <img width="36px" height="36px" src="{{ asset('frontend/images/icons/tokopedia.png') }}"
                                    alt="Tokopedia Arnotts">
                            </a>
                            <a href="https://www.lazada.co.id/shop/arnotts" class="shop-icon" target="_blank"
                                aria-label="Lazada Arnotts">
                                <img width="36px" height="36px" src="{{ asset('frontend/images/icons/lazada.png') }}"
                                    alt="Lazada Arnotts">
                            </a>
                            <a href="https://www.jd.id/promotion/Arnotts/4Xbf75HqXTgw93MXyYJttzDGjwjT.html"
                                class="shop-icon" target="_blank" aria-label="JDID Arnotts">
                                <img width="36px" height="36px" src="{{ asset('frontend/images/icons/jdid.png') }}"
                                    alt="JDID Arnotts">
                            </a>
                            <a href="https://shopee.co.id/product/22674495/21355377173" class="shop-icon" target="_blank"
                                aria-label="Shopee Arnotts">
                                <img width="36px" height="36px" src="{{ asset('frontend/images/icons/shopee.png') }}"
                                    alt="Shopee Arnotts">
                            </a>
                            <a href="https://www.bukalapak.com/arnotts-official" class="shop-icon" target="_blank"
                                aria-label="Bukalapak Arnotts">
                                <img width="36px" height="36px" src="{{ asset('frontend/images/icons/bukalapak.png') }}"
                                    alt="Bukalapak Arnotts">
                            </a>
                            <a href="https://www.blibli.com/merchant/arnott-s-official-store/ARO-60058" class="shop-icon"
                                target="_blank" aria-label="Blibli Arnotts">
                                <img width="36px" height="36px" src="{{ asset('frontend/images/icons/blibli.png') }}"
                                    alt="Blibli Arnotts">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="d-flex flex-column flex-nowrap home3__content">
                            <div class="w-100 d-block">
                                <img class="img-fluid home__logo"
                                    src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}"
                                    alt="Goodtime Gift Card Logo">
                            </div>
                            <h3 class="my-4">Poin Rewardmu</h3>
                            <div class="point__counter mb-4 d-flex flex-row flex-nowrap">
                                @foreach ($points as $point)
                                    <div class="point__digit_wrapper">
                                        <span class="point__digit text-center">{{ $point }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <h4 class="d-block w-100 mb-4">Poin</h4>
                        </div>
                        <p class="text-white lh-lg mb-4">Ikuti semua keseruannya dan dapatkan hadiah menarik bagi
                            peserta
                            dengan
                            poin terbanyak.</p>
                        <div class="w-100">
                            <a class="btn btn-cust-yellow" href="#scrollspySection2"
                                aria-label="Ayo buat kartumu sekarang!">Ayo buat kartumu sekarang!</a>
                        </div>
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
