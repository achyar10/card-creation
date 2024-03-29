@extends('layouts')
@section('title', 'Share')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg"></div>
        {{-- <div class="section__float_bg">
            <img class="section__img chocochip chocochip1 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip2 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip3 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip4 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip5 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
            <img class="section__img chocochip chocochip6 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip2.png') }}" />
            <img class="section__img chocochip chocochip7 animate__animated"
                src="{{ asset('frontend/images/decorations/chocochip.png') }}" />
        </div> --}}
        <section class="section section__home1">
            <div class="section__content container">
                <div class="col-lg-6 col-md-12 text-center">
                    <div class="card-share">
                        <img class="img-fluid mb-3" id="image" data-id="{{ $row->id }}" src="{{ $row->url_path }}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 pt-4 text-center">
                    <input type="hidden"
                        value="{{ auth()->guard('members')->user()? auth()->guard('members')->user()->id: null }}"
                        id="myId">
                    <input type="hidden" value="{{ csrf_token() }}" id="csrfToken">
                    <h4 class="mb-3" id="url" data-url="{{ url('preview/' . $row->uuid) }}">Gift Card mu sudah
                        selesai!</h4>
                    <p class="mb-5">Ayo bagikan ke orang tersayang dan teman teman mu</p>
                    <div class="d-flex flex-column align-items-center w-100 text-center cta-button">
                        <button onclick="shareWa(this)"
                            class="btn btn-share btn-cust-white mb-3 text-center d-flex align-items-center justify-content-center"
                            data-card-id="{{ $row->id }}">
                            <div class="share-icon">
                                <img width="24px" height="24px" src="{{ asset('frontend/images/whatsapp.png') }}">
                            </div>
                            <span class="share-label">WhatsApp</span>
                        </button>

                        <button onclick="shareOnFacebook(this)"
                            class="btn btn-share btn-cust-white mb-3 text-center d-flex align-items-center justify-content-center"
                            data-card-id="{{ $row->id }}">
                            <div class="share-icon">
                                <img width="24px" height="24px" src="{{ asset('frontend/images/facebook.png') }}">
                            </div>
                            <span class="share-label">Facebook</span>
                        </button>
                        <button onclick="share('ig', this)"
                            class="btn btn-share btn-cust-white mb-3 text-center d-flex align-items-center justify-content-center"
                            data-card-id="{{ $row->id }}">
                            <div class="share-icon">
                                <img width="24px" height="24px" src="{{ asset('frontend/images/instagram.png') }}">
                            </div>
                            <span class="share-label">Instagram</span>
                        </button>
                        <button onclick="share('email', this)"
                            class="btn btn-share btn-cust-white mb-3 text-center d-flex align-items-center justify-content-center"
                            data-card-id="{{ $row->id }}">
                            <div class="share-icon">
                                <img width="24px" height="24px" src="{{ asset('frontend/images/email.png') }}">
                            </div>
                            <span class="share-label">Email</span>
                        </button>
                        <button onclick="shareOnTwitter(this)"
                            class="btn btn-share btn-cust-white mb-3 text-center d-flex align-items-center justify-content-center"
                            data-card-id="{{ $row->id }}">
                            <div class="share-icon">
                                <img width="24px" height="24px" src="{{ asset('frontend/images/twitter.png') }}">
                            </div>
                            <span class="share-label">Twitter</span>
                        </button>
                        <button onclick="saveImage()"
                            class="btn btn-share btn-cust-white mb-3 text-center d-flex align-items-center justify-content-center"
                            data-card-id="{{ $row->id }}">
                            <div class="share-icon">
                                <i class="bx bx-download"></i>
                            </div>
                            <span class="share-label">Download</span>
                        </button>

                        {{-- <a href="{{ route('home') }}"
                            class="btn btn-share btn-cust-yellow mt-5 text-center d-flex align-items-center justify-content-center">
                            <div class="share-icon">
                                <i class="bx bx-arrow-back"></i>
                            </div>
                            <span class="share-label">Kembali</span>
                        </a> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        const myId = document.querySelector('#myId').value;
        const token = document.querySelector('#csrfToken').value;
        const image = document.querySelector('#image');
        const url = document.querySelector('#url').getAttribute('data-url');
        const messageLogin = 'Login terlebih dahulu!';
        const messageDesc =
            `Hai ada kartu ucapan special yang DipBanget untuk kamu, yuk lihat ucapannya dan bikin versi kamu disini ya 👉 https://arnottsgiftingmoments.com/  ada hadiah special dari GOOD TIME untuk kamu.`

        function shareWa(event) {
            this.point('wa', event)
                .then((response) => {
                    console.log(event)
                    if (!response.ok && response.status === 403) {
                        alert(messageLogin);
                        localStorage.setItem("recentImage", image.getAttribute('data-id'));
                        return window.location.href = '/login';
                    }
                    return window.location.href = `whatsapp://send?text=${url+'?via=wa'} ${messageDesc}&phone=`;
                })
                .catch(err => console.error(err))
        }

        function shareOnFacebook(event) {
            this.point('fb', event)
                .then((response) => {
                    if (!response.ok && response.status === 403) {
                        alert(messageLogin);
                        localStorage.setItem("recentImage", image.getAttribute('data-id'));
                        return window.location.href = '/login';
                    }
                    const navUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                    return window.open(navUrl, '_blank');
                })
                .catch(err => console.error(err))
        }

        function shareOnTwitter(event) {
            this.point('tw', event)
                .then((response) => {
                    if (!response.ok && response.status === 403) {
                        alert(messageLogin);
                        localStorage.setItem("recentImage", image.getAttribute('data-id'));
                        return window.location.href = '/login';
                    }
                    const navUrl = `https://twitter.com/intent/tweet?text=${url}`;
                    return window.open(navUrl, '_blank');
                })
                .catch(err => console.error(err))
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

        async function share(via, event) {
            try {
                await this.point(via, event)
                    .then((response) => {
                        if (!response.ok && response.status === 403) {
                            alert(messageLogin);
                            localStorage.setItem("recentImage", image.getAttribute('data-id'));
                            return window.location.href = '/login';
                        }
                    })
                    .catch(err => console.error(err))

                let image = document.getElementById('image').src
                const blob = await (await fetch(image)).blob();
                files = new File([blob], image, {
                    type: blob.type
                });
                await navigator.share({
                    title: 'Kamu Mendapatkan Ucapan',
                    text: messageDesc,
                    files: [files],
                });
                console.log(`shared successfully via ${via}`);
                return true;
            } catch (err) {
                console.log(err)
                // alert(`Your system doesn't support sharing these files.`)
            }
        }

        function point(via, event = null) {
            let cardId = null;

            if (event) {
                cardId = parseInt(event.dataset.cardId, 10);
            }

            return fetch('/update-point', {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        via,
                        member_id: myId,
                        id: cardId,
                        _token: token
                    }),
                })
                .then(response => {
                    if (response.ok) {
                        return response.json()
                    }

                    return response
                })
                .catch(error => console.log(error))
        }
    </script>
@endsection
