<nav class="navbar navbar-expand-lg gt-navbar-yellow" id="top-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('frontend/images/icons/goodtime_logo.png') }}" alt="GoodTime logo" height="64">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Login Masuk</a>
            </li>
            <li class="nav-item {{ Request::is('/moment') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/#scrollspySection2') }}">Moment</a>
            </li>
            <li class="nav-item {{ Request::is('/rules') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/#scrollspySection1') }}">Aturan Main</a>
            </li>
            <li class="nav-item {{ Request::is('/faq') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
            </li>
            <li class="nav-item {{ Request::is('/disclaimer') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/disclaimer') }}">Disclaimer</a>
            </li>
        </ul>
    </div>
</nav>
