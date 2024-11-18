@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<style>
    footer{
      margin-top: 80px
    }
    .navsmimg{
        display: none;
    }
    .halfarrowt-img{
      display: none;
    } 
    .blurhero-img {
            display: none;
        }
        .smalllarrow-img2{
            display: none;
        }
        .blurhero-img{
            display: none;
        }

        @media (max-width: 992px) {    
            .custom-ctnrfluid {
            margin-top: 0
            }
        }
      
</style>
@endsection
@section('content')
    <section>
        
        <div class="position-relative">
            <div class="ptbtp d-none d-lg-block"></div>
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2new">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">
            <img src="{{asset('frontend/images/gallery/bigarrow.svg')}}" alt="" srcset="" class="img-fluid bigarrow-img-bdptnew d-none d-sm-block" style="z-index: -99">
            <img src="{{asset('frontend/images/basic-event-one/bigarrow.svg')}}" alt="" srcset="" class="img-fluid bigarrow-img-bdptnew d-block d-sm-none bigarrowsm" style="z-index: -99">

            <div class="container-fluid">
                <div class="basic-details-trbg-main">
                    <div class="container overflow-hide">
                        <div class="row  pt-17px pb-30 position-relative">
                            <img src="{{asset('frontend/images/basic-event-one/smboxblur.svg')}}" alt="" srcset="" class="img-fluid d-block d-sm-none smboxblurbox ">
                            <div class="col-12 col-lg-10 col-xl-9 col-xxl-8  position-relative z-99">
                                
                                
                                    <div class="basic-event-one-main-bdt" >
                                        <div class="basic-event-one-main-insider-bdt" >
                                            <div>
                                                <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}" alt="" class="img-fluid ex-one-img w-100" >
                                            </div>
                                            <div>
                                                <div class="eventanddatespit-bdt ">
                                                    <div class="h5 fw-600 mb-0 text-white bdt-eventname">Business event</div>
                                                    <div class="text-white fw-300 fs-14 bdt-date" >10/09/2024 to 14/09/2024</div>
                                                </div>
                                                <div class="text-white pt-2 pt-md-3 fs-14 bdt-date-longpara" >
                                                    Picscan is the world's only end-to-end AI-powered image post-production solution.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                

                            </div>
                        </div>

                        <div class="row gx-3 gx-lg-4 gx-xxl-5">
                            <div class="col-12 col-lg-5 col-xl-5 col-xxl-5 order-br">
                                <form action="{{ route('frontend.login.submit') }}" method="post" class="login-form pt-5 pt-lg-0">
                                    @csrf
                                    <div class="dblwhitecolor h4 mb-0 fw-600 pb-2 form-details">Details</div>
                                    
                                        <div class="pb-2 pb-sm-3">
                                            <label for="name" class="fw-600 frtwhitcolor pb-2 name-form">Name</label>
                                            <input type="text" name="name" minlength="8" maxlength="30" placeholder="Enter your name" required
                                                class="form-control sin-input">
                                        </div>
                                        {{-- @if ($errors->has('name'))
                                            <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('name') }}
                                            </div>
                                        @endif --}}

                                        <div class="pb-2 pb-sm-3">
                                            <label for="email" class="fw-600 frtwhitcolor pb-2 email-form">Email ID*</label>
                                            <input type="email" name="email" minlength="8" maxlength="30" placeholder="Enter your email id" required
                                                class="form-control sin-input">
                                        </div>
                                        {{-- @if ($errors->has('email'))
                                            <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('email') }}
                                            </div>
                                        @endif --}}
                                        <div class="pb-3 pb-sm-3">
                                            <label for="num" class="fw-600 frtwhitcolor pb-2 num-form">Number</label>
                                            <input type="text" id="num" name="num" minlength="6" maxlength="6" placeholder="Enter your number" required class="form-control sin-input">
                                            {{--                                 
                                            @if ($errors->has('num'))
                                                <div class="text-danger text-left mt-2" role="alert">{{ $errors->first('num') }}</div>
                                            @endif --}}
                                        </div>
                                    
                                
                                    <div>
                                        {{-- <a href="http://" class="btn btn-login withsignin" style="font-size: 20px">
                                            Sign In
                                        </a> --}}
                                    

                                        <button type="submit" class="submit-btn-bept">Submit</button>

                                    </div>

                                


                                </form>

                            </div>
                            <div class="col-12 col-lg-7 col-xl-7 col-xxl-7 order-bl">
                                <div class="two-container-grp">
                                    <div class="basic-face-box">
                                        <div class="scan-face-box-insider-twopage" >
                                            <img src="{{asset('frontend/images/gallery/faceimg.png')}}" alt="" srcset="" class="faceimg-img">
                                        </div>
                                        
                                        <div class="d-flex flex-column align-items-center gap-2">
                                            <div class="scan-facebtn">
                                                Scan Your Face
                                            </div>
                                            <div class="ortext" >
                                                Or
                                            </div>
                                            <form action="/file-upload" class="dropzone " id="myDropzone">
                                                <div class="dz-message scan-textboxbdpt-btn" >
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
                                            <img src="{{asset('frontend/images/gallery/uploadicon.svg')}}" alt="" srcset="" class="img-fluid">
                                            </div>
                                        </div>
                                        <!-- Dropzone Form -->
                                        <form action="/file-upload" class="dropzone" id="my-dropzone">
                                            <div class="dz-message">
                                                <button type="button " class="mb-3 guest-uploader"> as Guest Upload</button>
                                                <div>
                                                <div class="fs-10 fw-600 newwcolor">JPEG, PNG, PDF, and MP4 formats, up to 50 MB.</div>
                                                </div>
                                            </div>
                                        </form>
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
@endsection
