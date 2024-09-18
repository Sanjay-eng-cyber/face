@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    margin:50px  auto;
    padding: 0 0;
    height: auto;
    min-height: 50px;
}


/* Custom css */
.dropzone.dz-clickable{
    cursor: pointer;
    background: #fafafa;
    color: #396E90;
    font-weight: 700;
    letter-spacing: 1px;
    font-family: 'Roboto', sans-serif;
    border:1px solid #cccccc;
    border-radius: 2px;
}
.dropzone .camera-img{
    display: inline-block;
    width: 20px;
    height: 20px;
    margin: 0 15px;
    position: absolute;
    left: 0;
}
.dropzone .img-circle{position: relative;display: inline-block;padding-left: 45px;}
.dropzone .camera-img img{
    width: 100%;
    height: 100%;
    display: block;
}
.dropzone .dz-preview .dz-details .dz-filename:hover span{
    border: 1px solid transparent; 
}
.dropzone .dz-message{margin: 15px;}
.dropzone .dz-preview .dz-details .dz-size{display: none;}
.dropzone .dz-preview .dz-details{
    height: 50px;
    min-height: 50px;
    padding:0;
    padding-left: 25px;
    text-align: left;
    display: flex;
    align-items: center;
    opacity: 1;
    justify-content: space-between;
}
.dropzone .dz-preview.image__open .dz-details{
    padding-left: 55px;
}
.dropzone .dz-preview{width: 100%;height: 50px;min-height: 50px;margin: 0;}
.dropzone .dz-preview .dz-progress{
    left: -1px;
    right: -1px;
    margin: 0;
    top: -5px;
    height: 5px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    width: auto;
}
.dropzone .dz-preview .dz-image{
    height: 50px;
    width: 50px;
    border-radius: 0 !important;
    display: none;
}
.dropzone .dz-preview .dz-details .dz-filename{display:flex;}
.dropzone .dz-preview:hover .dz-image img{
    -webkit-transform:none;
    -moz-transform:none;
    -ms-transform:none;
    -o-transform:none;
     transform:none; 
     -webkit-filter: none; 
     filter: none; 
}
.dropzone .dz-preview .dz-image img{
     height: 100%;
     width: 100%;
}
.dropzone .dz-preview .dz-progress .dz-upload{
    background: #396E90;   
}
.dropzone .dz-preview .dz-error-message{
    top: auto;
    left: 0;
    background: linear-gradient(to bottom, #ff0000, #ff0000);
    background: #ff0000;
}
.dropzone .dz-preview .dz-error-message:after{
    border-bottom: 6px solid #ff0000;
}
.dropzone .dz-preview .dz-remove{
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
.dropzone .dz-preview .dz-remove:hover{
    text-decoration: none;
}
.dropzone .dz-preview.image__open .dz-image{display: block;}
.dropzone .dz-preview.image__open .uploading{display: none;}
</style>
@endsection

@section('content')

<div class="wrapper">
    <h1>Upload image with progressbar.</h1>
    	<input type="hidden" name="resume_file_url" id="id_resume_file_url">
        <section>
            <div id="dropzone">
                <form class="dropzone needsclick demo-upload"  action="/upload">
                    <div class="dz-message needsclick">
                        <div class=" img-circle"> <i class="camera-img"><img src="images/photo-camera.svg" alt=""></i>Add photo of slide.</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 800);
  }
}

});


// Now fake the file upload, since GitHub does not handle file uploads
// and returns a 404

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
