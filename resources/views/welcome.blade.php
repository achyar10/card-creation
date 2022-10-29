@extends('layouts')
@section('title', 'Home')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Good time background" />
        </div>
        <div class="section__float_bg">
            <img class="section__img chocochip chocochip1" src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip2" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip3" src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip4" src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip5" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
        </div>
        <section class="section section__home1" id="scrollspySection1">
            <div class="section__content container">
                <div class="col-12 text-center">
                    <img class="img-fluid home__logo" src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                    <p class="text-white lh-lg mb-4">Hai, kamu bisa berkreasi seru membuat ucapan untuk diberikan kepada
                        orang spesial di momen-momen istimewa. <br> Ikuti petunjuk dan selamat berkreasi!</p>
                    <div class="d-grid gap-2 col-3 mx-auto">
                        <button type="button" class="btn btn-cust-white mb-3" data-bs-toggle="modal"
                            data-bs-target="#rulesModal">Lihat Aturan Main</button>
                        <a href="#scrollspySection2" class="btn btn-cust-yellow">Let's Create</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section__home2" id="scrollspySection2">
            <div class="section__ornament">
                <div class="ornament__wrapper ornament__cut_left firework_left">
                    <img class="ornament__img" src="{{ asset('frontend/images/decorations/firework.png') }}">
                </div>
                <div class="ornament__wrapper cloud_left">
                    <img class="ornament__img" src="{{ asset('frontend/images/decorations/cloud_left.png') }}">
                </div>
                <div class="ornament__wrapper cloud_right">
                    <img class="ornament__img" src="{{ asset('frontend/images/decorations/cloud_right.png') }}">
                </div>
                <div class="ornament__wrapper firework_right">
                    <img class="ornament__img" src="{{ asset('frontend/images/decorations/firework.png') }}">
                </div>
            </div>
            <div class="section__content container">
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

        <section class="section section__home3" id="scrollspySection3">
            <div class="section__content container">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('frontend/images/icons/goodtime_product_1.png') }}">
                </div>
                <div class="col-md-6 mb-4">
                    <img class="d-block img-fluid home__logo"
                        src="{{ asset('frontend/images/icons/goodtime_gift_logo.png') }}">
                    <h3 class="my-4">Kumpulin Poin Reward Yuk!</h3>
                    <div class="point__counter mb-4">
                        <div class="point__digit_wrapper">
                            <span class="point__digit">6</span>
                        </div>
                        <div class="point__digit_wrapper">
                            <span class="point__digit">5</span>
                        </div>
                        <div class="point__digit_wrapper">
                            <span class="point__digit">8</span>
                        </div>
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

    <div class="modal fade gt-modal" id="rulesModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog gt-modal-dialog">
            <div class="modal-content gt-modal-content">
                <div class="modal-header gt-modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body gt-modal-body">
                    <div class="gt-video text-center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/D0UnqGm_miA"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <h4 class="my-4">Aturan Main</h4>
                    <ol class="lh-lg mb-4">
                        <li>Pilih kategori kartu ucapan yang cocok denganmu.</li>
                        <li>Pilih template kartu ucapan yang cocok denganmu.</li>
                        <li>Tambahkan kreasimu dengan menuliskan kata-kata mutiara atau upload photo/gambar yang kamu
                            inginkan.</li>
                        <li>Share ke orang tersayang, teman-teman, atau ke sosmedmu.</li>
                        <li>Dapatkan kesempatan memenangkan undian berhadiah menarik.</li>
                    </ol>
                    <div class="w-100">
                        <button class="btn btn-cust-yellow" data-bs-dismiss="modal">Ayo buat kartumu sekarang!</button>
                    </div>
                </div>
            </div>
        </div>
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
