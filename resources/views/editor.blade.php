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
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <style>
        .mainContainer {
            position: relative;
            display: inline-block;
        }

        #theText {
            position: absolute;
            top: 90px;
            left: 0;
            color: #fff;
            width: auto;
            padding: 5px;
            text-align: left;
            border: dashed 2px #ff7f27;
            display: block;
            cursor: move;
        }

        .demo {
            position: absolute;
        }

        canvas {
            max-width: 100%;
        }
    </style>

    <div class="main-content container">
        <div class="content-wrapper row">
            <div class="col-12 content-header mb-4">
                <h2 class="fw-bold">Tuliskan Pesan Spesialmu!</h2>
            </div>
            <div class="col-12 content-content">
                <div class="container w-100 bg-light p-4 rounded mb-4">
                    <h5 class="fw-bold mb-4">Preview</h5>
                    <div class="w-100 text-center">
                        <div class="mainContainer preview-image">
                            <div class="demo">
                                <img class="img-fluid rounded" src="{{ asset('assets/images/logo.png') }}" id="logo">
                            </div>
                            <div class="demo">
                                <img class="img-fluid rounded" src="{{ asset('assets/images/logo.png') }}" id="logo">
                            </div>
                            <img class="img-fluid rounded" id="preview" src="{{ asset('card/' . $row->image) }}">
                            <div id="theText" onmousedown='this.style.border = "dashed 2px #FF7F27";'>sample text</div>
                        </div>

                    </div>
                </div>
                <div class="form-group fw-bold mb-2">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Color</label>
                            <input type="color" id="color" class="form-control form-control-lg">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group fw-bold">
                            <label for="">Fonts</label>
                            <select name="" id="font" class="form-select">
                                <option value="Arial">Arial</option>
                                <option value="Impact,Charcoal,sans-serif">Impact</option>
                                <option value="sans-serif">Sans Serif</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Helvetica">Helvetica</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group fw-bold">
                            <label for="">Size</label>
                            <input type="number" id="size" class="form-control" value="20">
                        </div>
                    </div>
                </div>
                <div class="form-group fw-bold mb-4">
                    <label for=""></label>
                    <textarea id="textArea" rows="5" class="form-control" placeholder="Edit text here..." onkeyup="writeText(this)"></textarea>
                </div>
            </div>
            <div class="row w-100 m-0">
                <div class="row w-100 m-0">
                    <div class="col-6">
                        <a href="{{ route('theme.category') }}" class="btn btn-cust-secondary w-100 mb-4">
                            Reset
                        </a>
                    </div>

                    <div class="col-6">
                        {{-- <a href="{{ url('/editor/' . $row->card_id) }}" class="btn btn-cust-primary w-100 mb-4">
                            <div class="w-100 d-flex flex-row justify-content-center">
                                Preview
                            </div>
                        </a> --}}
                        <button onclick="saveImageWithText()" class="btn btn-cust-primary w-100 mb-4">
                            <div class="w-100 d-flex flex-row justify-content-center">
                                Preview
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const theText = document.querySelector('#theText');
        const color = document.querySelector('#color');
        const font = document.querySelector('#font');
        const size = document.querySelector('#size');
        let t = 'sample text';
        let textContainer;
        // Make the text element draggable.
        $(document).ready(function() {
            $(function() {
                $('#theText').draggable({
                    containment: 'parent'
                });
                $('.demo')
                    .draggable({
                        containment: 'parent'
                    })
                    .resizable({
                        containment: 'parent'
                    });

            });
        });

        // Get the values that you have entered in the textarea and
        // write it in the DIV over the image.

        let writeText = (ele) => {
            t = ele.value;
            document.getElementById('theText').innerHTML = t.replace(/\n\r?/g, '<br />');
        }

        color.addEventListener("input", function() {
            theText.style.color = this.value;
        });
        font.addEventListener("input", function() {
            theText.style.fontFamily = this.value;
        });
        size.addEventListener("input", function() {
            theText.style.fontSize = this.value + 'px';
        });

        // Finally, save the image with text over it.
        let saveImageWithText = () => {

            textContainer = document.getElementById('theText'); // The element with the text.

            // Create an image object.
            let img = new Image();
            img.src = document.getElementById('preview').src;

            // Create a canvas object.
            let canvas = document.createElement("canvas");

            // Wait till the image is loaded.
            img.onload = function() {
                drawImage();
                downloadImage(img.src.replace(/^.*[\\\/]/, '')); // Download the processed image.
            }

            // Draw the image on the canvas.
            let drawImage = () => {
                let ctx = canvas.getContext("2d"); // Create canvas context.

                // Assign width and height.
                canvas.width = img.width;
                canvas.height = img.height;

                // Draw the image.
                ctx.drawImage(img, 0, 0);

                textContainer.style.border = 0;

                // Get the padding etc.
                let left = parseInt(window.getComputedStyle(textContainer).left);
                let right = textContainer.getBoundingClientRect().right;
                let top = parseInt(window.getComputedStyle(textContainer).top, 0);
                let center = textContainer.getBoundingClientRect().width / 2;

                let paddingTop = window.getComputedStyle(textContainer).paddingTop.replace('px', '');
                let paddingLeft = window.getComputedStyle(textContainer).paddingLeft.replace('px', '');
                let paddingRight = window.getComputedStyle(textContainer).paddingRight.replace('px', '');

                // Get text alignement, colour and font of the text.
                let txtAlign = window.getComputedStyle(textContainer).textAlign;
                let color = window.getComputedStyle(textContainer).color;
                let fnt = window.getComputedStyle(textContainer).font;

                // Assign text properties to the context.
                ctx.font = fnt;
                ctx.fillStyle = color;
                ctx.textAlign = txtAlign;

                // Now, we need the coordinates of the text.
                let x; // coordinate.
                if (txtAlign === 'right') {
                    x = right + parseInt(paddingRight) - 11;
                }
                if (txtAlign === 'left') {
                    x = left + parseInt(paddingLeft);
                }
                if (txtAlign === 'center') {
                    x = center + left;
                }

                // Get the text (it can a word or a sentence) to write over the image.
                let str = t.replace(/\n\r?/g, '<br />').split('<br />');

                // finally, draw the text using Canvas fillText() method.
                for (let i = 0; i <= str.length - 1; i++) {

                    ctx.fillText(
                        str[i]
                        .replace('</div>', '')
                        .replace('<br>', '')
                        .replace(';', ''),
                        x,
                        parseInt(paddingTop, 10) + parseInt(top, 10) + 10 + (i * 15));
                }

                // document.body.append(canvas);  // Show the image with the text on the Canvas.
            }

            // Download the processed image.
            let downloadImage = (img_name) => {
                let a = document.createElement('a');
                a.href = canvas.toDataURL("image/png");
                a.download = img_name;
                document.body.appendChild(a);
                a.click();
            }
        }
    </script>

@endsection
