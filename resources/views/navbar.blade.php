<nav class="navbar navbar-expand-lg gt-navbar bg-transparent" id="top-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('frontend/images/icons/goodtime_logo.png') }}" alt="GoodTime logo" height="64">
        </a>
        <div class="navbar-info">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/#scrollspySection1">Beranda</a>
                </li>
                <li class="nav-item {{ Request::is('/moment') ? 'active' : '' }}">
                    <a class="nav-link" href="/#scrollspySection2">Moment</a>
                </li>
                <li class="nav-item {{ Request::is('/rules') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/rules') }}">Aturan Main</a>
                </li>
                <li class="nav-item {{ Request::is('/faq') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                </li>
                <li class="nav-item {{ Request::is('/disclaimer') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/disclaimer') }}">Disclaimer</a>
                </li>
            </ul>
            <div class="ms-4">
                <a href="/login" class="btn btn-cust-yellow">Login | Daftar</a>
            </div>
        </div>
    </div>
</nav>
