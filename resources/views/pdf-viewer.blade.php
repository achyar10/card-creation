<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
</head>

<body>
    <div class="w-100">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.0.279/pdf_viewer.min.css" integrity="sha512-bhJalmRVg29JjmI5PVxobJ3xL71iUqk9yXhGjEtpuBg1tZ9LZZKF7Bdm8u6JifzvnxnsCB/PR9tZzmNEDE/BvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <canvas id="pdf"></canvas>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.0.279/pdf.min.js" integrity="sha512-QJy1NRNGKQoHmgJ7v+45V2uDbf2me+xFoN9XewaSKkGwlqEHyqLVaLtVm93FzxVCKnYEZLFTI4s6v0oD0FbAlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const url = '{{ $file_path }}';

        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        const pdfjsLib = window['pdfjs-dist/build/pdf'];

        // The workerSrc property shall be specified.
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.0.279/pdf.worker.min.js';

        // Asynchronous download of PDF
        const loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function(pdf) {
            console.log('PDF loaded');

            // Fetch the first page
            var pageNumber = 1;
            pdf.getPage(pageNumber).then(function(page) {
                console.log('Page loaded');

                var scale = 1.5;
                var viewport = page.getViewport({
                    scale: scale
                });

                // Prepare canvas using PDF page dimensions
                var canvas = document.getElementById('pdf');
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(function() {
                    console.log('Page rendered');
                });
            });
        }, function(reason) {
            // PDF loading error
            console.error(reason);
        });
    </script>
</body>
