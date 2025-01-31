@extends('backend.layouts.app')
@section('title', 'Upload Images | ' . $event->name . ' | ' . $category->name)

@section('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .lg-icon {
            background: transparent !important;
        }

        .dropzone .dz-preview.dz-complete .dz-progress {
            opacity: 1;
        }

        .dropzone .dz-preview .dz-progress {
            opacity: 1;
            z-index: 1000;
            pointer-events: none;
            position: absolute;
            height: 9px;
            left: 0%;
            top: 79%;
            margin-top: 0px;
            width: 100%;
            /* margin-left: -40px; */
            background: rgba(255, 255, 255, .9);
            -webkit-transform: scale(1);
            border-radius: 8px;
            overflow: hidden;
            margin: 0px;
        }

        .dropzone .dz-preview.dz-image-preview {
            padding-left: 10px;
            padding-right: 10px;
        }

        .dropzone {
            background: white;
            border-radius: 5px;
            /* max-width: 560px; */
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
            border: 4px dashed #cccccc;
            border-radius: 2px;
            padding: 5px 10px 10px 10px;
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
        }

        .dropzone .camera-img img {
            width: 100%;
            height: 100%;
            display: block;
        }

        .dz-filename {

            display: inline-block;
            /* Ensure it behaves like a block for text overflow */
            max-width: 200px;
            /* Set a maximum width for the filename container */
            white-space: nowrap;
            /* Prevent text from wrapping to the next line */
            overflow: hidden;
            /* Hide the overflowing text */
            text-overflow: ellipsis;
            /* Add ellipsis (...) to indicate that the text is truncated */
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
            height: 55px;
            min-height: 50px;
            margin: 0;
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
            top: 27%;
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


        @media screen and (max-width:576px) {
            .dz-filename {
                display: inline-block;
                max-width: 73px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
    </style>
@endsection

@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h2 text-clr fw-600">
                                Upload Images
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2">
                           

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Upload Images</a>
                                    </li>
                                </ol>
                            </nav>


                        </div>
                    </div>
                </div>
            </div>

            <div class="info statbox widget box box-shadow mt-3 mt-lg-4">
                <div class="row widget-header">
                    <div class="col-md-11">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Event
                                                    Name</label><br>
                                                <p class="label-title">{{ $category->event->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Category
                                                    Name</label><br>
                                                <p class="label-title">{{ $category->name }}</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-12">

                                            <section>
                                                <div id="dropzone">
                                                    <form class="dropzone needsclick demo-upload" method="post"
                                                        action="/upload/{{ $event->slug }}/{{ $category->slug }}">
                                                        @csrf
                                                        <div class="dz-message needsclick ">
                                                            <div class="d-flex flex-column align-items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                    width="40" height="40" fill="currentColor">
                                                                    <path d="M12 2l-5 5h3v6h4V7h3l-5-5zm6 15H6v2h12v-2z" />
                                                                </svg>

                                                                <div class=" img-circle h5">
                                                                    Drag and Drop here photos
                                                                </div>
                                                                <div class="h5">Or</div>

                                                                <div class=" img-circle h5"
                                                                    style="color:#445ede;font-weight:600">
                                                                    Browse Photos
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </form>
                                                </div>
                                                {{-- @if ($errors->has('file'))
                                                    <div class="text-danger" role="alert">{{ $errors->first('file') }}
                                                    </div>
                                                @endif --}}
                                            </section>

                                            <div id="preview-template" style="display: none;">
                                                <div class="dz-preview dz-file-preview"
                                                    style="position: relative;isolation:isolate">
                                                    <div class="dz-image">
                                                        <img data-dz-thumbnail="">
                                                    </div>
                                                    <div class="dz-details">
                                                        <div class="dz-filename">
                                                            <span class="uploading">Uploading - </span>
                                                            <span data-dz-name=""></span>
                                                        </div>
                                                    </div>
                                                    <div class="dz-progress">
                                                        <span class="dz-upload" data-dz-uploadprogress=""></span>
                                                    </div>
                                                    <div class="dz-error-message">
                                                        <span data-dz-errormessage=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="widget-content widget-content-area">

            </div> --}}
        </div>
    </div>
@endsection
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
        integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var eventSlug = '{{ $event->slug }}';
        var categorySlug = '{{ $category->slug }}';

        Dropzone.autoDiscover = false;

        var previewTemplate = `
                <div class="dz-preview dz-file-preview">
                    <div style="display: flex;align-items: center;">
                        <span class="dz-filename"  ><strong data-dz-name></strong></span>
                        (<span class="dz-size" data-dz-size></span>)
                    </div>
                    <div class="progress" style="margin-top: 8px">
                        <div class="progress-bar" role="progressbar" data-dz-uploadprogress></div>
                    </div>
                    <div class="dz-success-mark"><span>✔</span></div>
                    <div class="dz-error-mark"><span>✘</span></div>
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                </div>
            `;

        var totalFiles = 0; // Track the total number of files being processed

        var dropzone = new Dropzone('.demo-upload', {
            url: `/upload/${eventSlug}/${categorySlug}`,
            autoProcessQueue: false, // Prevent automatic upload
            maxFiles: 10000, // Set a high limit
            maxFilesize: 10, // Max file size (in MB)
            addRemoveLinks: true,
            acceptedFiles: ".jpeg, .jpg, .png",
            autoQueue: true,
            autoProcessQueue: true,
            parallelUploads: 1, // Only one upload at a time
            previewTemplate: previewTemplate,
            thumbnailHeight: null,
            thumbnailWidth: null,
            // uploadMultiple: true
            init: function() {
                var myDropzone = this;

                // Warn the user if files are still in the queue before unloading the page
                function warnBeforeUnload(event) {
                    var message = "You have files still being processed.";
                    event.preventDefault();
                    event.returnValue = message; // This will show the warning dialog
                    return message;
                }

                // Enable or disable the unload warning based on file count
                function checkFileCount() {
                    if (totalFiles > 0) {
                        window.addEventListener('beforeunload', warnBeforeUnload); // Add warning
                    } else {
                        window.removeEventListener('beforeunload',
                            warnBeforeUnload); // Remove warning
                    }
                }

                // Event: when a file is added
                myDropzone.on("addedfile", function(file) {
                    totalFiles++; // Increase the count when a file is added
                    checkFileCount(); // Check if the warning needs to be enabled

                    // Automatically process the queue if no files are currently uploading
                    if (myDropzone.getUploadingFiles().length === 0 && myDropzone
                        .getQueuedFiles()
                        .length > 0) {
                        myDropzone.processQueue(); // Process the first file in the queue
                    }
                });

                // Event: when a file upload is successful
                myDropzone.on("success", function(file, response) {
                    console.log("File uploaded successfully:", response);
                    file.previewElement.classList.add("dz-success");
                    file.fileName = response
                        .fileName; // Store the file name for potential removal later
                    file.id = response
                        .id;

                    totalFiles--; // Decrease the count after successful upload
                    checkFileCount(); // Check if the warning can be removed

                    // Process the next file in the queue after the current one is done
                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    }
                });

                // Event: when a file upload fails
                myDropzone.on("error", function(file, errorMessage) {
                    console.log("File upload error:", errorMessage);
                    file.previewElement.classList.add("dz-error");
                    var message = (typeof errorMessage === 'object' && errorMessage.message) ?
                        errorMessage.message : errorMessage;
                    var errorDisplay = file.previewElement.querySelector("[data-dz-errormessage]");
                    if (errorDisplay) {
                        errorDisplay.textContent =
                            message; // Set the error message in the preview template
                    }

                    totalFiles--; // Decrease the count after error
                    checkFileCount(); // Check if the warning can be removed

                    // Continue processing the next file in the queue, even if an error occurs
                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    }
                });

                // Event: when the upload progress changes
                myDropzone.on("uploadprogress", function(file, progress) {
                    var progressElement = file.previewElement.querySelector(
                        "[data-dz-uploadprogress]");
                    progressElement.style.width = progress +
                        "%"; // Update progress bar width
                    progressElement.textContent = progress +
                        "%"; // Update progress percentage
                });

                // Handle file removal
                myDropzone.on("removedfile", function(file) {
                    if (file.fileName) {
                        // Only delete if the file has been uploaded
                        fetch(`/delete-upload-image/${eventSlug}/${categorySlug}/${file.id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error("Network response was not ok");
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    console.log("File deleted successfully:", data);
                                    totalFiles--; // Decrease the count when a file is removed
                                    checkFileCount
                                        (); // Check if the warning can be removed
                                } else {
                                    console.error("File deletion failed:", data);
                                }
                            })
                            .catch(error => {
                                console.error("Error deleting file:", error);
                            });
                    } else {
                        // For files that weren't uploaded yet
                        totalFiles--; // Decrease the count
                        checkFileCount(); // Check if the warning can be removed
                    }
                });
            }
        });

        // Ensure that files are processed one by one in sequence
        dropzone.on("addedfile", function() {
            if (dropzone.getUploadingFiles().length === 0 && dropzone.getQueuedFiles().length > 0) {
                dropzone.processQueue(); // Process one file at a time
            }
        });
    </script>
@endsection

@section('cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* .dropzone .dz-preview.dz-error:hover .dz-error-message {
                                    width: 100% !important;
                                } */
    </style>

@endsection
