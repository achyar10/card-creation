<nav class="navbar navbar-expand-lg gt-navbar-yellow footer-navbar" id="footer-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('frontend/images/icons/goodtime_logo.png') }}" alt="GoodTime logo" height="50"
                class="position-relative">
            <span class="copyright fw-normal">Copyright
                <script>
                    document.write(new Date().getFullYear())
                </script>
            </span>
        </a>
        <div class="navbar-collapse collapse show justify-content-center">
            <div class="navbar-nav fw-normal">
                <a class="nav-link" href="{{ url('/#scrollspySection1') }}">Beranda</a>
                <a class="nav-link" href="{{ url('/#scrollspySection2') }}">Moment</a>
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#rulesModal">Aturan Main</a>
                <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                <a class="nav-link" href="{{ url('/disclaimer') }}">Disclaimer</a>
            </div>
        </div>
        <div class="float-end">
            <a href="https://web.facebook.com/GoodTimeID" class="text-dark"><i class="bx bxl-facebook fs-3 p-3"></i></a>
            <a href="https://www.instagram.com/goodtimeid" class="text-dark"><i
                    class="bx bxl-instagram fs-3 p-3"></i></a>
            <a href="https://www.tiktok.com/@goodtimeid" class="text-dark"><i class="bx bxl-tiktok fs-3 p-3"></i></a>
        </div>
    </div>
</nav>
