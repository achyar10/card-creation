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
    <div class="main-content container">
        <div class="content-wrapper row">
            <div class="col-12 content-header mb-4">
                <h2 class="fw-bold">Tuliskan Pesan Spesialmu!</h2>
            </div>
            <div class="col-12 content-content mb-4">
                <div class="container w-100 bg-light p-2 rounded mb-4">
                    <div class="w-100 preview-image text-center" id="image" data-image="{{ asset('/card/' . $row->image) }}">
                        <div id="editor_container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://scaleflex.cloudimg.io/v7/plugins/filerobot-image-editor/latest/filerobot-image-editor.min.js">
    </script>
    <script>
        const dataImg = document.querySelector('#image');
        let imageUrl = dataImg.getAttribute('data-image');
        let image = null;
        let files = null;
        const {
            TABS,
            TOOLS
        } = FilerobotImageEditor;
        const config = {
            source: imageUrl,
            onSave: async (imageInfo, designState) => {
                image = imageInfo.imageBase64;
                
            },
            annotationsCommon: {
                fill: '#ff0000',
            },
            Text: {
                text: 'Edit text here...'
            },
            Rotate: {
                angle: 90,
                componentType: 'slider'
            },
            translations: {
                profile: 'Profile',
                coverPhoto: 'Cover photo',
                facebook: 'Facebook',
                socialMedia: 'Social Media',
                fbProfileSize: '1080x1080px',
                fbCoverPhotoSize: '820x312px',
            },
            Crop: {
                presetsItems: [{
                        titleKey: 'Post Instagram',
                        descriptionKey: '1:1',
                        ratio: 1 / 1,
                    },
                    {
                        titleKey: 'cinemascope',
                        descriptionKey: '21:9',
                        ratio: 21 / 9,
                    },
                ],
                presetsFolders: [{
                    titleKey: 'socialMedia',
                    groups: [{
                        titleKey: 'instagram',
                        items: [{
                                titleKey: 'post',
                                width: 1080,
                                height: 1080,
                                descriptionKey: 'fbProfileSize',
                            },
                            {
                                titleKey: 'coverPhoto',
                                width: 820,
                                height: 312,
                                descriptionKey: 'fbCoverPhotoSize',
                            },
                        ],
                    }, ],
                }, ],
            },
            tabsIds: [TABS.ANNOTATE, TABS.FILTERS, ], // or ['Adjust', 'Annotate', 'Watermark']
            defaultTabId: TABS.ANNOTATE, // or 'Annotate'
            defaultToolId: TOOLS.TEXT, // or 'Text'
        };

        // Assuming we have a div with id="editor_container"
        const filerobotImageEditor = new FilerobotImageEditor(
            document.querySelector('#editor_container'),
            config,
        );

        filerobotImageEditor.render({
            onClose: (closingReason) => {
                console.log('Closing reason', closingReason);
                filerobotImageEditor.terminate();
            },
        });

        async function share() {
            try {
                await navigator.share({
                    title: 'Hello',
                    text: 'Check out this image!',
                    files: [files],
                });
                console.log('shared successfully')
            } catch (err) {
                alert(`Your system doesn't support sharing these files.`)
            }
        }
    </script>

@endsection
