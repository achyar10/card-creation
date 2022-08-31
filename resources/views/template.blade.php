@extends('layouts')
@section('title', 'Pilih Template')
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
                <h2 class="fw-bold text-danger mb-4">{{ $row->tag_name }}</h2>
                <h2 class="fw-bold">Pilih Kartu Ucapan Favoritmu!</h2>
            </div>
            <div class="col-12 content-content mb-4">
                <div class="w-100 card-pick">
                    <div class="row">
                        @foreach ($row->cards as $card)
                            <div class="col-4 col-md-3 col-lg-2">
                                <img class="img-fluid rounded imgs" data-id="{{ $card->id }}"
                                    src="{{ asset('card/' . $card->image) }}" style="cursor: pointer">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container w-100 bg-light p-4 rounded mb-4">
                    <h5 class="fw-bold mb-4">Preview</h5>
                    <div class="w-100 preview-image text-center">
                        @if (count($row->cards) > 0)
                            <img class="img-fluid rounded" id="preview"
                                src="{{ asset('card/' . $row->cards[0]->image) }}">
                        @endif
                    </div>
                </div>
                @if (count($row->cards) > 0)
                    <a href="{{ url('/editor/' . $row->cards[0]->id) }}" id="link"
                        class="btn btn-cust-primary w-100">Pilih</a>
                @endif
            </div>
        </div>
    </div>

    <script>
        const imgs = document.querySelectorAll('.imgs');
        const preview = document.querySelector('#preview');
        const link = document.querySelector('#link');

        for (const img of imgs) {
            img.addEventListener("click", function() {
                const id = img.getAttribute('data-id');
                preview.src = this.src;
                link.href = `/editor/${id}`
            });
        }
    </script>

@endsection
