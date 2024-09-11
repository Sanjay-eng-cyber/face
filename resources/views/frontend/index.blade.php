@extends('frontend.layouts.app')
@section('title')

@section('content')

    <section>
        <div style="position: relative">
            <img src="{{ asset('frontend/images/index/herobottommirror.svg') }}" alt="" srcset="" class="img-fluid"
                style="
                position: absolute;    
                z-index: -2;
                top: -85px;
                left: -119px;
                ">
            <div class="container position-relative">
                <div style="padding-top: 40px;padding-bottom:40px;">

                    <div class="row gx-5" style="display: flex;align-items: center;">
                        <div class="col-12 col-md-6">
                            <div class="display-4 text-white">
                                <div style="line-height:95px">Share Images Using </br> Face Recognition</div>
                            </div>
                            <h2 class="text-white pt-2 pb-5 mb-0">wow your clients and get 8X more visibility </h2>
                            <button type="button" class="btn btn-success " style="padding:10px 44px;font-size:24px">Get
                                Started</button>

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="heroslider text-white">
                                <div><img src="{{ asset('frontend/images/index/1.png') }}" alt="" srcset=""
                                        class="img-fluid"></div>
                                <div><img src="{{ asset('frontend/images/index/2.png') }}" alt="" srcset=""
                                        class="img-fluid"></div>
                                <div><img src="{{ asset('frontend/images/index/1.png') }}" alt="" srcset=""
                                        class="img-fluid"></div>
                                <div><img src="{{ asset('frontend/images/index/3.png') }}" alt="" srcset=""
                                        class="img-fluid"></div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div style="padding-top:100px;padding-bottom:100px ">
            <div class="index-slogn"
                style=";display:flex;align-items: center;position:relative;min-height:131px;background:linear-gradient(90deg, #082399 0%, #030C33 100%);">
                <div class="container">
                    <h2 class="mb-0 text-white text-center">let your clients discover their images within seconds</h2>
                </div>
            </div>
        </div>

        <div class="container" style="position: relative">
            <img src="{{asset('frontend/images/index/main-border.png')}}" alt="" class="img-fluid" style="    position: absolute;
                        left: 50%;
                        top: 26%;
                        transform: translate(-50%);
                        z-index: -1;

                    ">
                    <div class="row">
                <div class="col-3">
                    <div style="display: flex;justify-content: center;min-height:122px;min-width:122px">
                        <div style="    display: flex;
                            align-items: center;
                            justify-content: center;border-radius:15px;box-shadow: 0px 4px 4px 20px #000000CC;padding:37px;border: 1px solid #082399;background-color:#161313">
                            <img src="{{asset('frontend/images/index/chain.svg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <h4 class="mb-0 text-white text-center" style="padding-top: 44px">
                        Share event link with attendees via email, QR code or WhatsApp
                    </h4>
                </div>


                <div class="col-3">
                    <div style="    display: flex;justify-content: center;min-height:122px;min-width:122px">
                        <div style="    display: flex;
                         align-items: center;
                                    justify-content: center;border-radius:15px;box-shadow: 0px 4px 4px 20px #000000CC;padding:37px;border: 1px solid #082399;background-color:#161313">
                            <img src="{{asset('frontend/images/index/camera.svg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <h4 class="mb-0 text-white text-center" style="padding-top: 44px">
                        Attendees go to the link and take a selfie
                    </h4>
                </div>


                <div class="col-3">
                    <div style="    display: flex;justify-content: center;min-height:122px;min-width:122px">
                        <div style="    display: flex;
                            align-items: center;
                            justify-content: center;border-radius:15px;box-shadow: 0px 4px 4px 20px #000000CC;padding:37px;border: 1px solid #082399;background-color:#161313">
                            <img src="{{asset('frontend/images/index/faceai.svg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <h4 class="mb-0 text-white text-center" style="padding-top: 44px">
                        Our AI recognizes attendees with 99% accuracy and show them all their images
                    </h4>
                </div>


                <div class="col-3">
                    <div style="display: flex;justify-content: center;min-height:122px;min-width:122px">
                        <div style="border-radius:15px;box-shadow: 0px 4px 4px 20px #000000CC;padding:37px;border: 1px solid #082399;background-color:#161313">
                            <img src="{{asset('frontend/images/index/photo.svg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <h4 class="mb-0 text-white text-center" style="padding-top: 44px">
                        Images can be printed or downloaded right from mobile
                    </h4>
                </div>
            </div>
        </div>
        <div class="" style="position: relative;  
                display: flex;
                align-items: center;
                padding-top:70px;
                " >
            <img src="{{asset('frontend/images/index/triglebox.svg')}}" alt="" srcset="" class="img-fluid" style="position: absolute">
            <img src="{{asset('frontend/images/index/half-trigle.svg')}}" alt="" srcset="" class="img-fluid" style="position: absolute;right:0px">
       
            <div class="container my-5" style="position: relative">
                <div class="row">
                    <div class="col-12">
                        
                            <div class="h2 text-white text-center mb-0"  style="
                              border: 1px solid #FF3895;
                                border-radius: 135px;
                                padding: 10px;
                                background-color: #0D0C0C66;
                                min-height: 271px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                backdrop-filter: blur(11px);
                                ">
                                Showcase your work to the world. <br/>

                                Transform every client interaction into an unforgettable experience.
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="h2 mb-0 fw-275 text-white text-center" style="padding-top:71px;padding-bottom:71px">Features you don’t want to miss</div>
                    <div style="border:1px solid #FF3895;border-radius:135px;">
                        <div style="    display: grid;grid-template-columns: 50% 50%;    align-items: center;    padding: 10px 13px;">
                            <div class="text-white h2 mb-0 text-white text-center">Blazing Fast AI Recognition</div>
                            <div style="display: flex;align-items: center;justify-content: center;border-radius:135px;border:1px solid #FF3895;background: linear-gradient(104.73deg, #360C21 18.06%, #9C215F 109.83%);">
                                <img src="{{asset('frontend/images/index/fetuaresimg.png')}}" alt="" srcset="" class="img-fluid">
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
        $('.heroslider').slick({
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@endsection
