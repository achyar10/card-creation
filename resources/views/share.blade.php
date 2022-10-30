@extends('layouts')
@section('title', 'Share')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
        </div>
        <div class="section__float_bg">
            <img class="section__img chocochip chocochip1"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip2" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip3"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip4"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip5" src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
        </div>
        <section class="section section__home1">
            <div class="section__content container">
                <div class="col-md-6 text-center">
                    <img class="img-fluid mb-3" width="324px" height="575px" id="image" data-id="{{ $row->id }}"
                        src="{{ $row->url_path }}">
                </div>
                <div class="col-md-6 mb-4 pt-4 text-center">
                    <input type="hidden"
                        value="{{ auth()->guard('members')->user()? auth()->guard('members')->user()->id: null }}"
                        id="myId">
                    <h4 class="mb-3" id="url" data-url="{{ url('preview/' . $row->uuid) }}">Hore! Desainmu sudah
                        selesai!</h4>
                    <p class="mb-5">Ayo bagikan dengan keluarga dan orang terdekatmu</p>
                    <div class="d-flex flex-column align-items-center w-100 text-center">
                        <button onclick="shareWa()"
                            class="btn btn-share btn-cust-white w-50 mb-3 text-center d-flex align-items-center justify-content-center">
                            <div class="share-icon">
                                <img width="24px" height="24px" src="{{ asset('frontend/images/whatsapp.png') }}">
                            </div>
                            <span class="share-label">WhatsApp</span>
                        </button>
                        <button onclick="share()"
                            class="btn btn-share btn-cust-white w-50 mb-3 text-center d-flex align-items-center justify-content-center">
                            <div class="share-icon">
                                <i class="bx bx-share-alt"></i>
                            </div>
                            <span class="share-label">Share</span>
                        </button>
                        <button onclick="saveImage()"
                            class="btn btn-share btn-cust-white w-50 mb-3 text-center d-flex align-items-center justify-content-center">
                            <div class="share-icon">
                                <i class="bx bx-download"></i>
                            </div>
                            <span class="share-label">Download</span>
                        </button>

                        <a href="{{ route('home') }}"
                            class="btn btn-share btn-cust-yellow w-50 mt-5 text-center d-flex align-items-center justify-content-center">
                            <div class="share-icon">
                                <i class="bx bx-arrow-back"></i>
                            </div>
                            <span class="share-label">Kembali</span>
                        </a>
                        <p><button>Share MDN!</button></p>
                        <p class="result"></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        const myId = document.querySelector('#myId').value;
        const image = document.querySelector('#image');
        const url = document.querySelector('#url').getAttribute('data-url');
        const messageLogin = 'Anda belum melakukan login, silakan login terlebih daulu!';

        function shareWa() {
            if (!myId) {
                alert(messageLogin);
                localStorage.setItem("recentImage", image.getAttribute('data-id'));
                return window.location.href = '/login';
            }
            return window.location.href = `whatsapp://send?text=${url} SELAMAT: ada 1 kartu ucapan special untukmu, yuk lihat ucapannya dan bikin versi kamu disini ya
    👉 https://arnottsgiftingmoments.com/ ada HADIAH SPECIAL dari GOOD TIME&phone=`;

        }

        function saveImage() {
            if (!myId) {
                alert(messageLogin);
                localStorage.setItem("recentImage", image.getAttribute('data-id'));
                return window.location.href = '/login';
            }
            var a = document.createElement('a');
            a.href = document.getElementById('image').src;
            a.download = document.getElementById('image').src;
            a.click()
        }

        async function share() {
            try {
                let image = document.getElementById('image').src
                const blob = await (await fetch(image)).blob();
                files = new File([blob], image, {
                    type: blob.type
                });
                await navigator.share({
                    title: 'Hello',
                    text: 'Check out this image!',
                    files: [files],
                });
                console.log('shared successfully');
                return true;
            } catch (err) {
                console.log(err)
                alert(`Your system doesn't support sharing these files.`)
            }
        }
    </script>
@endsection
