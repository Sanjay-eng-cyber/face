@extends('frontend.layouts.app')
@section('title')
@section('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: white !important;
        }

        h1 {
            text-align: center;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Roboto', sans-serif;
        }

        .dropzone {
            background: white;
            border-radius: 5px;
            max-width: 500px;
            margin: 50px auto;
            padding: 0 0;
            height: auto;
            min-height: 50px;
        }


        /* Custom css */
        .dropzone.dz-clickable {
            cursor: pointer;
            background: #fafafa;
            color: #396E90;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Roboto', sans-serif;
            border: 1px solid #cccccc;
            border-radius: 2px;
        }

        .dropzone .camera-img {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin: 0 15px;
            position: absolute;
            left: 0;
        }

        .dropzone .img-circle {
            position: relative;
            display: inline-block;
            padding-left: 45px;
        }

        .dropzone .camera-img img {
            width: 100%;
            height: 100%;
            display: block;
        }

        .dropzone .dz-preview .dz-details .dz-filename:hover span {
            border: 1px solid transparent;
        }

        .dropzone .dz-message {
            margin: 15px;
        }

        .dropzone .dz-preview .dz-details .dz-size {
            display: none;
        }

        .dropzone .dz-preview .dz-details {
            height: 50px;
            min-height: 50px;
            padding: 0;
            padding-left: 25px;
            text-align: left;
            display: flex;
            align-items: center;
            opacity: 1;
            justify-content: space-between;
        }

        .dropzone .dz-preview.image__open .dz-details {
            padding-left: 55px;
        }

        .dropzone .dz-preview {
            width: 100%;
            height: 50px;
            min-height: 50px;
            margin: 0;
        }

        .dropzone .dz-preview .dz-progress {
            left: -1px;
            right: -1px;
            margin: 0;
            top: -5px;
            height: 5px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            width: auto;
        }

        .dropzone .dz-preview .dz-image {
            height: 50px;
            width: 50px;
            border-radius: 0 !important;
            display: none;
        }

        .dropzone .dz-preview .dz-details .dz-filename {
            display: flex;
        }

        .dropzone .dz-preview:hover .dz-image img {
            -webkit-transform: none;
            -moz-transform: none;
            -ms-transform: none;
            -o-transform: none;
            transform: none;
            -webkit-filter: none;
            filter: none;
        }

        .dropzone .dz-preview .dz-image img {
            height: 100%;
            width: 100%;
        }

        .dropzone .dz-preview .dz-progress .dz-upload {
            background: #396E90;
        }

        .dropzone .dz-preview .dz-error-message {
            top: auto;
            left: 0;
            background: linear-gradient(to bottom, #ff0000, #ff0000);
            background: #ff0000;
        }

        .dropzone .dz-preview .dz-error-message:after {
            border-bottom: 6px solid #ff0000;
        }

        .dropzone .dz-preview .dz-remove {
            color: #396E90;
            text-decoration: none;
            padding: 0 25px;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            z-index: 999999;
        }

        .dropzone .dz-preview .dz-remove:hover {
            text-decoration: none;
        }

        .dropzone .dz-preview.image__open .dz-image {
            display: block;
        }

        .dropzone .dz-preview.image__open .uploading {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="wrapper">
        <h1>Upload image with progressbar.</h1>
        <input type="hidden" name="resume_file_url" id="id_resume_file_url">
        <section>
            <div id="dropzone">
                <form class="dropzone needsclick demo-upload" action="/upload">
                    <div class="dz-message needsclick">
                        <div class=" img-circle"> Add photo </div>
                    </div>

                </form>
            </div>


        </section>
        <div id="preview-template" style="display: none;">
            <div class="dz-preview dz-file-preview">
                <div class="dz-image"><img data-dz-thumbnail=""></div>
                <div class="dz-details">
                    <div class="dz-filename"><span class="uploading">Uploading - </span><span data-dz-name=""></span></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
            </div>
        </div>

    @endsection
    @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
            integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var dropzone = new Dropzone('.demo-upload', {
                url: "/upload/",
                maxFilesize: 4,
                addRemoveLinks: true,
                acceptedFiles: ".jpeg, .jpg, .png, .gif, .WebP, .svg",
                previewTemplate: document.querySelector('#preview-template').innerHTML,
                parallelUploads: 2,
                thumbnailHeight: 50,
                thumbnailWidth: 50,
                maxFilesize: 1,
                filesizeBase: 100000000000,
                success: function(file, response) {
                    file.previewElement.classList.add("image__open");
                },
                thumbnail: function(file, dataUrl) {
                    if (file.previewElement) {
                        file.previewElement.classList.remove("dz-file-preview");
                        var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                        for (var i = 0; i < images.length; i++) {
                            var thumbnailElement = images[i];
                            thumbnailElement.alt = file.name;
                            thumbnailElement.src = dataUrl;
                        }
                        setTimeout(function() {
                            file.previewElement.classList.add("dz-image-preview");
                        }, 800);
                    }
                }

            });


            var minSteps = 6,
                maxSteps = 100,
                timeBetweenSteps = 300,
                bytesPerStep = 10000;

            dropzone.uploadFiles = function(files) {
                var self = this;

                for (var i = 0; i < files.length; i++) {

                    var file = files[i];
                    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                    for (var step = 0; step < totalSteps; step++) {
                        var duration = timeBetweenSteps * (step + 1);
                        setTimeout(function(file, totalSteps, step) {
                            return function() {
                                file.upload = {
                                    progress: 100 * (step + 1) / totalSteps,
                                    total: file.size,
                                    bytesSent: (step + 1) * file.size / totalSteps
                                };

                                self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                                if (file.upload.progress == 100) {
                                    file.status = Dropzone.SUCCESS;
                                    self.emit("success", file, 'success', null);
                                    self.emit("complete", file);
                                    self.processQueue();
                                }
                            };
                        }(file, totalSteps, step), duration);
                    }
                }
            }
        </script>
    @endsection



{{-- 
@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">

<style>
  .dropzone {
    border: 2px dashed #007bff;
    border-radius: 10px;
    background: #f9f9f9;
    padding: 20px;
  }
  .dz-image img {
    max-width: 100px;
  }
  .progress-bar {
    background-color: #007bff;
  }
</style>
@endsection
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Upload Multiple Images with Progress Bars</h2>
    
    <form action="/upload" class="dropzone" id="imageUpload">
      <div class="dz-message">
        Drag & drop your images here or click to select files
      </div>
    </form>
    
    <div class="mt-3" id="uploadStatus">
    </div>
  </div>

@endsection
@section('js')

 <!-- Bootstrap JS and Popper.js CDN -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
 <!-- Dropzone.js JS CDN -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

 <script>
   Dropzone.autoDiscover = false;
   const myDropzone = new Dropzone("#imageUpload", {
     maxFilesize: 5,
     acceptedFiles: "image/*",
     init: function() {
       this.on("addedfile", function(file) {
         console.log("File added:", file);
       });

       this.on("uploadprogress", function(file, progress) {
         let progressElement = file.previewElement.querySelector(".progress-bar");
         if (!progressElement) {
           const progressTemplate = `
             <div class="progress mt-2">
               <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
           `;
           file.previewElement.insertAdjacentHTML("beforeend", progressTemplate);
           progressElement = file.previewElement.querySelector(".progress-bar");
         }
         progressElement.style.width = progress + "%";
         progressElement.setAttribute("aria-valuenow", progress);
       });

       this.on("success", function(file, response) {
         console.log("Upload Success:", file, response);
       });

       this.on("error", function(file, errorMessage) {
         console.error("Upload Failed:", errorMessage);
       });
     }
   });
 </script>

@endsection --}}


{{-- 
@extends('frontend.layouts.app')
@section('title')
@section('cdn')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<style>
  .dropzone {
    border: 2px dashed #007bff;
    border-radius: 10px;
    background: #f0f8ff;
    padding: 40px;
    transition: background-color 0.3s ease;
  }
  .dropzone:hover {
    background-color: #e6f7ff;
  }
  .dz-message {
    color: #007bff;
    font-size: 1.5rem;
    text-align: center;
  }
  .dz-image img {
    max-width: 100px;
    margin-top: 10px;
  }
  .progress-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
  }
  .progress-container img {
    max-width: 100px;
    margin-right: 15px;
  }
  .progress-bar {
    background-color: #007bff;
    height: 8px;
    border-radius: 5px;
  }
  .file-name {
    margin-bottom: 5px;
    font-size: 0.9rem;
    font-weight: 500;
    color: #333;
  }
</style>


@endsection
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Upload Multiple Images with Progress Bars</h2>
    
    <form action="/upload" class="dropzone" id="imageUpload">
      <div class="dz-message">
        Drag & drop your images here or click to select files
      </div>
    </form>

    <div class="mt-3" id="uploadStatus"></div>
  </div>


@endsection
@section('js')


 <!-- Bootstrap JS and Popper.js CDN -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
 <!-- Dropzone.js JS CDN -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

 <script>
   Dropzone.autoDiscover = false;

   const myDropzone = new Dropzone("#imageUpload", {
     maxFilesize: 5, 
     acceptedFiles: "image/*", 
     url: "/upload", 
     init: function() {
       this.on("addedfile", function(file) {
         const previewUrl = URL.createObjectURL(file);
         
         const progressContainer = document.createElement('div');
         progressContainer.classList.add('progress-container');

         const imagePreview = `
           <img src="${previewUrl}" class="img-thumbnail">
         `;
         
         const fileInfo = `
           <div style="flex-grow: 1;">
             <div class="file-name">${file.name}</div>
             <div class="progress">
               <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
           </div>
         `;

         progressContainer.innerHTML = imagePreview + fileInfo;
         document.getElementById('uploadStatus').appendChild(progressContainer);
       });

       this.on("uploadprogress", function(file, progress) {
         const progressBar = file.previewElement.querySelector(".progress-bar");
         if (progressBar) {
           progressBar.style.width = progress + "%";
           progressBar.setAttribute("aria-valuenow", progress);
         }
       });

       this.on("success", function(file, response) {
         console.log("Upload Success:", file, response);
       });

       this.on("error", function(file, errorMessage) {
         console.error("Upload Failed:", errorMessage);
       });
     }
   });
 </script>

@endsection --}}


{{-- 

@extends('frontend.layouts.app')
@section('title')
@section('cdn')

 
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<style>
  body {
    font-family: Arial, sans-serif;
    padding: 20px;
  }
  .filepond--item {
    width: calc(50% - 0.5em);
  }
  .filepond--file {
    border-radius: 12px;
  }
  .container {
    max-width: 800px;
    margin: 0 auto;
  }
  h2 {
    text-align: center;
    margin-bottom: 20px;
  }
</style>

@endsection
@section('content')

<div class="container">
    <h2>Upload Multiple Images with Progress Bar</h2>
     <input type="file" class="filepond" name="file" multiple data-max-files="5" data-max-file-size="5MB" />
</div>

@endsection
@section('js')

<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
  <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

  <script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
    const pond = FilePond.create(document.querySelector('input[type="file"]'), {
      server: {
        url: '/upload',
        process: {
          headers: {
            'x-custom-header': 'CustomHeaderValue' 
          },
          onload: (response) => console.log(response),
          onerror: (response) => alert("Upload failed!"),
        },
      },
      allowMultiple: true,
      maxFiles: 5,
      labelIdle: 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>',
      onprocessfile: (error, file) => {
        if (!error) {
          console.log('File processed successfully', file);
        }
      },
    });

    pond.setOptions({
      allowRevert: true, 
      instantUpload: true, 
    });
  </script>

@endsection --}}


{{-- 
@extends('frontend.layouts.app')
@section('title')
@section('cdn')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .dz-message {
      text-align: center;
      font-size: 20px;
      color: #333;
    }

    .progress {
      width: 100%;
      background-color: #f3f3f3;
      border-radius: 4px;
      margin-top: 10px;
      height: 20px;
      overflow: hidden;
      position: relative;
    }

    .progress-bar {
      height: 100%;
      background-color: #4caf50;
      width: 0%;
      transition: width 0.4s ease;
    }

    .progress-text {
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      color: white;
      font-weight: bold;
      line-height: 20px;
    }
  </style>


@endsection
@section('content')
<div class="container">
    <h2>Upload Multiple Images with Line-Based Progress Bar</h2>
    <form action="/upload" class="dropzone" id="my-dropzone">
      <div class="dz-message">
        Drag & Drop your files here or click to upload
      </div>
    </form>
  </div>
@endsection
@section('js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

<script>
  Dropzone.autoDiscover = false;
  const myDropzone = new Dropzone("#my-dropzone", {
    url: "/upload", 
    maxFilesize: 5, 
    parallelUploads: 5,
    uploadMultiple: false,
    addRemoveLinks: true,
    init: function () {
      this.on("addedfile", function (file) {
        const progressContainer = document.createElement('div');
        progressContainer.classList.add('progress');
      const progressBar = document.createElement('div');
        progressBar.classList.add('progress-bar');
  
        const progressText = document.createElement('div');
        progressText.classList.add('progress-text');
        progressText.innerText = '0%';

        progressBar.appendChild(progressText);

        progressContainer.appendChild(progressBar);

        file.previewElement.appendChild(progressContainer);

        file.progressBar = progressBar;
        file.progressText = progressText;
      });

      this.on("uploadprogress", function (file, progress) {
        const percentage = Math.round(progress); 
        file.progressBar.style.width = `${percentage}%`; 
        file.progressText.innerText = `${percentage}%`; 
      });

      // Event for successful file upload
      this.on("success", function (file, response) {
        console.log("File uploaded successfully");
      });

      // Event for upload error
      this.on("error", function (file, errorMessage) {
        alert('Error uploading file: ' + errorMessage);
      });
    }
  });
</script>

@endsection --}}
