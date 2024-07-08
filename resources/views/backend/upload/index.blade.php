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
        <!-- Matched images will be displayed here -->
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   
 

    <script>
        function getCSRFToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Access the webcam and stream video
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    var video = document.getElementById('video');
                    video.srcObject = stream;
                })
                .catch(function (err) {
                    console.log("Error accessing webcam: " + err.message);
                });

            // Capture image from video stream
            document.getElementById('captureButton').addEventListener('click', function () {
                var video = document.getElementById('video');
                var canvas = document.getElementById('canvas');
                var context = canvas.getContext('2d');

                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                var imageDataURL = canvas.toDataURL('image/png');

                var csrfToken = getCSRFToken();

                fetch('http://127.0.0.1:8000/capture/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-Token': csrfToken
                    },
                    // body: 'imageData=' + encodeURIComponent(imageDataURL),
                    body: 'imageData=' + encodeURIComponent(imageDataURL) + '&eventid=' + encodeURIComponent(document.getElementById('eventid').value),

                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Server Response:', data); // Log entire server response

                    var matchedImagesContainer = document.getElementById('matchedImagesContainer');
                    matchedImagesContainer.innerHTML = ''; // Clear previous images

                    // Check if data.matched_images is an array
                    if (Array.isArray(data.matched_images)) {
                        console.log('Matched Images:', data.matched_images); 
                        if (data.matched_images.length > 0) {
                            data.matched_images.forEach(function (imageName) {
                                console.log('Appending image:', imageName); // Log each image name
                                var fullImageUrl = 'http://127.0.0.1:8000/media/' + imageName;
                                var imgElement = document.createElement('img');
                                imgElement.src = fullImageUrl;
                                imgElement.alt = 'Matched Image';
                                imgElement.style.maxWidth = '400px';
                                imgElement.style.maxHeight = '400px';
                                matchedImagesContainer.appendChild(imgElement);
                            });
                        } else {
                            console.log('No matched images found.');
                            var pElement = document.createElement('p');
                            pElement.textContent = 'No matched images found.';
                            matchedImagesContainer.appendChild(pElement);
                        }
                    } else if (typeof data.matched_images === 'object' && Object.keys(data.matched_images).length > 0) {
                        // Handle case where matched_images is an object with keys
                        console.log('Matched Images (object):', data.matched_images);

                        Object.keys(data.matched_images).forEach(function (key) {
                            console.log('Appending image:', data.matched_images[key]); // Log each image name
                            var imagename =  data.matched_images[key];
                            imagename.forEach(function (imageObject) {
                              //  console.log('Name:', imageObject.name); // Log the image name
                                //console.log('URL:', imageObject.url); // Log the image URL

                            var fullImageUrl = 'http://127.0.0.1:8000' + imageObject.url;
                            var imgElement = document.createElement('img');
                            imgElement.src = fullImageUrl;
                            imgElement.alt = 'Matched Image';
                            imgElement.style.maxWidth = '400px';
                            imgElement.style.maxHeight = '400px';0
                            matchedImagesContainer.appendChild(imgElement);
                            })
                            
                        });
                    } else {
                        console.log('No matched images found or invalid data.');
                        var pElement = document.createElement('p');
                        pElement.textContent = 'No matched images found.';
                        matchedImagesContainer.appendChild(pElement);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    var pElement = document.createElement('p');
                    pElement.textContent = 'Error fetching data from server.';
                    matchedImagesContainer.appendChild(pElement);
                });
            });
        });
    </script>
</body>
</html>