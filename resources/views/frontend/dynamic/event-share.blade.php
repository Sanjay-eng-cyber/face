@extends('frontend.layouts.app')
@section('title')
@section('cdn')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div id="mainDiv">
        <section>
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

                <div class="container overflow-hide">
                    <div class="row d-flex justify-content-center pt-35px position-relative">
                        <img src="{{ asset('frontend/images/basic-event-one/smboxblur.svg') }}" alt=""
                            srcset="" class="img-fluid d-block d-sm-none smboxblurbox ">
                        <div class="col-12 col-lg-10 col-xl-9 col-xxl-8 position-relative z-99">
                            <div class="row">


                                <div class="col-12 ">


                                    <div class="basic-event-one-main-bdt">

                                        <div class="basic-event-one-main-insider-bdt">
                                            <div>
                                                <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}"
                                                    alt="" class="img-fluid ex-one-img w-100">
                                            </div>
                                            <div>
                                                <div class="eventanddatespit-bdt ">
                                                    <div class="h5 fw-600 mb-0 text-white bdt-eventname">{{ $event->name }}
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
                                                        {!! $event->descriptions !!}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row ptpb-55px" id="enterPinDiv" v-if="step == 1">
                        <div class="col-12">
                            <div class="pin-container">
                                <div class="pin-title">Enter Your Pin Number</div>
                                <form action="" method="post" @submit.prevent="handleStepOneFormSubmit">
                                    <div class="d-flex justify-content-center basic-input-main">
                                        <input placeholder="0" v-for="(value, index) in pinValues" :key="index"
                                            type="text" maxlength="1" class="pin-input" placeholder="0"
                                            v-model="pinValues[index]" @input="handleInput(index)"
                                            @keydown="handleBackspace($event, index)" />
                                    </div>
                                    <button type="submit" class="submit-btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3 gx-lg-4 gx-xxl-5" v-if="step == 2">
                        <div class="col-12 col-lg-5 col-xl-5 col-xxl-5 order-br">
                            <form method="post" class="login-form pt-5 pt-lg-0" @submit.prevent="handleStepTwoFormSubmit">
                                <div class="dblwhitecolor h4 mb-0 fw-600 pb-2 form-details">Details</div>

                                <div class="pb-2 pb-sm-3">
                                    <label for="name" class="fw-600 frtwhitcolor pb-2 name-form">Name</label>
                                    <input type="text" name="name" minlength="8" maxlength="30" required
                                        placeholder="Enter Your Name" v-model="name" required
                                        class="form-control sin-input">
                                </div>

                                <div class="pb-2 pb-sm-3">
                                    <label for="email" class="fw-600 frtwhitcolor pb-2 email-form">Email ID*</label>
                                    <input type="email" name="email" minlength="8" maxlength="40" required
                                        placeholder="Enter Your Email ID" v-model="email" class="form-control sin-input">
                                </div>

                                <div class="pb-3 pb-sm-3">
                                    <label for="mobile_number" class="fw-600 frtwhitcolor pb-2 num-form">Number</label>
                                    <input type="text" id="mobile_number" name="mobile_number" minlength="10"
                                        maxlength="10" placeholder="Enter Your Mobile Number" required v-model="mobile"
                                        class="form-control sin-input">
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
                                        <img src="{{ asset('frontend/images/gallery/faceimg.png') }}" alt=""
                                            srcset="" class="faceimg-img">
                                    </div>

                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <div class="scan-facebtn">
                                            Scan Your Face
                                        </div>
                                        <div class="ortext">
                                            Or
                                        </div>
                                        <form action="/file-upload" class="dropzone " id="myDropzone">
                                            <div class="dz-message scan-textboxbdpt-btn">
                                                Upload File
                                            </div>
                                        </form>


                                    </div>
                                </div>
                                <div class="text-center drgreen fs-12pxnew fw-500 d-block d-sm-none">
                                    Or
                                </div>
                                <div class="upload-section ">
                                    <div class="pb-4 browsertext brsr-14pxtx">
                                        Browse File
                                    </div>
                                    <div class="d-flex justify-content-center pb-3">
                                        <div class="uploder-up">
                                            <img src="{{ asset('frontend/images/gallery/uploadicon.svg') }}"
                                                alt="" srcset="" class="img-fluid">
                                        </div>
                                    </div>
                                    <!-- Dropzone Form -->
                                    <form action="/file-upload" class="dropzone" id="my-dropzone">
                                        <div class="dz-message">
                                            <button type="button " class="mb-3 guest-uploader"> as Guest Upload</button>
                                            <div>
                                                <div class="fs-10 fw-600 newwcolor">JPEG, PNG, PDF, and MP4 formats, up to
                                                    50 MB.</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
@section('js')

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js"></script>

    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>

    <script>
        const {
            createApp,
            ref
        } = Vue

        createApp({
            data() {
                return {
                    pinValues: ref(Array(4).fill('')),
                    step: 1,
                    name: '',
                    email: '',
                    mobile: '',
                }
            },
            methods: {
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
                            Snackbar.show({
                                text: "Something Went Wrong",
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        });

                },
                handleStepTwoFormSubmit() {
                    $('.form-err-msg').html('');
                    const fullPin = this.pinValues.join('');
                    // alert(`Full PIN: ${fullPin}`);
                    axios.post('{{ route('frontend.event.user-submit') }}', {
                            eventSlug: '{{ $event->slug }}',
                            pin: fullPin,
                            name: this.name,
                            email: this.email,
                            mobile_number: this.mobile,
                        })
                        .then((res) => {
                            if (res.data.status) {
                                Snackbar.show({
                                    text: 'User Created Successfully',
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#1abc9c'
                                });
                                this.step = 2;
                            } else {
                                Snackbar.show({
                                    text: 'Something Went Wrong',
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

                }
            },
        }).mount('#mainDiv')
    </script>

@endsection

@section('cdn')
    <style>
        footer {
            margin-top: 80px
        }

        .custom-ctnrfluid {
            background-image: unset;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            backdrop-filter: unset;
            display: flex;
            align-items: center;
            min-height: 106px;
            margin-top: 14px;
        }

        .halfarrowt-img {
            display: none;
        }
    </style>
@endsection
