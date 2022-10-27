<nav class="navbar navbar-expand-lg gt-navbar-yellow footer-navbar" id="footer-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('frontend/images/icons/goodtime_logo.png') }}" alt="GoodTime logo" height="64">
            <span class="copyright">Copyright
                <script>
                    document.write(new Date().getFullYear())
                </script>
            </span>
        </a>
        <div class="navbar-collapse collapse show flex-grow-0">
            <div class="navbar-nav">
                <a class="nav-link" href="{{ url('/#scrollspySection1') }}">Beranda</a>
                <a class="nav-link" href="{{ url('/#scrollspySection2') }}">Moment</a>
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#rulesModal">Aturan Main</a>
                <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                <a class="nav-link" href="{{ url('/disclaimer') }}">Disclaimer</a>
            </div>
        </div>
    </div>
</nav>
