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
         
            padding: 12px;
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
            /* height: 50px;
            min-height: 50px; */
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

        /* .dropzone .dz-preview {
            width: 100%;
            height: 55px;
            min-height: 50px;
            margin: 0;
        } */



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
            right: 20px;
            top: 19%;
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

        .dropzone.dz-clickable{
            background-image: url(/backend/images/uploadbg.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            color: white;
            border-radius: 10px;
            text-align: center;
            border: 1.32px solid #3AB4B4;
            padding: 35px 35px 35px 35px;
            height: 100%;
            position: relative;
        }
       
        .dropzone.dz-clickable .dz-message{
            position: relative;
            z-index: 2;

        }
        .dropzone .dz-preview.dz-image-preview{
            background: #0C0B0B !important;
            border-radius: 10px;
        }
        .progress{
            background-color:unset !important;
            box-shadow:unset !important;
        }
        .progress-bar{
            background-color: #FE3B96  !important;
        }
        .dropzone .dz-preview .dz-remove{color:white !important}
        .dropzone .dz-preview .dz-cancel{color:white !important}
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

            <div class="info statbox box box-shadow mt-3 mt-lg-4">
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
                                                                <div class="pb-4 browsertext brsr-14pxtx">
                                                                    Drag and Drop here photos
                                                                </div>

                                                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g filter="url(#filter0_d_434_150)">
                                                                    <rect x="4" width="46" height="46" rx="23" fill="#222E4B" shape-rendering="crispEdges"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M27 13C25.8426 12.9998 24.7098 13.3343 23.7381 13.9633C22.7665 14.5923 21.9976 15.4889 21.524 16.545C21.4566 16.6964 21.3876 16.8471 21.317 16.997L21.297 16.998C21.233 17 21.146 17 21 17C19.9391 17 18.9217 17.4214 18.1716 18.1716C17.4214 18.9217 17 19.9391 17 21C17 22.0609 17.4214 23.0783 18.1716 23.8284C18.9217 24.5786 19.9391 25 21 25H21.172L23.172 23H21C20.4696 23 19.9609 22.7893 19.5858 22.4142C19.2107 22.0391 19 21.5304 19 21C19 20.4696 19.2107 19.9609 19.5858 19.5858C19.9609 19.2107 20.4696 19 21 19H21.064C21.272 19 21.514 19.001 21.714 18.96C21.963 18.9174 22.2009 18.8256 22.414 18.69C22.655 18.534 22.821 18.34 22.947 18.163C23.0242 18.049 23.0915 17.9285 23.148 17.803C23.2013 17.6917 23.2667 17.549 23.344 17.375L23.348 17.365C23.6634 16.6602 24.1761 16.0617 24.8241 15.6417C25.4721 15.2217 26.2278 14.9983 27 14.9983C27.7722 14.9983 28.5279 15.2217 29.1759 15.6417C29.8239 16.0617 30.3366 16.6602 30.652 17.365L30.657 17.375C30.7337 17.5483 30.7987 17.691 30.852 17.803C30.898 17.9 30.966 18.041 31.053 18.163C31.179 18.339 31.344 18.534 31.586 18.691C31.828 18.847 32.073 18.918 32.286 18.961C32.486 19.001 32.728 19.001 32.936 19.001L33 19C33.5304 19 34.0391 19.2107 34.4142 19.5858C34.7893 19.9609 35 20.4696 35 21C35 21.5304 34.7893 22.0391 34.4142 22.4142C34.0391 22.7893 33.5304 23 33 23H30.828L32.828 25H33C34.0609 25 35.0783 24.5786 35.8284 23.8284C36.5786 23.0783 37 22.0609 37 21C37 19.9391 36.5786 18.9217 35.8284 18.1716C35.0783 17.4214 34.0609 17 33 17C32.854 17 32.767 17 32.703 16.998H32.683L32.658 16.945C32.5961 16.8122 32.5354 16.6789 32.476 16.545C32.0024 15.4889 31.2335 14.5923 30.2619 13.9633C29.2902 13.3343 28.1574 12.9998 27 13Z" fill="white"/>
                                                                    <path d="M27 22.9999L26.293 22.2929L27 21.5859L27.707 22.2929L27 22.9999ZM28 31.9999C28 32.2652 27.8946 32.5195 27.7071 32.707C27.5195 32.8946 27.2652 32.9999 27 32.9999C26.7348 32.9999 26.4804 32.8946 26.2929 32.707C26.1053 32.5195 26 32.2652 26 31.9999H28ZM22.293 26.2929L26.293 22.2929L27.707 23.7069L23.707 27.7069L22.293 26.2929ZM27.707 22.2929L31.707 26.2929L30.293 27.7069L26.293 23.7069L27.707 22.2929ZM28 22.9999V31.9999H26V22.9999H28Z" fill="white"/>
                                                                    </g>
                                                                    <defs>
                                                                    <filter id="filter0_d_434_150" x="0" y="0" width="54" height="54" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                                    <feOffset dy="4"/>
                                                                    <feGaussianBlur stdDeviation="2"/>
                                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_434_150"/>
                                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_434_150" result="shape"/>
                                                                    </filter>
                                                                    </defs>
                                                                </svg>
                                                                
                                                                <div class="mb-3 guest-uploader">Browse Photos</div>

                                                                <div class="fs-10 fw-600 newwcolor">JPG,JPEG, PNG,WEBP,AVIF formats, up to 1 MB.</div>

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
                 
                    <div class="subgrd-row">
                        <img src="{{asset('backend/assets/img/ct/imgclone.svg')}}" alt="" class="img-fluid h-100">
                        <div class="subgrd-col">
                            <span class="dz-filename"><strong data-dz-name></strong></span>
                            <div class="main-db">
                                <span class="dz-size" data-dz-size></span>
                                <div class="dz-success-mark">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 14px;height:14px">
                                             <path d="M6.99935 1.16699C3.79102 1.16699 1.16602 3.79199 1.16602 7.00033C1.16602 10.2087 3.79102 12.8337 6.99935 12.8337C10.2077 12.8337 12.8327 10.2087 12.8327 7.00033C12.8327 3.79199 10.2077 1.16699 6.99935 1.16699ZM6.99935 11.667C4.42685 11.667 2.33268 9.57283 2.33268 7.00033C2.33268 4.42783 4.42685 2.33366 6.99935 2.33366C9.57185 2.33366 11.666 4.42783 11.666 7.00033C11.666 9.57283 9.57185 11.667 6.99935 11.667ZM9.67685 4.42199L5.83268 8.26616L4.32185 6.76116L3.49935 7.58366L5.83268 9.91699L10.4993 5.25033L9.67685 4.42199Z" fill="#84FF89"/>
                                        </svg>
                                    </span>
                                    <span style="color: #84FF89;font-size:12px;">
                                        Successfully uploaded
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="progress" >
                        <div class="progress-bar" role="progressbar" data-dz-uploadprogress></div>
                    </div>
                    <div class="dz-error-mark"><span>✘</span></div>
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                </div>
            `;

        var totalFiles = 0; // Track the total number of files being processed

        var dropzone = new Dropzone('.demo-upload', {
            url: `/upload/${eventSlug}/${categorySlug}`,
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
            dictRemoveFile: "X",
            dictCancelUpload: "X",
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
                        .fileName; 
                    file.id = response
                        .id;

                    totalFiles--; 
                    checkFileCount(); 

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
