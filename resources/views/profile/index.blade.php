@extends('layouts')
@section('title', 'Profile')
@section('content')
    <div class="main-content">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
        </div>

        <section class="section">
            <div class="section__content container" style="max-width: 1140px;">
                <div class="col-md-6 mb-4">
                    <div class="card bg-transparent border-white mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-12 mb-4 profile">
                                    <div class="profile-img mb-4">
                                        <img class="img-fluid" width="64" height="64" src="{{ $member->photo }}">
                                        <a href="{{ route('signOut') }}" class="btn btn-cust-white logout-btn">
                                            <img src="{{ asset('frontend/images/signup.png') }}" height="24"
                                                class="ml-3">
                                            <span class="">Logout</span>
                                        </a>
                                    </div>
                                    <h4 class="profile-name">{{ $member->fullname }}</h4>
                                    <p class="profile-info">{{ $member->phone }}</p>
                                    <p class="profile-info">{{ $member->email }}</p>
                                    <div class="mt-3 mb-3 d-lg-none">
                                        <a href="{{ route('signOut') }}" class="btn btn-cust-white">
                                            <img src="{{ asset('frontend/images/signup.png') }}" height="24"
                                                class="ml-5">
                                            <span class="">Logout</span>
                                        </a>
                                    </div>
                                </div>

                                <div
                                    class="col-md-12 d-flex align-items-stretch flex-column justify-content-center">
                                    <div class="point__counter mb-4 d-flex flex-row flex-nowrap justify-content-center">
                                        @foreach ($points as $point)
                                            <div class="point__digit_wrapper">
                                                <span class="point__digit text-center">{{ $point }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <h4 class="d-block w-100 mb-4 text-center">Poin</h4>
                                    <div class="leaderboard mb-4">
                                        <h4 class="leaderboard__title">Riwayat Poinmu</h4>

                                        @foreach ($socials as $social)
                                            <div class="leaderboard__item">
                                                <div class="leaderboard__rank">
                                                    <span class="rank__icon">
                                                        <img src="{{ asset($social['icon']) }}">
                                                    </span>
                                                    <p class="rank__name">
                                                        <span class="text-white">{{ $social['name'] }}</span>
                                                        <span class="text-white">{{ $social['date'] }}</span>
                                                    </p>
                                                </div>
                                                <div class="leaderboard__point btn-cust-yellow">
                                                    <span class="fw-bold">+{{ $social['point'] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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
                            <h4 class="my-4">Cara Ikutan</h4>
                            <ol class="lh-lg mb-4">
                                <li>Pilih moment gifting card</li>
                                <li>Pilih template kartu ucapan yang cocok denganmu</li>
                                <li>Tambahkan ucapan yang ingin kamu sampaikan</li>
                                <li>Share ke orang tersayang dan teman-temanmu</li>
                                <li>Kumpulkan point sebanyak-banyaknya</li>
                                <li>Dapatkan kesempatan memenangkan hadiah menarik</li>
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

        const recentImage = localStorage.getItem("recentImage");
        if (recentImage) {
            setTimeout(() => {
                fetch('/api/creation', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: recentImage,
                            member_id: myId.value,
                        }),
                    })
                    .then(response => response.json())
                    .then(res => {
                        localStorage.removeItem("recentImage");
                        return window.location.href = '/share/' + recentImage;
                    })
            }, 2000);
        }
    </script>
@endsection
