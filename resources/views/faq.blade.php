@extends('layouts')
@section('title', 'FAQ')
@section('content')
    <div class="main-content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">
        <div class="section__bg">
            <img class="section__img" src="{{ asset('frontend/images/bg/bg.png') }}" alt="Rainforest view with sunset" />
        </div>

        <section class="section" id="">
            <div class="section__content container">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('frontend/images/icons/goodtime_packshoot.png') }}">
                </div>
                <div class="col-md-6 mb-4">
                    <div class="mt-5">
                        <p class="fw-bold">Frequently Asked Questions</p>
                        <div class="accordion" id="accordionFlushExample">

                            @foreach ($faqs as $faq)
                                <div class="accordion-item mb-3 rounded bg-light bg-opacity-25">
                                    <h2 class="accordion-header" id="flush-heading{{ $loop->index }}">
                                        <button class="accordion-button collapsed rounded bg-light bg-opacity-25 text-white"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $loop->index }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $loop->index }}">
                                            {{ $faq->title }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse rounded"
                                        aria-labelledby="flush-heading{{ $loop->index }}"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body text-white">
                                            {!! $faq->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
