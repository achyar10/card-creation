<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="@yield('description')" />
    <meta property="og:title" content="@yield('og:title')" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="@yield('og:image')" />
    <meta property="og:image:width" content="@yield('og:image:width')">
    <meta property="og:image:height" content="@yield('og:image:height')">
    <meta property="og:type" content="greetings" />
    <meta property="og:locale" content="id_ID" />

    <title>@yield('title')</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('frontend/styles/style.css?v=1.0.20') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
</head>

<body>
    <header class="header-wrapper">
        @include('navbar')
    </header>
    <main class="main-wrapper">

        {{-- content --}}
        @yield('content')

    </main>
    <footer class="footer-wrapper">
        @include('footer')
    </footer>

    {{-- Aturan Main --}}
    <div class="modal fade gt-modal" id="rulesModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog gt-modal-dialog">
            <div class="modal-content gt-modal-content">
                <div class="modal-header gt-modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body gt-modal-body">
                    <div class="gt-video text-center">
                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/Cb8BhneP_1M"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <h4 class="my-4">Cara Ikutan</h4>
                    <ol class="lh-lg mb-4">
                        <li>Pilih moment gift card</li>
                        <li>Pilih template gift card ucapan yang cocok denganmu</li>
                        <li>Tambahkan ucapan yang ingin kamu sampaikan</li>
                        <li>Share ke orang tersayang dan teman-temanmu</li>
                        <li>Kumpulkan point sebanyak-banyaknya</li>
                        <li>Dapatkan kesempatan memenangkan hadiah menarik</li>
                    </ol>
                    <div class="w-100">
                        <button class="btn btn-cust-yellow" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js?v=1.0.2') }}"></script>
    <script src="{{ asset('frontend/js/carousel.js?v=1.0.1') }}"></script>
</body>

</html>
