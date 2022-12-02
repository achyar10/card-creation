@extends('layouts')
@section('title', 'Editor')
@section('content')
    <style>
        .header-wrapper {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/vendor/pintura/pintura.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/pintura/styles.css?v=1.0.5') }}">
    <div class="main-content">
        <div class="section__bg"></div>

        <section class="section section__home1 p-0">
            <div class="section__content">
                <div class="col-12">
                    <div data-card="{{ $row->id }}"
                        data-id="{{ auth()->guard('members')->user()? auth()->guard('members')->user()->id: null }}"
                        id="image" data-image="{{ asset('/card/' . $row->image) }}" style="display: none;"></div>
                    <div id="my-editor" class="my-editor"></div>
                    <a href="#" id="preview" style="display: none"></a>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade gt-modal" id="cta" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog gt-modal-dialog">
            <div class="modal-content gt-modal-content">
                <div class="modal-header gt-modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body gt-modal-body">
                    <div class="d-flex flex-row flex-nowrap align-items-center justify-content-center my-4">
                        <div class="icon-bulb btn-cust-yellow me-4">
                            <i class='bx bx-bulb'></i>
                        </div>
                        <h5 class="m-0">Petunjuk Pembuatan Gift Card</h5>
                    </div>
                    <ol class="lh-lg mb-4">
                        <li>Klik text untuk mulai membuat ucapan pada gift card</li>
                        <li>Klik emoticon yang kalian inginkan</li>
                        <li>Klik gambar untuk mempercantik gift card</li>
                        <li>Klik tombol simpan atau centang emas dikanan atas untuk mengirim gift card</li>
                    </ol>
                    <div class="w-100 text-center">
                        <button class="btn btn-cust-yellow" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->

    <script type="module">

        import {
            appendDefaultEditor,
            createNode,
            createMarkupEditorToolStyle,
            createMarkupEditorToolStyles,
            createMarkupEditorShapeStyleControls
        } from '../frontend/vendor/pintura/pintura.js';

        const myModal = new bootstrap.Modal(document.getElementById("cta"), {});
        document.onreadystatechange = function () {
            myModal.show();
        };

        const myModalEl = document.getElementById('cta');
        myModalEl.addEventListener('hide.bs.modal', event => {
            openFullscreen();
        });

        const ctaButton = createNode('Button', 'cta', {
            label: 'Petunjuk',
            class: 'PinturaButtonExport',
            onclick: () => {
                myModal.show();
            }
        })

        const dataImg = document.querySelector('#image');
        const preview = document.querySelector('#preview');
        let imageUrl = dataImg.getAttribute('data-image');
        let member_id = dataImg.getAttribute('data-id');
        let card_id = dataImg.getAttribute('data-card');

        const pintura = appendDefaultEditor(".my-editor", {
            // The source image to load
            src: imageUrl,
            willRenderToolbar: (toolbar, env, redraw) => {
                // insert your item
                toolbar[2][3].splice(
                    0,
                    0,
                    ctaButton
                );
                return [
                    ...toolbar,
                ];
            },
            enableMoveTool: true,
            enableTapToAddText: false,
            enableAutoSelectMoveTool: 'text',
            markupEditorToolbar: [
                ['text', 'Text', { disabled: false }],
                // ['move', 'Move', { disabled: true }],
                // ['sharpie', 'Sharpie', { disabled: false }],
                // ['eraser', 'Eraser', { disabled: false }],
                // ['rectangle', 'Rectangle', { disabled: false }],
            ],
            markupEditorToolStyles: createMarkupEditorToolStyles({
                // create the text tool style and override fontSize property
                text: createMarkupEditorToolStyle('text', {
                    fontSize: '10%',
                    fontFamily: "'Poppins', sans-serif"
                })
            }),
            markupEditorShapeStyleControls: createMarkupEditorShapeStyleControls({
                fontFamilyOptions: [
                    // [`Calibri, sans-serif`, 'Calibri'],
                    // [`Arial, sans-serif`, 'Arial'],
                    [`'Poppins', sans-serif`, 'Poppins'],
                    // [`'Coolvetica'`, 'Coolvetica'],
                    // [`'Childs Hand'`, `Child's Hand`],
                    // [`'Caviar Dreams'`, `Caviar Dreams`],
                    // [`'Bebas'`, 'Bebas']
                    // Define additional custom fonts here
                ],
                fontStyleOptions: [],
                fontSizeOptions: [
                    ['8%', 'Small'],
                    ['10%', 'Medium'],
                    ['20%', 'Large']
                ],
                lineHeightOptions: false
            }),

            // This will set a square crop aspect ratio
            // imageCropAspectRatio: 4 / 5,
            layoutDirectionPreference: 'vertical',
            layoutVerticalControlTabsPreference: 'top',
            layoutVerticalUtilsPreference: 'top',
            layoutVerticalToolbarPreference: 'top',
            layoutVerticalControlGroupsPreference: 'top',
            enableNavigateHistory: false,
            enableZoom: true,
            enableZoomControls: false,
            enableButtonRevert: false,
            // zoomLevel: '0.15',
            // zoomPresetOptions: [0.15, 0.25, 0.35, 1, 1.25, 1.5, 2, 3, 4, 6, 8, 16],

            // Stickers available to user
            stickers: [
                [
                    "Emoji",
                    [
                        "⭐️",
                        "😊",
                        "🤗",
                        "🥰",
                        "🎉",
                        "🎁",
                        "💖",
                        "🎄"
                    ]
                ],
            ],
            locale: {
                labelButtonExport: 'Simpan',
                annotateLabel: 'Text',
                stickerLabel: 'Stiker'
            },
            utils: [
                    'annotate',
                    'sticker',
                    // 'crop',
                    // 'filter',
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

        const openFullscreen = () => {
            const elem = document.documentElement;
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
            }
        }

        const exitFullscreen = () => {
            const elem = document.documentElement;
            if (elem.exitFullscreen) {
                elem.exitFullscreen();
            } else if (elem.webkitExitFullscreen) { /* Safari */
                elem.webkitExitFullscreen();
            } else if (elem.msExitFullscreen) { /* IE11 */
                elem.msExitFullscreen();
            }
        }
    </script>


@endsection
