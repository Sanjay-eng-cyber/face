<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capture Image</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h1 class="mt-5">Webcam Image Capture</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="webcam-tab" data-toggle="tab" href="#webcam" role="tab"
                    aria-controls="webcam" aria-selected="true">Webcam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="upload-tab" data-toggle="tab" href="#upload" role="tab"
                    aria-controls="upload" aria-selected="false">Upload</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="webcam" role="tabpanel" aria-labelledby="webcam-tab">
                <form id="captureForm" method="post">
                    @csrf
                    <input type="hidden" name="eventid" id="eventid" value="{{ $eventid }}">
                    <div class="form-group">
                        <video id="video" width="640" height="480" autoplay class="form-control"
                            style="width: 400px;height: 400px;"></video>
                    </div>
                    <button id="captureButton" type="button" class="btn btn-primary">Capture Image</button>
                    <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
                </form>
            </div>
            <div class="tab-pane fade" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                <form id="uploadForm" method="post" action="{{ route('backend.upload.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="eventid" id="eventid" value="{{ $eventid }}">
                    <div class="form-group">
                        <label for="imageUpload">Upload Image</label>
                        <input type="file" id="imageUpload" name="imageUpload" class="form-control-file">
                    </div>
                    <button id="uploadButton" type="submit" class="btn btn-primary">Upload Image</button>
                </form>
            </div>
        </div>
    </div>


    <div id="matchedImagesContainer">
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        function getCSRFToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }
    
        document.addEventListener('DOMContentLoaded', function() {
            // Access the webcam and stream video
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    var video = document.getElementById('video');
                    video.srcObject = stream;
                })
                .catch(function(err) {
                    console.log("Error: " + err.message);
                });
    
            // Capture image from video stream
            document.getElementById('captureButton').addEventListener('click', function() {
                var video = document.getElementById('video');
                var canvas = document.getElementById('canvas');
                var context = canvas.getContext('2d');
    
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                var imageDataURL = canvas.toDataURL('image/png');
    
                var csrfToken = getCSRFToken();
    
                fetch('{% url 'capture_input_image' %}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRFToken': csrfToken
                        },
                        body: 'imageData=' + encodeURIComponent(imageDataURL),
                    })
                    .then(response => response.json())
                    .then(data => {
                        var matchedImagesContainer = document.getElementById('matchedImagesContainer');
                        matchedImagesContainer.innerHTML = '';
                        if (data.matched_images.length > 0) {
                            data.matched_images.forEach(function(imageUrl) {
                                var fullImageUrl = '/static/' + imageUrl;
                                var imgElement = document.createElement('img');
                                imgElement.src = fullImageUrl;
                                imgElement.alt = 'Matched Image';
                                matchedImagesContainer.appendChild(imgElement);
                            });
                        } else {
                            var pElement = document.createElement('p');
                            pElement.textContent = 'No matched images found.';
                            matchedImagesContainer.appendChild(pElement);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>


</body>

</html>
