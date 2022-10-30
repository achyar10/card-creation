@extends('layouts')
@section('title', 'Profile')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
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
                                            <img class="img-fluid me-4 rounded-pill" src="{{ $member->photo }}">
                                            <a href="{{ route('signOut') }}" class="btn btn-cust-white">
                                                <img src="{{ asset('frontend/images/signup.png') }}" height="24"
                                                    class="ml-5">
                                                <span class="">Logout</span>
                                            </a>
                                        </div>
                                        <h4 class="mb-4">{{ $member->fullname }}</h4>
                                        <p>{{ $member->phone }}</p>
                                        <p>{{ $member->email }}</p>
                                    </div>

                                    <div class="col-lg-6 d-flex align-items-stretch flex-column justify-content-center">
                                        <div class="point__counter mb-4 d-flex flex-row flex-nowrap justify-content-center">
                                            @foreach ($points as $point)
                                                <div class="point__digit_wrapper">
                                                    <span class="point__digit text-center">{{ $point }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <h4 class="d-block w-100 mb-4 text-center">Poin</h4>
                                        <a href="{{ route('history') }}" class="btn btn-cust-white">
                                            <i class="bx bx-history fs-5"></i>
                                            Riwayat Poin
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card bg-transparent border-white">
                            <div class="card-body">
                                <div class="gt-video text-center">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/D0UnqGm_miA"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <h4 class="my-4">Aturan Main</h4>
                                <ol class="lh-lg mb-4">
                                    <li>Pilih kategori kartu ucapan yang cocok denganmu.</li>
                                    <li>Pilih template kartu ucapan yang cocok denganmu.</li>
                                    <li>Tambahkan kreasimu dengan menuliskan kata-kata mutiara atau upload photo/gambar yang
                                        kamu
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
                                    <div class="leaderboard__item leaderboard__regular" id="leadMyRank">
                                        <div class="leaderboard__rank">
                                            <input type="hidden" id="myId"
                                                value="{{ auth()->guard('members')->user()->id }}">
                                            <span class="rank__icon" id="rankMe">0</span>
                                            <p class="rank__name">{{ auth()->guard('members')->user()->fullname }}</p>
                                        </div>
                                        <div class="leaderboard__point" id="leadMyPoint">
                                            <span>{{ auth()->guard('members')->user()->point }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="leaderboard">
                                    <h4 class="leaderboard__title">Semua Peringkat</h4>
                                    @foreach ($leaderboards as $leaderboard)
                                        @if ($leaderboard->point > 0)
                                            <div class="leads leaderboard__item {{ $loop->iteration == 1 ? 'leaderboard__gold' : ($loop->iteration == 2 ? 'leaderboard__silver' : ($loop->iteration == 3 ? 'leaderboard__bronze' : 'leaderboard__regular')) }}"
                                                data-id="{{ $leaderboard->id }}" data-rank="{{ $loop->iteration }}">
                                                <div class="leaderboard__rank">
                                                    <span class="rank__icon">{{ $loop->iteration }}</span>
                                                    <span class="rank__name">{{ $leaderboard->fullname }}</span>
                                                </div>
                                                <div
                                                    class="leaderboard__point {{ $loop->iteration == 1 ? 'bg-light bg-opacity-25' : 'bg-light' }}">
                                                    <span>{{ $leaderboard->point }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        const leadMyRank = document.querySelector('#leadMyRank');
        const leadMyPoint = document.querySelector('#leadMyPoint');
        const myId = document.querySelector('#myId');
        const rankMe = document.querySelector('#rankMe');
        const leads = document.querySelectorAll('.leads');

        for (const lead of leads) {
            const id = lead.getAttribute('data-id');
            const rank = lead.getAttribute('data-rank');
            if (myId.value == id) {
                rankMe.textContent = rank;
                leadMyRank.classList.add(rank == 1 ? 'leaderboard__gold' : (rank == 2 ? 'leaderboard__silver' : (rank == 3 ?
                    'leaderboard__bronze' : 'leaderboard__regular')));
                leadMyPoint.className = rank == 1 ? 'leaderboard__point bg-light bg-opacity-25' :
                    'leaderboard__point bg-light'
            }
        }
    </script>
@endsection
