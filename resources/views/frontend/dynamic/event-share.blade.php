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
                padding-bottom: 120px;
                padding-top: 20px;
            }

            .main-div {
                margin-top: -17px;
            }

            /* .custom-ctnrfluid {
                                                                                                                        background-image: unset;
                                                                                                                        backdrop-filter: unset;
                                                                                                                        min-height: unset;
                                                                                                                        padding-left: 12px;
                                                                                                                        padding-right: 12px;
                                                                                                                    } */
            .pobdh {
                height: 0px;
            }

            .stepmaincontainer {
                padding-top: 32px;

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
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">
            <img src="{{ asset('frontend/images/gallery/bigarrow.svg') }}" alt="" srcset=""
                class="img-fluid bigarrow-img-bdptnew d-none d-sm-block" style="z-index: -99">
            <img src="{{ asset('frontend/images/basic-event-one/bigarrow.svg') }}" alt="" srcset=""
                class="img-fluid bigarrow-img-bdptnew d-block d-sm-none bigarrowsm" style="z-index: -99">

            <div class="main-div">
                <div class="container overflow-hide stepmaincontainer">

                    <div class="pb-5" v-if="step == 1">
                        <div class="row d-flex justify-content-center pt-35px position-relative">
                            <img src="{{ asset('frontend/images/basic-event-one/smboxblur.svg') }}" alt=""
                                srcset="" class="img-fluid d-block d-sm-none smboxblurbox ">
                            <div class="col-12 col-lg-10 col-xl-9 col-xxl-8 position-relative z-99">
                                <div class="row">


                                    <div class="col-12 ">


                                        <div class="basic-event-one-main-bdt text-white">

                                            <div class="basic-event-one-main-insider-bdt">
                                                <div>
                                                    <img src="{{ asset('storage/images/events/' . $event->cover_image) }}"
                                                        alt="" class="img-fluid ex-one-img w-100">
                                                </div>
                                                <div>
                                                    <div class="eventanddatespit-bdt ">
                                                        <div class="h5 fw-600 mb-0 text-white bdt-eventname">
                                                            {{ $event->name }}
                                                        </div>
                                                        @if ($event->start_date && $event->end_date)
                                                            @if ($event->start_date == $event->end_date)
                                                                <div class="text-white fw-300 fs-14 bdt-date">
                                                                    {{ dd_format($event->start_date, 'd/m/Y') }}</div>
                                                            @else
                                                                <div class="text-white fw-300 fs-14 bdt-date">
                                                                    {{ dd_format($event->start_date, 'd/m/Y') }} to
                                                                    {{ dd_format($event->end_date, 'd/m/Y') }}
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>

                                                    @if ($event->descriptions)
                                                        <div class="text-white pt-2 pt-md-3 fs-14 bdt-date-longpara">
                                                            {!! Str::limit($event->descriptions, 100, '...') !!}
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
                                <div class="pin-container">
                                    <div class="pin-title">Enter Your Pin Number</div>
                                    <form action="" method="post" @submit.prevent="handleStepOneFormSubmit">
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

                    <div class="step-two" v-if="step == 2">

                        <div class="row  pt-17px pb-30 position-relative">
                            <img src="{{ asset('frontend/images/basic-event-one/smboxblur.svg') }}" alt=""
                                srcset="" class="img-fluid d-block d-sm-none smboxblurbox ">
                            <div class="col-12 col-lg-10 col-xl-9 col-xxl-8 position-relative z-99">

                                <div class="basic-event-one-main-bdt text-white">
                                    <div class="basic-event-one-main-insider-bdt">
                                        <div>
                                            <img src="{{ asset('storage/images/events/' . $event->cover_image) }}"
                                                alt="" class="img-fluid ex-one-img w-100">
                                        </div>
                                        <div>
                                            <div class="eventanddatespit-bdt ">
                                                <div class="h5 fw-600 mb-0 text-white bdt-eventname">
                                                    {{ $event->name }}
                                                </div>
                                                @if ($event->start_date && $event->end_date)
                                                    @if ($event->start_date == $event->end_date)
                                                        <div class="text-white fw-300 fs-14 bdt-date">
                                                            {{ dd_format($event->start_date, 'd/m/Y') }}</div>
                                                    @else
                                                        <div class="text-white fw-300 fs-14 bdt-date">
                                                            {{ dd_format($event->start_date, 'd/m/Y') }} to
                                                            {{ dd_format($event->end_date, 'd/m/Y') }}
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>

                                            @if ($event->descriptions)
                                                <div class="text-white pt-2 pt-md-3 fs-14 bdt-date-longpara">
                                                    {!! Str::limit($event->descriptions, 100, '...') !!}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row gx-3 gx-lg-4 gx-xxl-5">
                            <div class="col-12 col-lg-5 col-xl-5 col-xxl-5 order-br">
                                <form method="post" class="login-form pt-5 pt-lg-0"
                                    @submit.prevent="handleStepTwoFormSubmit">
                                    <div class="dblwhitecolor h4 mb-0 fw-600 pb-2 form-details">Details</div>

                                    <div class="pb-2 pb-sm-3">
                                        <label for="name" class="fw-600 frtwhitcolor pb-2 name-form">Name</label>
                                        <input type="text" name="name" minlength="8" maxlength="30" required
                                            placeholder="Enter Your Name" v-model="name" required
                                            class="form-control sin-input">
                                    </div>

                                    <div class="pb-2 pb-sm-3">
                                        <label for="email" class="fw-600 frtwhitcolor pb-2 email-form">Email
                                            ID*</label>
                                        <input type="email" name="email" minlength="8" maxlength="40" required
                                            placeholder="Enter Your Email ID" v-model="email"
                                            class="form-control sin-input">
                                    </div>

                                    <div class="pb-3 pb-sm-3">
                                        <label for="mobile_number"
                                            class="fw-600 frtwhitcolor pb-2 num-form">Number</label>
                                        <input type="text" id="mobile_number" name="mobile_number" minlength="10"
                                            maxlength="10" placeholder="Enter Your Mobile Number" required
                                            v-model="mobile" class="form-control sin-input">
                                    </div>


                                    <div>

                                        <button type="submit" class="submit-btn-bept">Submit</button>

                                    </div>


                                </form>

                            </div>
                            <div class="col-12 col-lg-7 col-xl-7 col-xxl-7 order-bl">
                                <div class="two-container-grp">
                                    <div class="basic-face-box">
                                        <div class="scan-face-box-insider-twopage">
                                            <img id="captured-image" alt="Captured Image"
                                                class="faceimg-img w-100 h-100 object-fit-cover brd-50"
                                                :src="userImageData" v-if="userImageData" />
                                            <img src="{{ asset('frontend/images/gallery/faceimg.png') }}" alt=""
                                                class="faceimg-img" v-else>
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
                                    <div class="text-center drgreen fs-12pxnew fw-500 d-block d-sm-none">
                                        Or
                                    </div>
                                    <div class="upload-section">
                                        {{-- <label for="userGuestImgInput"> --}}
                                        <div class="pb-4 browsertext brsr-14pxtx">
                                            Browse File
                                        </div>
                                        <div class="d-flex justify-content-center pb-3">
                                            <div class="uploder-up">
                                                <img src="{{ asset('frontend/images/gallery/uploadicon.svg') }}"
                                                    alt="" srcset="" class="img-fluid">
                                            </div>
                                        </div>

                                        <form>
                                            <div class="dz-message">
                                                <div class="mb-3 guest-uploader">
                                                    as Guest Upload
                                                    <input type="file" id="userGuestImgInput"
                                                        @change="handleUserGuestImageFieldChange" hidden>
                                                </div>
                                                <div>
                                                    <div class="fs-10 fw-600 newwcolor">JPG, PNG, JPEG formats, up to 50
                                                        MB.
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- </label> --}}

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
                        </div>
                    </div>

                    <div class="step-three" v-if="step == 3">




                        <div class="row  pt-35px">

                            <div class="col-12">
                                <div class="grid-outer">
                                    <div class="basic-event-one-main h-100">
                                        <div class="basic-event-one-main-insider-half user-detailsinfo">
                                            <div>
                                                <div class="fw-600 text-white pb-2 uptoptext">Uploaded Photo</div>
                                                <img :src="userImageData" alt=""
                                                    class="img-fluid textimg-new rounded-3" v-if="userImageData">
                                                <img :src="user_image_url" alt=""
                                                    class="img-fluid textimg-new rounded-3" v-if="user_image_url">
                                            </div>
                                            <div class="details-box-one">

                                                <div class="d-flex gap-1">
                                                    <div class="text-white fw-600 h5 mb-0 name-head">Name:</div>
                                                    <div class="text-white fw-600 h5 mb-0 name-title">
                                                        @{{ name }}</div>
                                                </div>

                                                <div class="d-flex gap-1 box-one-nummain">
                                                    <div class="text-white fw-600 h5 mb-0 number-head">Number:
                                                    </div>
                                                    <div class="text-white fw-600 h5 mb-0 number-title">
                                                        @{{ mobile_number }}
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-1">
                                                    <div class="text-white fw-600 h5 mb-0 email-head"> Email ID:
                                                    </div>
                                                    <div class="text-white fw-600 h5 mb-0 email-title">
                                                        @{{ email }}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="sgl-divider d-lg-block"></div> --}}
                                    <div class="">
                                        <div class="vr"></div>
                                    </div>
                                    <div class="basic-event-one-main h-100 d-flex align-items-center">
                                        <div class="basic-event-one-main-insider-full">
                                            <div>
                                                <img src="{{ asset('storage/images/events/' . $event->cover_image) }}"
                                                    alt="" class="img-fluid ex-one-img-new rounded-3">
                                            </div>

                                            <div>
                                                <div class="eventanddatespit ">
                                                    <div class="h5 fw-600 mb-0 text-white bx-twoeventname">
                                                        {{ $event->name }}
                                                    </div>
                                                    <div class="text-white fw-300 fs-14 fssm-8px" >
                                                        {{ dd_format($event->start_date, 'd/m/Y') }} to
                                                        {{ dd_format($event->end_date, 'd/m/Y') }}
                                                    </div>
                                                </div>
                                                <div class="text-white pt-2 pt-xl-3 fs-14 box-twobtpra">
                                                    {!! Str::limit($event->descriptions, 100, '...') !!}
                                                </div>
                                            </div>

                                          
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row pt-3 pb-3 pt-sm-5 pb-sm-4">
                                <div class="fw-600 h4 mb-0 text-white text-center">Matched photos </div>
                            </div>

                            <div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4" id="gallery-mainscn">
                                <div class="col pb-4" v-for="(img, index) in matchedImages" :key="index"
                                    :data-index="index">
                                    <a :src="'/storage/' + img.image_url" :data-download-src="'/storage/' + img.image_url"
                                        data-fancybox="gallery" data-caption="Image 1">
                                        <img :src="'/storage/' + img.image_url" alt=""
                                            class="gallery-img img-fluid rounded-3">
                                    </a>

                                </div>
                            </div>


                            <div class="d-flex justify-content-center">
                                <button id="toggleButton" class="btn pink-btn showmshol mt-3"
                                    @click="loadMoreMatchedPhotos">Show More</button>
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
                        step: 1,
                        name: '',
                        email: '',
                        mobile: '',
                        userImageData: null,
                        user_image_url: null,
                        user_id: null,
                        image: null,
                        matchedImages: [],
                        imagesPageCount: 1,
                    }
                },
                mounted() {
                    let userId = localStorage.getItem("user_id");
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
                        axios.post("{{ route('frontend.event.user-submit') }}", {
                                eventSlug: '{{ $event->slug }}',
                                pin: fullPin,
                                name: this.name,
                                email: this.email,
                                mobile_number: this.mobile,
                                userImageData: this.userImageData,
                            })
                            .then((res) => {
                                if (res.data.status) {
                                    this.user_id = res.data.user_id;
                                    this.image = res.data.image;
                                    localStorage.setItem("user_id", this.user_id);
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
                    fetchMatchedImages: _.debounce(function() {
                        console.log("Called fetchMatchedImages()");

                        axios.post("{{ route('frontend.event.fetch-matched-images') }}", {
                                eventSlug: '{{ $event->slug }}',
                                user_id: this.user_id,
                            })
                            .then((res) => {
                                console.log('fetchMatchedImages : ', res);

                                if (res.data.status) {
                                    this.matchedImages = res.data.images.data;
                                    Snackbar.show({
                                        text: 'Matched Images Fetched Successfully',
                                        pos: 'top-right',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#1abc9c'
                                    });
                                    this.step = 3;
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
                    fetchUserDetails() {
                        axios.post("{{ route('frontend.user.details') }}", {
                                eventSlug: '{{ $event->slug }}',
                                user_id: this.user_id,
                            })
                            .then((res) => {
                                console.log('fetchMatchedImages : ', res);

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
                        right: ["slideshow", "download", "thumbs", "close"]
                    },
                },
                loop: false,
                protect: true,
            });
        </script>


    @endsection

    @section('cdn')

    @endsection
