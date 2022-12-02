<nav class="navbar navbar-expand-lg gt-navbar bg-transparent" id="top-navbar">
    <div class="container">
        <a class="navbar-brand" href="#" aria-label="Goodtime Logo">
            {{-- <img src="{{ asset('frontend/images/icons/goodtime_logo.png') }}" alt="GoodTime logo" height="64"> --}}
        </a>
        <div class="navbar-info">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </button>
            <div>
                @if (!auth()->guard('members')->user())
                    <a href="/login" class="btn btn-cust-yellow">Login | Daftar</a>
                @else
                    <a href="{{ route('profile') }}" class="d-inline-block text-decoration-none">
                        <div class="member-point">
                            <img class="point-icon rounded-circle p-1"
                                src="{{ asset('frontend/images/decorations/cookie.png') }}" alt="point icon"
                                width="36" height="36">
                            <div class="point-wrapper">
                                <span class="point">{{ auth()->guard('members')->user()->point }} point reward</span>
                                <img class="profile-icon rounded-circle"
                                    src="{{ auth()->guard('members')->user()->photo }}" alt="point icon">
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-end mt-2" id="navbarNav">
            <ul class="navbar-nav fw-normal">
                <li class="nav-item">
                    <a class="nav-link" href="/#scrollspySection1">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/moment') ? 'active' : '' }}"
                        href="/#scrollspySection2">Momen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#rulesModal">Cara
                        Ikutan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('faq') ? 'active' : '' }}" href="{{ url('/faq') }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('disclaimer') ? 'active' : '' }}"
                        href="{{ url('/disclaimer') }}">Disclaimer</a>
                </li>
            </ul>
            <div class="navbar-info-desktop">
                @if (!auth()->guard('members')->user())
                    <a href="/login" class="btn btn-cust-yellow">Login | Daftar</a>
                @else
                    <a href="{{ route('profile') }}" class="d-inline-block text-decoration-none">
                        <div class="member-point">
                            <img class="point-icon rounded-circle p-1"
                                src="{{ asset('frontend/images/decorations/cookie.png') }}" alt="point icon"
                                width="36" height="36">
                            <div class="point-wrapper">
                                <span class="point">{{ auth()->guard('members')->user()->point }} point reward</span>
                                <img class="profile-icon rounded-circle"
                                    src="{{ auth()->guard('members')->user()->photo }}" alt="point icon">
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
