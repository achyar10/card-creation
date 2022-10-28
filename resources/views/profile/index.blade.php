@extends('layouts')
@section('title', 'Profile')
@section('content')
<div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
    <div class="section__bg">
        <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
    </div>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-transparent border-white mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-row flex-nowrap align-items-center mb-4">
                                        <img class="img-fluid me-4" src="{{ asset('frontend/images/profile.png') }}">
                                        <a href="/logout" class="btn btn-cust-white">
                                            Logout
                                        </a>
                                    </div>
                                    <h4 class="mb-4">Zefry Awaludin</h4>
                                    <p>08123131</p>
                                    <p>zefru.awaludin@gmail.com</p>
                                </div>
                                <div class="col-lg-6 d-flex align-items-stretch flex-column justify-content-center">
                                    <div class="point__counter mb-4 d-flex flex-row flex-nowrap justify-content-center">
                                        <div class="point__digit_wrapper">
                                            <span class="point__digit text-center">6</span>
                                        </div>
                                        <div class="point__digit_wrapper">
                                            <span class="point__digit text-center">5</span>
                                        </div>
                                        <div class="point__digit_wrapper">
                                            <span class="point__digit text-center">8</span>
                                        </div>
                                    </div>
                                    <h4 class="d-block w-100 mb-4 text-center">Poin</h4>
                                    <a href="/point-history" class="btn btn-cust-white">
                                        Riwayat Poin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-transparent border-white">
                        <div class="card-body">
                            <div class="gt-video text-center">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/D0UnqGm_miA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-transparent border-white mb-4">
                        <div class="card-body">
                            <div class="leaderboard mb-4">
                                <h4 class="leaderboard__title">Peringkat Saya</h4>
                                <div class="leaderboard__item leaderboard__regular">
                                    <div class="leaderboard__rank">
                                        <span>4</span>
                                        <span>Zefry</span>
                                    </div>
                                    <div class="leaderboard__point">
                                        <span>55</span>
                                    </div>
                                </div>
                            </div>

                            <div class="leaderboard">
                                <h4 class="leaderboard__title">Semua Peringkat</h4>
                                <div class="leaderboard__item leaderboard__gold">
                                    <div class="leaderboard__rank">
                                        <span>1</span>
                                        <span>Asep</span>
                                    </div>
                                    <div class="leaderboard__point">
                                        <span>1200</span>
                                    </div>
                                </div>
                                <div class="leaderboard__item leaderboard__silver">
                                    <div class="leaderboard__rank">
                                        <span>2</span>
                                        <span>Tata</span>
                                    </div>
                                    <div class="leaderboard__point">
                                        <span>1100</span>
                                    </div>
                                </div>
                                <div class="leaderboard__item leaderboard__bronze">
                                    <div class="leaderboard__rank">
                                        <span>3</span>
                                        <span>Budi</span>
                                    </div>
                                    <div class="leaderboard__point">
                                        <span>1000</span>
                                    </div>
                                </div>
                                <div class="leaderboard__item leaderboard__regular">
                                    <div class="leaderboard__rank">
                                        <span>4</span>
                                        <span>Zefry</span>
                                    </div>
                                    <div class="leaderboard__point">
                                        <span>900</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection
