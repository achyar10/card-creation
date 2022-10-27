@extends('layouts')
@section('title', 'Home')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
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
            <div class="section__content container">
                <div class="col-12 mb-4">
                    <h3 class="w-50">Pilih Kategori Cardmu disini</h3>
                </div>
                <div class="col-12 section__home_carousel">
                    <div id="homeCarousel" class="carousel home__carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="row carousel-item active">
                                <div class="col-md-3 text-center">
                                    <img src="{{ asset('frontend/images/cards/card_1.png') }}" class="d-inline-block"
                                        alt="Card 1">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3 text-center">
                                    <img src="{{ asset('frontend/images/cards/card_2.png') }}" class="d-inline-block"
                                        alt="Card 1">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3 text-center">
                                    <img src="{{ asset('frontend/images/cards/card_3.png') }}" class="d-inline-block"
                                        alt="Card 1">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3 text-center">
                                    <img src="{{ asset('frontend/images/cards/card_4.png') }}" class="d-inline-block"
                                        alt="Card 1">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3 text-center">
                                    <img src="{{ asset('frontend/images/cards/card_4.png') }}" class="d-inline-block"
                                        alt="Card 1">
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
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
                        <span class="point__digit">6</span>
                        <span class="point__digit">5</span>
                        <span class="point__digit">8</span>
                        <span class="point__unit">Poin</span>
                    </div>
                    <p class="text-white lh-lg mb-4">Ikuti semua keseruannya dan dapatkan hadiah menarik bagi peserta dengan
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
@endsection
