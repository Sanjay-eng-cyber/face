@extends('frontend.layouts.app')
@section('title')
@section('cdn')
    <style>
        .halfarrowt-img {
            display: none;
        }

        .blurhero-img {
            display: none;
        }
    </style>
@endsection
@section('content')
    <section>
        <div style="position: relative">
            <img src="{{ asset('frontend/images/index/smallarrow.svg') }}" alt="" srcset=""
                class="img-fluid smallarrow">
            <img src="{{ asset('frontend/images/index/index-new/leftarrow.svg') }}"
                alt="Full hero image of the website's main section" class="img-fluid full-img3">
            {{-- <img src="{{asset('frontend/images/index/index-new/blurhero.svg')}}" alt="Blurred background hero image" class="img-fluid blurhero-img-login"> --}}
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img3">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">

            <div class="container overflow-hide">
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main">
                    <div class="col-12">
                        <div class="gallery-outer">

                            <div class="gallery-souter">
                                <img src="{{ asset('frontend/images/gallery/bigarrow.svg') }}" alt="" srcset=""
                                    class="img-fluid bigarrow-img">
                                <div class="event-detailsbg" style="position: relative">

                                    <div class="row pb-5 d-flex justify-content-center">
                                        <div class="col-12 col-lg-10">
                                            <div class="row">
                                                <div class="col-12 col-md-5 col-lg-4 mb-4 mb-md-0">

                                                    <div class="scan-face-box">
                                                        <div class="scan-face-box-insider">
                                                            <img src="{{ asset('frontend/images/gallery/faceimg.png') }}"
                                                                alt="" srcset="">
                                                        </div>
                                                        <div class="scan-textbox">
                                                            Scan Your Face
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-7 col-lg-8">
                                                    <div class="upload-section ">
                                                        <div class="icon pb-4">
                                                            <img src="{{ asset('frontend/images/gallery/uploadicon.svg') }}"
                                                                alt="" srcset="" class="img-fluid">
                                                        </div>
                                                        <!-- Dropzone Form -->
                                                        <form action="/file-upload" class="dropzone" id="my-dropzone">
                                                            <div class="dz-message">
                                                                <button type="button" class="mb-3">Browse File</button>
                                                                <div>
                                                                    <div class="h5 mb-0 lwccolor"> Choose a file or drag &
                                                                        drop it here.</div>
                                                                    <div class="fs-10 fw-600 newwcolor">JPEG, PNG, PDF, and
                                                                        MP4 formats, up to 50 MB.</div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-3 pb-4">
                                        <div class="col-12">
                                            <div class="fw-600 h4 mb-0 rounded-4 text-center yr-phototext">
                                                Your photos
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
                                        @forelse ($gallery_images as  $gallery)
                                            <div class="col pb-4">
                                                <div>
                                                    <img src="{{ asset('storage/' . $gallery->image_url) }}"
                                                        alt="Gallery Images" srcset=""
                                                        class="img-fluid rounded-3 w-sm-100">

                                                </div>
                                            </div>

                                        @empty
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-b10">
                                                <p class="text-center mb-0">No Gallery Images Found</p>
                                            </div>
                                        @endforelse
                                        {{-- <div class="col pb-4">
                                            <div>
                                                <img src="{{ asset('frontend/images/eventdetails/2.png') }}" alt=""
                                                    srcset="" class="img-fluid rounded-3 w-sm-100">

                                            </div>
                                        </div> --}}

                                        {{-- <div class="col pb-4">
                                            <div>
                                                <img src="{{ asset('frontend/images/eventdetails/3.png') }}" alt=""
                                                    srcset="" class="img-fluid rounded-3 w-sm-100">

                                            </div>
                                        </div> --}}

                                        {{-- <div class="col pb-4">
                                            <div>
                                                <img src="{{ asset('frontend/images/eventdetails/4.png') }}" alt=""
                                                    srcset="" class="img-fluid rounded-3 w-sm-100">

                                            </div>
                                        </div> --}}


                                        {{-- <div class="col pb-4">
                                            <div>
                                                <img src="{{ asset('frontend/images/eventdetails/5.png') }}" alt=""
                                                    srcset="" class="img-fluid rounded-3 w-sm-100">

                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row ">
                                        <div class="col-xl-12 col-lg-12">
                                            <nav aria-label="Blog Pagination">
                                                <ul class="pagination text-center m-b30 m-t40">
                                                    <li class="page-item">
                                                        {{ $gallery_images->onEachSide(1)->links('pagination::bootstrap-4') }}
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')


    <script>
        // Disable auto Discover for all elements:
        Dropzone.autoDiscover = false;

        // Create Dropzone instance
        const myDropzone = new Dropzone("#my-dropzone", {
            maxFilesize: 50, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.mp4",
            uploadMultiple: false,
            dictDefaultMessage: "",
            clickable: ".dropzone .dz-message button", // Allow clicking button to open file dialog
            init: function() {
                this.on("addedfile", function(file) {
                    console.log("File added:", file);
                });
                this.on("success", function(file, response) {
                    console.log("File uploaded successfully:", response);
                });
            }
        });
    </script>
@endsection
