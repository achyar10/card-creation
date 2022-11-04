<nav class="navbar navbar-expand-lg gt-navbar-yellow footer-navbar" id="footer-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            {{-- <img src="{{ asset('frontend/images/icons/goodtime_logo.png') }}" alt="GoodTime logo" height="50"
                class="position-relative"> --}}
        </a>
        <div class="navbar-collapse collapse show justify-content-center">
            <div class="navbar-nav fw-normal">
                <a class="nav-link" href="{{ url('/#scrollspySection1') }}">Beranda</a>
                <a class="nav-link" href="{{ url('/#scrollspySection2') }}">Momen</a>
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#rulesModal">Cara Ikutan</a>
                <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                <a class="nav-link" href="{{ url('/disclaimer') }}">Disclaimer</a>
            </div>
        </div>
        <span class="copyright fw-normal">Copyright
            <script>
                document.write(new Date().getFullYear())
            </script>
        </span>
        <div class="socials">
            <a href="https://web.facebook.com/GoodTimeID" class="social-icon text-dark"><i
                    class="bx bxl-facebook fs-3 p-3"></i></a>
            <a href="https://www.instagram.com/goodtimeid" class="social-icon text-dark"><i
                    class="bx bxl-instagram fs-3 p-3"></i></a>
            <a href="https://www.tiktok.com/@goodtimeid" class="social-icon text-dark"><i
                    class="bx bxl-tiktok fs-3 p-3"></i></a>
            <a href="https://www.youtube.com/channel/UCsK31f3tZZKl-eprV7X4hnw" class="social-icon text-dark"><i
                    class="bx bxl-youtube fs-3 p-3"></i></a>
        </div>
    </div>
</nav>
