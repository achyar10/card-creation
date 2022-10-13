@extends('layouts')
@section('title', 'Editor')
@section('content')
    <style>
        .main-wrapper.with-bg {
            background-image: none !important;
        }

        .chocochip:before {
            background-image: none !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/vendor/pintura/pintura.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/pintura/styles.css') }}">
    <!--<div class="main-content container">-->
        <div data-card="{{ $row->id }}" data-id="{{ $member_id }}" id="image"
            data-image="{{ asset('/card/' . $row->image) }}" style="display: none;"></div>
        <div class="my-editor mb-2"></div>
        <a href="#" id="preview" style="display: none"></a>
    <!--</div>-->

    <script type="module">
        
        import { appendDefaultEditor } from '../frontend/vendor/pintura/pintura.js';

        const dataImg = document.querySelector('#image');
        const preview = document.querySelector('#preview');
        let imageUrl = dataImg.getAttribute('data-image');
        let member_id = dataImg.getAttribute('data-id');
        let card_id = dataImg.getAttribute('data-card');
        
        const pintura = appendDefaultEditor(".my-editor", {
            // The source image to load
            src: imageUrl,
            enableMoveTool: true,
            markupEditorToolbar: [
                ['move', 'Move', { disabled: false }],
                ['text', 'Text', { disabled: false }],
                // ['sharpie', 'Sharpie', { disabled: false }],
                ['eraser', 'Eraser', { disabled: false }],
                // ['rectangle', 'Rectangle', { disabled: false }],
            ],

            // This will set a square crop aspect ratio
            imageCropAspectRatio: 1,

            // Stickers available to user
            stickers: [
                ["Emoji", ["⭐️", "😊", "👍", "👎", "☀️", "🌤", "🌥"]],
                [
                    "Markers",
                    [
                        {
                            src: "sticker-one.svg",
                            width: "5%",
                            alt: "One"
                        },
                        {
                            src: "sticker-two.svg",
                            width: "5%",
                            alt: "Two"
                        },
                        {
                            src: "sticker-three.svg",
                            width: "5%",
                            alt: "Three"
                        }
                    ]
                ]
            ],
            locale: { labelButtonExport: 'SIMPAN' },
            utils: [
                    'annotate',
                    // 'sticker',
                    // 'crop',
                    'filter',
                    // 'finetune',
                    // 'frame',
                    // 'resize',
            ],
        });

        pintura.on('process', async (imageState) => {
            const file = await toBase64(imageState.dest);
            const ext = imageState.dest.type.split('/');
            fetch('/api/upload', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        file,
                        ext: ext[1],
                        member_id,
                        card_id
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // preview.style.display = 'block';
                    preview.href = '/share/' + data.id;
                    window.location.href = preview.href;
                })
        });

        const downloadFile = (file) => {
            // Create a hidden link and set the URL using createObjectURL
            const link = document.createElement('a');
            link.style.display = 'none';
            link.href = URL.createObjectURL(file);
            link.download = file.name;

            // We need to add the link to the DOM for "click()" to work
            document.body.appendChild(link);
            link.click();

            // To make this work on Firefox we need to wait a short moment before clean up
            setTimeout(() => {
                URL.revokeObjectURL(link.href);
                link.parentNode.removeChild(link);
            }, 0);
        };

        const toBase64 = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });
    </script>


@endsection
