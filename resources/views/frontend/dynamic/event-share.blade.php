@extends('frontend.layouts.app')
@section('title')
@section('cdn')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .halfarrowt-img {
            display: none;
        }

        .step-three {
            padding-bottom: 75px;
        }

        .blurhero-img {
            display: none;
        }

        .step-two {
            padding-bottom: 120px
        }

        body {

            background-image: url(/frontend/images/gallery/body-bg.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100vh;
            /* background: white; */
            /* This ensures the body takes the full height of the viewport */
        }

        .custom-ctnrfluid {
            background-image: url(/frontend/images/index/navbg.svg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(29px);
            display: flex;
            align-items: center;
            min-height: 106px;
            margin-top: 14px;
            position: fixed;
            width: 98%;
            left: 50%;
            border-radius: 34px;
            transform: translate(-50%);
        }

        @media screen and (max-width: 992px) {
            .pobdh {
                height: 75px;
            }

            .custom-ctnrfluid {
                background-image: unset;
                background-repeat: no-repeat;
                backdrop-filter: blur(29px);
                min-height: unset;
                padding-left: 12px;
                padding-right: 12px;
            }

            .custom-ctnrfluid .navbar-collapse.collapse.show {
                background-image: unset;
                background-repeat: unset;
                background-size: unset;
                backdrop-filter: unset;
                border-bottom-left-radius: unset;
                border-bottom-right-radius: unset;
            }

        }


        @media screen and (max-width: 576px) {
            .custom-ctnrfluid {
                margin-top: 7px;
            }

            .step-three {
                padding-bottom: 55px;
            }

            .step-two {
                padding-bottom: 60px;
                padding-top: 20px;
            }

            .main-div {
                margin-top: -17px;
            }


            .pobdh {
                height: 0px;
            }

            .stepmaincontainer {
                padding-top: 32px;
            }

            .navsmimg {
                position: unset;
                z-index: unset;
                backdrop-filter: unset;
                left: unset;
                transform: unset;
                width: unset;
                top: unset;
                margin-top: unset;
                min-height: unset;
                object-fit: unset;
                display: none;
                border-radius: unset;
            }
        }
    </style>
@endsection
@section('content')

    <!-- Include this SVG in your HTML -->
    <svg width="0" height="0">
        <defs>
            <clipPath id="custom-shape" clipPathUnits="objectBoundingBox">
                <path
                    d="M1 0.363636C1 0.63816 0.77614 1 0.5 1C0.22386 1 0 0.63816 0 0.363636C0 0.0891123 0.22386 0 0.5 0C0.77614 0 1 0.0891123 1 0.363636Z" />
            </clipPath>
        </defs>
    </svg>


    <div id="mainDiv">

        <div class="position-relative">
            <div class="pobdh"></div>
            <!-- <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                                                                                                                    alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2"> -->
            <!-- <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                                                                                                                    alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">
                                                                                                                <img src="{{ asset('frontend/images/gallery/bigarrow.svg') }}" alt="" srcset=""
                                                                                                                    class="img-fluid bigarrow-img-bdptnew d-none d-sm-block" style="z-index: -99">
                                                                                                                <img src="{{ asset('frontend/images/basic-event-one/bigarrow.svg') }}" alt="" srcset=""
                                                                                                                    class="img-fluid bigarrow-img-bdptnew d-block d-sm-none bigarrowsm" style="z-index: -99"> -->

            <div class="main-div">
                <div class="container overflow-hide stepmaincontainer">

                    <div class="pb-5" v-if="step == 1" v-show="step !== 2 && step !== 3">

                        <div class="row d-flex justify-content-center pt-35px position-relative">
                            <img src="{{ asset('frontend/images/basic-event-one/smboxblur.svg') }}" alt=""
                                srcset="" class="img-fluid d-block d-sm-none smboxblurbox ">
                            <div class="col-12 col-lg-11 col-xl-11 col-xxl-10 position-relative z-99">

                                <div class="row">


                                    <div class="col-12 ">


                                        <div class="basic-event-one-main-bdt text-white">

                                            <div class="basic-event-one-main-insider-bdt">
                                                <div>
                                                    <img src="{{ asset('storage/images/events/' . $event->cover_image) }}"
                                                        alt="" class="img-fluid rounded-2 ex-one-img-new-fi">
                                                </div>
                                                <div>
                                                    <div class="eventanddatespit-bdt ">
                                                        <div class="h5 fw-600 mb-0 text-white bdt-eventname">
                                                            {{ $event->name }}
                                                        </div>
                                                        @if ($event->start_date && $event->end_date)
                                                            @if ($event->start_date == $event->end_date)
                                                                <div class="fw-300 fs-14 bdt-date">
                                                                    {{ dd_format($event->start_date, 'd/m/Y') }}
                                                                </div>
                                                            @else
                                                                <div class="fw-300 fs-14 bdt-date">
                                                                    {{ dd_format($event->start_date, 'd/m/Y') }} to
                                                                    {{ dd_format($event->end_date, 'd/m/Y') }}

                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>


                                                    @if ($event->descriptions)
                                                        @php
                                                            $cleanDescription = strip_tags($event->descriptions);
                                                            $shortDescription = Str::limit(
                                                                $cleanDescription,
                                                                180,
                                                                '...',
                                                            );
                                                        @endphp
                                                        <div class="pt-2  fs-14 bdt-date-longpara limit-para">
                                                            <span class="short-text">
                                                                {!! $shortDescription !!}
                                                            </span>
                                                            <span class="full-text d-none">
                                                                {!! nl2br(e($cleanDescription)) !!}
                                                            </span>
                                                            @if (strlen($cleanDescription) > 180)
                                                                <button class="btn show-more-btn">Show More</button>
                                                            @endif
                                                        </div>
                                                    @endif





                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row ptpb-55px" id="enterPinDiv">
                            <div class="col-12">
                                <div class="pin-container d-flex flex-column align-items-center">
                                    <div class="pin-title">Enter Your Pin Number</div>
                                    <form action="" method="post" @submit.prevent="handleStepOneFormSubmit"
                                        class="pin-num">
                                        <div class="d-flex justify-content-center basic-input-main">
                                            <input placeholder="0" v-for="(value, index) in pinValues"
                                                :key="index" type="text" maxlength="1" class="pin-input"
                                                placeholder="0" v-model="pinValues[index]" @input="handleInput(index)"
                                                @keydown="handleBackspace($event, index)" />
                                        </div>
                                        <button type="submit" class="submit-btn">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step-two" v-if="step == 2" v-cloak>

                        <div class="row  pt-17px pb-4 mb-0 mb-sm-3 position-relative d-flex justify-content-center">
                            <img src="{{ asset('frontend/images/basic-event-one/smboxblur.svg') }}" alt=""
                                srcset="" class="img-fluid d-block d-sm-none smboxblurbox ">
                            <div class="col-12 col-lg-11 col-xl-11 col-xxl-10 position-relative z-99">
                                <a href="http://" class="">
                                    <img src="{{ asset('frontend/images/gallery/arrow.svg') }}" alt="Logo"
                                        class="img-fluid mb-2 mb-sm-4">
                                </a>
                                <div class="basic-event-one-main-bdt text-white">
                                    <div class="basic-event-one-main-insider-bdt">
                                        <div>
                                            <img src="{{ asset('storage/images/events/' . $event->cover_image) }}"
                                                alt="" class="img-fluid ex-one-img-new-fi rounded-2">
                                        </div>
                                        <div>
                                            <div class="eventanddatespit-bdt eventanddatespit-bdt-divide">
                                                <div class="h5 fw-600 mb-0 text-white bdt-eventname">
                                                    {{ $event->name }}
                                                </div>
                                                @if ($event->start_date && $event->end_date)
                                                    @if ($event->start_date == $event->end_date)
                                                        <div class=" fw-300 fs-14 bdt-date">
                                                            {{ dd_format($event->start_date, 'd/m/Y') }}</div>
                                                    @else
                                                        <div class=" fw-300 fs-14 bdt-date">
                                                            {{ dd_format($event->start_date, 'd/m/Y') }} to
                                                            {{ dd_format($event->end_date, 'd/m/Y') }}
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>

                                            @if ($event->descriptions)
                                                @php
                                                    $cleanDescription = strip_tags($event->descriptions);
                                                    $shortDescription = Str::limit($cleanDescription, 180, '...');
                                                @endphp
                                                <div class=" pt-2 fs-14 bdt-date-longpara limit-para">
                                                    <span class="short-text">
                                                        {!! $shortDescription !!}
                                                    </span>
                                                    <span class="full-text d-none">
                                                        {!! $cleanDescription !!}
                                                        {{-- {!! nl2br(e($cleanDescription)) !!} --}}
                                                    </span>
                                                    @if (strlen($cleanDescription) > 180)
                                                        <button class="btn show-more-btn">Show More</button>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10 ">
                                <div class="row ">

                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        <form method="post" class="login-form  pt-lg-0"
                                            @submit.prevent="handleStepTwoFormSubmit">
                                            <div class="dblwhitecolor h4 mb-0 fw-600 pb-3 form-details">Details</div>

                                            <div class="pb-2 pb-sm-3 mb-1">
                                                <input type="text" name="name" minlength="8" maxlength="30"
                                                    required placeholder="Enter Your Name" v-model="name" required
                                                    class="form-control sin-input">
                                            </div>

                                            <div class="pb-2 pb-sm-3 mb-1">

                                                <input type="email" name="email" minlength="8" maxlength="40"
                                                    required placeholder="Enter Your Email ID" v-model="email"
                                                    class="form-control sin-input">
                                            </div>

                                            <div class="pb-3 pb-sm-3 mb-1">

                                                <input type="text" id="mobile_number" name="mobile_number"
                                                    minlength="10" maxlength="10" placeholder="Enter Your Mobile Number"
                                                    required v-model="mobile_number" class="form-control sin-input">
                                            </div>


                                            <div>

                                                <button type="submit" class="submit-btn-bept">Submit</button>

                                            </div>


                                        </form>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        <div class="basic-face-box">
                                            <div class="scan-face-box-insider-twopage">
                                                <img id="captured-image" alt="Captured Image"
                                                    class="faceimg-img w-100 h-100 object-fit-cover brd-50"
                                                    :src="userImageData" v-if="userImageData" />
                                                <img src="{{ asset('frontend/images/gallery/faceimg.png') }}"
                                                    alt="" class="faceimg-img" v-else>
                                            </div>

                                            <div class="d-flex flex-column align-items-center gap-2">
                                                <button class="btn scan-facebtn" @click="openCameraModal">
                                                    Scan Your Face
                                                </button>
                                                <div class="ortext">
                                                    Or
                                                </div>
                                                <label for="userImgInput">
                                                    <div class="dz-message scan-textboxbdpt-btn cursor-pointer">
                                                        Upload File
                                                        <input type="file" id="userImgInput"
                                                            @change="handleUserImageFieldChange" hidden>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <div id="cameraModal" class="modal" style="display:none;">

                                            <div class="modal-content">
                                                <div class="h5 mb-0 pb-3 fw-600 text-white scan-your-facetext">
                                                    Scan Your Face
                                                </div>
                                                <div class="w-100 d-flex justify-content-center">
                                                    <div class="model-outer-box">
                                                        <img src="{{ asset('frontend/images/modelimg/top-left.svg') }}"
                                                            alt="" class="img-fluid top-left-img">
                                                        <img src="{{ asset('frontend/images/modelimg/top-right.svg') }}"
                                                            alt="" class="img-fluid top-right-img">
                                                        <img src="{{ asset('frontend/images/modelimg/bottom-left.svg') }}"
                                                            alt="" class="img-fluid bottom-left-img">
                                                        <img src="{{ asset('frontend/images/modelimg/bottom-right.svg') }}"
                                                            alt="" class="img-fluid bottom-right-img">
                                                        <div id="camera-frame">
                                                            <div id="my_camera" class="camera-mask">
                                                                <video id="video" autoplay></video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="capture-area">
                                                    <button class="btn capture-btn" @click="takeSnapshot">Capture</button>
                                                    <div class="btn cancel-btn  close" @click="closeCameraModal">
                                                        Cancel

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        <div class="upload-section">
                                            <label for="userGuestImgInput">
                                                <div class="pb-3 browsertext brsr-14pxtx">
                                                    Browse File
                                                </div>
                                                <div class="d-flex justify-content-center pb-3">
                                                    <div class="uploder-up">
                                                        <img src="{{ asset('frontend/images/gallery/uploadicon.svg') }}"
                                                            alt="" srcset="" class="img-fluid">
                                                    </div>
                                                </div>

                                                <div class="fs-10 fw-600 newwcolor" style="min-height: 16px;">
                                                    <span v-if="guestImagesCount">@{{ guestImagesCount }} Images Selected</span>
                                                </div>

                                                
                                                {{-- <div class="fs-10 fw-600 newwcolor" v-if="guestImagesCount">
                                                    @{{ guestImagesCount }} Images Selected
                                                </div> --}}

                                                <form>
                                                    <div class="dz-message d-flex flex-column align-items-center">
                                                        <div class="mb-2 mt-2 guest-uploader btn nw-guest-updrbtn">
                                                            as Guest Upload
                                                            <input type="file" multiple id="userGuestImgInput"
                                                                @change="handleUserGuestImageFieldChange" hidden />
                                                        </div>
                                                        <div>
                                                            <div class="fs-10 fw-600 newwcolor">
                                                                PNG, JPG, JPEG formats allowed, max 10MB per file and up to 40 files.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </label>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="step-three" v-if="step == 3" v-cloak>




                        <div class="row  pt-35px">

                            <a href="http://" class="">
                                <img src="{{ asset('frontend/images/gallery/arrow.svg') }}" alt="Logo"
                                    class="img-fluid mb-2 mb-sm-4">
                            </a>
                            <div class="col-12">
                                <div class="grid-outer">
                                    <div class="basic-event-one-main h-100">
                                        <div class="fw-600 text-white pb-2 uptoptext">Your Uploaded Photo</div>

                                        <div class="basic-event-one-main-insider-half user-detailsinfo">
                                            <div>
                                                <img :src="userImageData" alt=""
                                                    class="img-fluid textimg-new rounded-3" v-if="userImageData">
                                                <img :src="user_image_url" alt=""
                                                    class="img-fluid textimg-new rounded-3" v-if="user_image_url">
                                            </div>
                                            <div class="details-box-one">

                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="text-white fw-600 h6 mb-0 name-head">Name:</div>
                                                    <div class="text-white fw-600 h5 mb-0 name-title">
                                                        @{{ name }}</div>
                                                </div>

                                                <div class="d-flex align-items-center gap-1 box-one-nummain">
                                                    <div class="text-white fw-600 h6 mb-0 number-head">Number:
                                                    </div>
                                                    <div class="text-white fw-600 h5 mb-0 number-title">
                                                        @{{ mobile_number }}
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center gap-1">
                                                    <div class="text-white fw-600 h6 mb-0 email-head"> Email ID:
                                                    </div>
                                                    <div class="text-white fw-600 h5 mb-0 email-title">
                                                        @{{ email }}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="sgl-divider d-lg-block"></div> --}}
                                    <div class="d-flex align-items-center  justify-content-center">
                                        <div class="vr"></div>
                                    </div>
                                    <div class="basic-event-one-main h-100">
                                        <div class="basic-event-one-main-insider-full">
                                            <div>
                                                <img src="{{ asset('storage/images/events/' . $event->cover_image) }}"
                                                    alt="" class="img-fluid ex-one-img-new rounded-3">
                                            </div>

                                            <div>
                                                <div class="eventanddatespit eventanddatespit-tdbox">
                                                    <div class="h5 fw-600 mb-0 text-white bx-twoeventname">
                                                        {{ $event->name }}
                                                    </div>
                                                    <div class="text-white fw-300 fs-14 fssm-8px bdt-date">
                                                        {{ dd_format($event->start_date, 'd/m/Y') }} to
                                                        {{ dd_format($event->end_date, 'd/m/Y') }}
                                                    </div>
                                                </div>

                                                @if ($event->descriptions)
                                                    @php
                                                        $cleanDescription = strip_tags($event->descriptions);
                                                        $shortDescription = Str::limit($cleanDescription, 180, '...');
                                                    @endphp
                                                    <div class="text-white pt-2 pt-xl-3 fs-14 box-twobtpra limit-para">
                                                        <span class="short-text">
                                                            {!! $shortDescription !!}
                                                        </span>
                                                        <span class="full-text d-none">
                                                            {!! nl2br(e($cleanDescription)) !!}
                                                        </span>
                                                        @if (strlen($cleanDescription) > 180)
                                                            <button class="btn show-more-btn">Show More</button>
                                                        @endif
                                                    </div>

                                                @endif

                                            </div>


                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row pt-3 pb-3 pt-sm-5 pb-sm-4">
                                <div class="d-flex align-items-center  justify-content-between">
                                    <div class="fw-600 h4 mb-0 text-white yourmatchtext">Your Matched Photos </div>
                                    <div>
                                        <a href="javascript:void(0);" class="text-decoration-none text-white"
                                            onclick="rotateAndReload();" @click="refreshMatchedPhotos">
                                            Refresh
                                            <svg id="refreshIcon" width="16" height="17" viewBox="0 0 16 17"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.33333 8.5C9.33333 7.76667 8.73333 7.16667 8 7.16667C7.26667 7.16667 6.66667 7.76667 6.66667 8.5C6.66667 9.23333 7.26667 9.83333 8 9.83333C8.73333 9.83333 9.33333 9.23333 9.33333 8.5ZM8 2.5C6.4087 2.5 4.88258 3.13214 3.75736 4.25736C2.63214 5.38258 2 6.9087 2 8.5H0L2.66667 11.1667L5.33333 8.5H3.33333C3.33333 5.92 5.42 3.83333 8 3.83333C10.58 3.83333 12.6667 5.92 12.6667 8.5C12.6676 9.35719 12.4322 10.1981 11.9864 10.9302C11.5406 11.6623 10.9016 12.2575 10.1397 12.6501C9.3777 13.0428 8.52225 13.2179 7.66729 13.1561C6.81232 13.0944 5.99093 12.7981 5.29333 12.3L4.34667 13.26C5.1031 13.8405 5.98697 14.2323 6.92505 14.403C7.86312 14.5738 8.82837 14.5185 9.74081 14.2417C10.6533 13.965 11.4866 13.4748 12.1718 12.8117C12.857 12.1487 13.3743 11.3319 13.6808 10.429C13.9874 9.52616 14.0744 8.56324 13.9345 7.62007C13.7947 6.67689 13.4321 5.78063 12.8768 5.00554C12.3214 4.23046 11.5894 3.59889 10.7413 3.16316C9.89321 2.72743 8.95348 2.5001 8 2.5Z"
                                                    fill="white" />
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4" id="gallery-mainscn">
                                <div class="col pb-4" v-for="(img, index) in matchedImages" :key="index"
                                    :data-index="index">
                                    <a :src="'/storage/' + img.image_url" :data-download-src="'/storage/' + img.image_url"
                                        data-fancybox="gallery" :data-caption="img.image_name">
                                        <img :src="'/storage/' + img.image_url" alt=""
                                            class="gallery-img img-fluid rounded-3">
                                    </a>

                                </div>
                            </div>


                            <div class="d-flex justify-content-center">
                                <button id="toggleButton" class="btn pink-btn showmshol mt-3"
                                    @click="loadMoreMatchedPhotos" v-if="hasMoreImages">Show More</button>
                            </div>





                        </div>

                    </div>
                </div>

            </div>
        </div>

    @endsection
    @section('js')

        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lodash/lodash.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/webcamjs/webcam.min.js"></script>



        <script>
            const {
                createApp,
                ref
            } = Vue

            createApp({
                data() {
                    return {
                        event_id: '{{ $event->id }}',
                        pinValues: ref(Array(4).fill('')),
                        step: {{ $event->is_pin_protection_required ? 1 : 2 }},
                        name: '',
                        email: '',
                        mobile_number: '',
                        userImageData: null,
                        user_image_url: null,
                        user_id: null,
                        image: null,
                        matchedImages: [],
                        imagesPageCount: 1,
                        hasMoreImages: true,
                        guestImagesCount: 0,
                        guestImages: [],
                    }
                },
                mounted() {
                    let userId = localStorage.getItem("event_user_id");
                    console.log("userId : ", userId);
                    if (userId) {
                        this.user_id = userId;
                        this.fetchUserDetails();
                        // this.fetchMatchedImages();
                    }

                },
                methods: {
                    //     initializeFancybox() {
                    //     this.$nextTick(() => {
                    //         Fancybox.bind('[data-fancybox="gallery"]', {
                    //             buttons: [
                    //                 "zoom",
                    //                 "slideShow",
                    //                 "thumbs",
                    //                 "download",
                    //                 "close"
                    //             ],
                    //             loop: true,
                    //             protect: true
                    //         });
                    //     });
                    // },
                    handleInput(index) {
                        if (this.pinValues[index].length === 1 && index < this.pinValues.length - 1) {
                            this.focusInput(index + 1);
                        }
                    },
                    handleBackspace(event, index) {
                        if (event.key === 'Backspace' && this.pinValues[index] === '' && index > 0) {
                            this.focusInput(index - 1);
                        }
                    },
                    focusInput(index) {
                        document.querySelectorAll('.pin-input')[index].focus();
                    },
                    handleStepOneFormSubmit() {
                        $('.form-err-msg').html('');
                        const fullPin = this.pinValues.join('');
                        // alert(`Full PIN: ${fullPin}`);
                        axios.post('{{ route('frontend.event.verify-pin') }}', {
                                eventSlug: '{{ $event->slug }}',
                                pin: fullPin
                            })
                            .then((res) => {
                                if (res.data.status) {
                                    Snackbar.show({
                                        text: 'Pin Verified Successfully',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#1abc9c'
                                    });
                                    this.step = 2;
                                } else {
                                    Snackbar.show({
                                        text: 'Incorrect Pin',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#e7515a'
                                    });
                                }
                            })
                            .catch((error) => {
                                console.log("error : ", error);
                                if (error.status == 403 && error?.response?.data?.message) {
                                    Snackbar.show({
                                        text: error?.response?.data?.message,
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#e7515a'
                                    });
                                } else {
                                    Snackbar.show({
                                        text: "Something Went Wrong",
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#e7515a'
                                    });
                                }
                            });

                    },
                    handleStepTwoFormSubmit() {
                        console.log('this.guestImages : ', this.guestImages);
                        // alert("submitted");
                        // return;

                        $('.form-err-msg').html('');
                        const fullPin = this.pinValues.join('');
                        if (!this.userImageData) {
                            Snackbar.show({
                                text: 'Kindly Upload Image',
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                            return;
                        }
                        // console.log(fullPin);

                        const formData = new FormData();
                        formData.append('eventSlug', '{{ $event->slug }}');
                        formData.append('pin', fullPin);
                        formData.append('name', this.name);
                        formData.append('email', this.email);
                        formData.append('mobile_number', this.mobile_number);
                        formData.append('userImageData', this.userImageData);

                        if (this.guestImages.length > 0) {
                            this.guestImages.forEach((file) => {
                                formData.append('guestImages[]', file);
                            });
                        }
                        axios.post("{{ route('frontend.event.user-submit') }}", formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then((res) => {
                                if (res.data.status) {
                                    this.user_id = res.data.user_id;
                                    this.image = res.data.image;
                                    localStorage.setItem("event_user_id", this.user_id);
                                    Snackbar.show({
                                        text: 'User Created Successfully',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#1abc9c'
                                    });
                                    this.step = 3;
                                    this.fetchMatchedImages();
                                } else {
                                    Snackbar.show({
                                        text: res.data.message ?? 'Something Went Wrong',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#e7515a'
                                    });
                                }
                            })
                            .catch((error) => {
                                console.log(error);
                                if (error.status == 422) {
                                    $.each(error.response.data.errors, function(i, err) {
                                        var el = $(document).find('[name="' + i + '"]');
                                        el.after($('<div class="form-err-msg text-danger text-left" role="alert">' +
                                            err[0] + '</div>'));
                                    });
                                } else {
                                    Snackbar.show({
                                        text: "Something Went Wrong",
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#e7515a'
                                    });
                                }
                            });
                    },
                    openCameraModal() {
                        document.getElementById('cameraModal').style.display = 'flex';
                        Webcam.set({
                            width: 340,
                            height: 460,
                            dest_width: 340,
                            dest_height: 460,
                            crop_width: 340,
                            crop_height: 460,
                        });
                        Webcam.attach('#my_camera');
                    },
                    closeCameraModal() {
                        Webcam.reset();
                        document.getElementById('cameraModal').style.display = 'none';
                    },
                    takeSnapshot() {
                        Webcam.snap((data_uri) => {
                            console.log(data_uri);
                            this.userImageData = data_uri;
                            this.closeCameraModal();
                        });
                    },
                    handleUserImageFieldChange(e) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.imageSrc = e.target.result;
                                this.userImageData = this.imageSrc;
                                console.log(this.userImageData);
                            };
                            reader.readAsDataURL(file);
                        }
                    },
                    handleUserGuestImageFieldChange(e) {
                        // console.log("e : ", e);
                        this.guestImagesCount = 0;
                        const files = Array.from(e.target.files);
                        if (files.length > 20) {
                            Snackbar.show({
                                text: 'You can upload maximum 20 images',
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                            document.getElementById('userGuestImgInput').value = '';
                            return;
                        }
                        this.guestImagesCount = files.length;
                        this.guestImages = files;
                    },
                    fetchMatchedImages: _.debounce(function() {
                        console.log("Called fetchMatchedImages()");

                        axios.post("{{ route('frontend.event.fetch-matched-images') }}", {
                                eventSlug: '{{ $event->slug }}',
                                user_id: this.user_id,
                                page: this.imagesPageCount
                            })
                            .then((res) => {
                                console.log('fetchMatchedImages : ', res);

                                if (res.data.status) {
                                    // // Append new images instead of replacing
                                    // this.matchedImages = [...this.matchedImages, ...res.data.images.data];

                                    this.matchedImages.push(...res.data.images.data);
                                    this.hasMoreImages = res.data.images.next_page_url !== null;

                                    Snackbar.show({
                                        text: 'Matched Images Fetched Successfully',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#1abc9c'
                                    });
                                    this.step = 3;
                                    this.imagesPageCount += 1;
                                } else {
                                    Snackbar.show({
                                        text: res.data.message ?? 'Something Went Wrong',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#e7515a'
                                    });
                                }
                            })
                            .catch((error) => {
                                console.log(error);
                                Snackbar.show({
                                    text: "Something Went Wrong",
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#e7515a'
                                });
                            });
                    }, 2000),
                    loadMoreMatchedPhotos() {
                        console.log(this.matchedImages);
                        console.log(this.imagesPageCount);

                        if (this.matchedImages >= 12) {
                            this.imagesPageCount += 1;
                        }
                        this.fetchMatchedImages();
                    },
                    refreshMatchedPhotos() {
                        console.log("refreshMatchedPhotos()");
                        // return true;

                        axios.post("{{ route('frontend.event.sync-matched-images') }}", {
                                eventSlug: '{{ $event->slug }}',
                                user_id: this.user_id,
                            })
                            .then((res) => {
                                console.log('refreshMatchedPhotos res : ', res);

                                if (res.data.status) {
                                    Snackbar.show({
                                        text: 'Images Syncing Started',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#1abc9c'
                                    });
                                    // this.imagesPageCount = 1;
                                    // this.matchedImages = [];
                                    this.loadMoreMatchedPhotos();
                                } else {
                                    Snackbar.show({
                                        text: res.data.message ?? 'Something Went Wrong',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#e7515a'
                                    });
                                }
                            })
                            .catch((error) => {
                                console.log(error);
                                Snackbar.show({
                                    text: "Something Went Wrong",
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#e7515a'
                                });
                            });
                    },
                    fetchUserDetails() {
                        axios.post("{{ route('frontend.user.details') }}", {
                                eventSlug: '{{ $event->slug }}',
                                user_id: this.user_id,
                            })
                            .then((res) => {
                                console.log('fetchUserDetails : ', res);

                                if (res.data.status) {
                                    this.name = res.data.name;
                                    this.email = res.data.email;
                                    this.mobile_number = res.data.phone;
                                    this.user_image_url = res.data.image_url;
                                    // Snackbar.show({
                                    //     text: 'Matched Images Fetched Successfully',
                                    //     pos: 'top-right',
                                    //     actionTextColor: '#fff',
                                    //     backgroundColor: '#1abc9c'
                                    // });
                                    this.step = 3;
                                    this.fetchMatchedImages();
                                } else {
                                    // Snackbar.show({
                                    //     text: res.data.message ?? 'Something Went Wrong.',
                                    //     pos: 'top-right',
                                    //     actionTextColor: '#fff',
                                    //     backgroundColor: '#e7515a'
                                    // });
                                }
                            })
                            .catch((error) => {
                                console.log(error);
                                Snackbar.show({
                                    text: "Something Went Wrong",
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#e7515a'
                                });
                            });
                    }
                },



            }).mount('#mainDiv')
        </script>

        <script>
            Fancybox.bind("[data-fancybox='gallery']", {
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: [
                            "zoomIn",
                            "zoomOut",

                        ],
                        right: ["slideshow", @json($event->single_image_download ? 'download' : null), "thumbs",
                            "close"
                        ].filter(Boolean),
                    },
                },
                loop: false,
                protect: true,
            });
        </script>

        <script>
            document.addEventListener("click", function(event) {
                if (event.target.classList.contains("show-more-btn")) {
                    let container = event.target.closest(".limit-para");
                    let shortText = container.querySelector(".short-text");
                    let fullText = container.querySelector(".full-text");

                    if (shortText.style.display !== "none") {
                        shortText.style.display = "none";
                        fullText.classList.remove("d-none");
                        event.target.textContent = "Show Less";
                    } else {
                        shortText.style.display = "inline";
                        fullText.classList.add("d-none");
                        event.target.textContent = "Show More";
                    }
                }
            });
        </script>

        <script>
            function rotateAndReload() {
                let icon = document.getElementById("refreshIcon");
                icon.classList.add("rotaterefresh");

                setTimeout(() => {
                    icon.classList.remove("rotaterefresh");
                    // location.reload();
                }, 1000);
            }
        </script>

    @endsection

    @section('cdn')

    @endsection
