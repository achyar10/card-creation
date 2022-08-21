@extends('layouts')
@section('title', 'Share')
@section('content')
    <style>
        .main-wrapper.with-bg {
            background-image: none !important;
        }

        .chocochip:before {
            background-image: none !important;
        }
    </style>
    <div class="main-content container">
        <div class="content-wrapper row">
            <div class="col-12 content-header mb-4">
                <h3 class="fw-bold">Kartu Ucapan Digitalmu Sudah Siap!</h3>
            </div>
            <div class="col-12 content-content mb-4">
                <div class="container w-100 bg-light p-4 rounded mb-4">
                    <h5 class="fw-bold mb-4">Preview</h5>
                    <div class="w-100 text-center preview-image">
                        <img class="img-fluid rounded" id="image" src="{{ $row->url_path }}">
                    </div>
                </div>

                <div class="w-100">
                    <h5 class="fw-bold mb-4">Bagikan</h5>
                </div>

                <button onclick="saveImage()" class="btn btn-cust-blue w-100 mb-4">
                    <div class="w-100 d-flex flex-row justify-content-center">
                        <span class="material-symbols-outlined">
                            download
                        </span>
                        <span class="label">Simpan</span>
                    </div>
                </button>

                <button onclick="share()" class="btn btn-cust btn-danger w-100 mb-4">
                    <div class="w-100 d-flex flex-row justify-content-center">
                        <span class="material-symbols-outlined">
                            share
                        </span>
                        <span class="label">Share</span>
                    </div>
                </button>

                <button onclick="share()" class="btn btn-cust btn-warning w-100 mb-4">
                    <div class="w-100 d-flex flex-row justify-content-center">
                        <span class="material-symbols-outlined">
                            email
                        </span>
                        <span class="label">Send</span>
                    </div>
                </button>

                <div class="row w-100 m-0">
                    <div class="col-6">
                        <a href="{{ route('theme.category') }}" class="btn btn-cust-secondary w-100 mb-4">
                            Home
                        </a>
                    </div>

                    <div class="col-6">
                        <a href="{{ url('/editor/' . $row->card_id) }}" class="btn btn-cust-primary w-100 mb-4">
                            <div class="w-100 d-flex flex-row justify-content-center">
                                Ubah
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function saveImage() {
            var a = document.createElement('a');
            a.href = document.getElementById('image').src;
            a.download = document.getElementById('image').src;
            a.click()
        }

        async function share() {
            try {
                let image = document.getElementById('image').src
                const blob = await (await fetch(image)).blob();
                files = new File([blob], image, { type: blob.type });
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
