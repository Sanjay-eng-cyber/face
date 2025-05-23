@extends('frontend.layouts.app')
@section('title')
@section('cdn')
    <style>
        .halfarrowt-img {
            display: none
        }
        /* .custom-ctnrfluid {
            background: none;
            backdrop-filter: unset;
        } */
        .custom-ctnrfluid{
            background-image: unset;
            backdrop-filter: unset;
        }
        .custom-ctnrfluid.sticky-nav {
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
            width: 96%;
            left: 50%;
            border-radius: 34px;
            transform: translate(-50%);
        }


        .smalllarrow-img {
            display: none;
        }

        @media (max-width:992px) {
            .custom-ctnrfluid.sticky-nav {
                min-height:unset;
            }
        }

        @media (max-width: 576px) {
            .footer-class{
                padding-bottom: 45px;
            }
            .custom-ctnrfluid.sticky-nav {
                    min-height: unset;
                    background-image: url(/frontend/images/index/index-new/blurhero.svg); /* Removed extra closing parenthesis */
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    border-radius: 14px;
                }



            .navsmimg{
                display: block;
            }
            .navsmimg{
                top:7px;
            }
            .custom-ctnrfluid{
                margin-top: 14px;
            }

            .custom-ctnrfluid.sticky-nav{
                margin-top: 7px;
            }

        }
    </style>
@endsection
@section('content')
    <section>
        <div class="position-relative">
            <img src="{{ asset('frontend/images/index/index-new/leftarrowfix.svg') }}" alt="" srcset=""
                class="img-fluid hometarrow-img">
            <img src="{{ asset('frontend/images/index/index-new/bafullimg.svg') }}"
                alt="Full hero image of the website's main section" class="img-fluid full-img bafullimg">
            <img src="{{ asset('frontend/images/index/smindexa.svg') }}" alt="" srcset="" class="img-fluid smindexa d-block d-sm-none">
            {{-- <img src="{{ asset('frontend/images/index/index-new/blurhero.svg') }}" alt="Blurred background hero image"
                class="img-fluid blurhero-img"> --}}
            <img src="{{ asset('frontend/images/index/index-new/plainplate.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img">

            <div class="container overflow-hide ">
                <div class="ip-fheight">
                </div>
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main">
                    <div class="col-lg-8 col-xl-8 col-xxl-8 text-white position-relative text-center text-lg-start">
                        <div class="fw-500 share-img-text">
                            Share Images
                            <img src="{{ asset('frontend/images/index/index-new/rightarrow.svg') }}" alt=""
                                srcset="" class="img-fluid rightarrow-img">

                        </div>
                        <div class="fw-500 using-herotext">
                            <span>Using</span> <span class="dbcolor">Face</span> <span class="darkpink">Recognition</span>
                        </div>
                        <div class="small-pra-text">Wow Your Clients And Get <span class="darkpink">8X</span> More Visibility
                        </div>

                    </div>
                    <div class="col-lg-4 col-xl-4 col-xxl-4 position-relative text-center text-lg-start">
                        <div class="position-relative">
                            <div class="sm-middle">
                                <img src="{{ asset('frontend/images/small/mdl.png') }}" alt="" srcset=""
                                    class="img-fluid rounded-3 mdl-img">
                            </div>
                        </div>
                        <img src="{{ asset('frontend/images/index/index-new/dba.png') }}" alt="" srcset=""
                            class="img-fluid dba-img">

                        <img src="{{ asset('frontend/images/index/index-new/rs.svg') }}" alt="" srcset=""
                            class="img-fluid rs-img">

                    </div>

                </div>

            </div>
        </div>

        <div class="kws-bg position-relative">
            <img src="{{ asset('frontend/images/index/index-new/nwunionimg.png') }}" alt="" srcset=""
                class="img-fluid w-100  position-absolute nwunionimg d-none d-sm-block">

            <img src="{{asset('frontend/images/index/sm-workbg.png')}}" alt="" srcset=""  class="img-fluid w-100  position-absolute nwunionimg d-block d-sm-none">
            <div class="container custopmainpad">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="text-white hkmt-text nedpcolor">How Pic<span class="darkpink">scan Works?</span></div>
                        <div class="text-white h4 fw-400 pt-2 pt-sm-4 mb-0 let-sm-text">let your clients discover their images
                            within seconds</div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">
                        <img src="{{ asset('frontend/images/index/index-new/robot-withimg.svg') }}" alt=""
                            srcset="" class="img-fluid robot-withimg">

                    </div>
                </div>

                <div class="row px-4 px-sm-0 row-cols-2 row-cols-lg-4">
                    <div class="col pb78px">
                        <div class="scn-sharemain">
                            <div class="share-box">
                                <img src="{{ asset('frontend/images/index/chain.svg') }}" alt="" class="img-fluid chain-img">

                            </div>

                            <h5 class="text-white kanit-thin fw-400 mb-0 fs-es-12px fs-sm14px lh18px">
                                Share event link with attendees via email, QR code or WhatsApp
                            </h5>
                        </div>

                    </div>
                    <div class="col pb78px">

                        <div class="scn-sharemain">
                            <div class="share-box">
                                <img src="{{ asset('frontend/images/index/camera.svg') }}" alt=""
                                    class="img-fluid camera-img">

                            </div>

                            <h5 class="text-white kanit-thin fw-400 mb-0 fs-es-12px fs-sm14px lh18px">
                                Attendees go to the link and take a selfie
                            </h5>
                        </div>

                    </div>
                    <div class="col">
                        <div class="scn-sharemain">
                            <div class="share-box">
                                <img src="{{ asset('frontend/images/index/faceai.svg') }}" alt=""
                                    class="img-fluid faceai-img">

                            </div>

                            <h5 class="text-white kanit-thin fw-400 mb-0 fs-es-12px fs-sm14px lh18px">
                                Our AI recognizes attendees with 99% accuracy and show them all their images
                            </h5>
                        </div>
                    </div>
                    <div class="col">
                        <div class="scn-sharemain">
                            <div class="share-box">
                                <img src="{{ asset('frontend/images/index/ciframe.svg') }}" alt=""
                                    class="img-fluid ciframe-img">

                            </div>

                            <h5 class="text-white kanit-thin fw-400 mb-0 fs-es-12px fs-sm14px lh18px">
                                Images can be printed or downloaded right from mobile
                            </h5>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="container pb-25px pt-sm-80px">
            <div class="row position-relative">
                    <img src="{{ asset('frontend/images/index/index-new/lptbg.png') }}" alt="" srcset=""
                    class="img-fluid lptbg-img d-none d-lg-block">
                    <img src="{{ asset('frontend/images/index/index-new/tg-one.png') }}" alt="" srcset=""
                        class="img-fluid tg-one-img d-none d-lg-block">
                    <img src="{{ asset('frontend/images/index/index-new/tg-two.png') }}" alt="" srcset=""
                        class="img-fluid tg-two-img d-none d-lg-block">
                    <img src="{{ asset('frontend/images/index/index-new/tg-three.png') }}" alt="" srcset=""
                        class="img-fluid tg-three-img d-none d-lg-block">

                <div class="col-12 col-md-6 col-lg-5 col-xxl-4 position-relative text-center text-md-start d-flex align-items-center justify-content-center">
                    <img src="{{ asset('frontend/images/index/index-new/lptbg.png') }}" alt="" srcset=""
                    class="img-fluid lptbg-img d-none d-md-block d-lg-none">
                    <img src="{{ asset('frontend/images/index/index-new/tg-one.png') }}" alt="" srcset=""
                        class="img-fluid tg-one-img d-none d-md-block d-lg-none">
                    <img src="{{ asset('frontend/images/index/index-new/tg-two.png') }}" alt="" srcset=""
                        class="img-fluid tg-two-img d-none d-md-block d-lg-none">
                    <img src="{{ asset('frontend/images/index/index-new/tg-three.png') }}" alt="" srcset=""
                        class="img-fluid tg-three-img d-none d-md-block d-lg-none">

                    <img src="{{asset('frontend/images/index/sm-newlptimg.svg')}}" alt="" srcset="" class="w-100 px-4 img-fluid d-block d-md-none">
                </div>
                <div class="col-12 col-md-6 col-lg-7 col-xxl-8 position-relative">
                    <img src="{{ asset('frontend/images/index/index-new/thanoshand.svg') }}" alt=""
                        srcset="" class="img-fluid thanoshand-img">

                    <img src="{{ asset('frontend/images/index/index-new/arrowtype.svg') }}" alt=""
                        srcset="" class="img-fluid arrowtype-img">
                    <div class="outer-tgbg">
                        <div class="outer-tgbg-black">
                            <div class="ofmainbg">
                                <div class="text-white h2 fw-600 our-prfsn">For Our <span class="lpinkmc">Professionals ?</span>
                                </div>
                                <div class="text-white smty-text">
                                    <span class="lpinkmc">Smartly</span> Deliver Photos to your Clients
                                </div>
                                <div class="text-white clcphotot">
                                    Clicking photos is one half of the task. The second half is delivering them to your
                                    clients.
                                </div>

                                <div class="text-white cmw-text">
                                    Choose the modern way of delivering photos smartly using AI. With our paid plans, unlock
                                    Kwikpic s best features to grow your brand and customer reach, choose from a range of
                                    gallery templates to best represent your style, get different download settings and much
                                    more!
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="position-relative d-none d-sm-block">


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="fw-500 mb-0 text-white py-5 fydwtm-text"><span class="lpinkmc">Features</span> you don’t want to
                            miss</h2>
                        <div class="custome-accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header " id="headingOne">
                                        <button class="accordion-button h2 fw-600 d-flex justify-content-between"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Intelligent Statistics

                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 24H41" stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M28 38L42 24L28 10" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body position-relative">

                                            <img src="{{ asset('frontend/images/index/index-new/dwimg.png') }}"
                                                alt="" srcset="" class="img-fluid dwimg">

                                            <div class="accordion-body-mi">
                                                <div class="h5 fw-500 text-white mb-0 text-center position-relative lycd-text"
                                                    style="z-index:99">
                                                    Let your clients discover their pictures
                                                    in a matter of seconds with our cutting edge AI. 99.4 % accurate, 100%
                                                    awesome.
                                                </div>
                                            </div>




                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed d-flex justify-content-between"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Custom Web App
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 24H41" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M28 38L42 24L28 10" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="text-white py-2">
                                            A custom web application is a software built specifically for one company or for
                                            a specific purpose. Small businesses can often benefit from custom web
                                            applications because they are a cost-effective way to solve a problem.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed d-flex justify-content-between "
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Safe, Secure & Private

                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 24H41" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M28 38L42 24L28 10" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="text-white py-2">
                                            Be careful when browsing the web, using social media, or reading email. Many
                                            scams, known as phishing scams, try to steal your personal information or
                                            money.<br>
                                            <b> Privacy</b> : Refers to personal information and how it is accessed and
                                            viewed.<br>
                                            <b>Security</b> : Refers to the protection of personal information and data.<br>
                                            <b>Safety</b> : Refers to the protection of someone or something from harm.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="d-block d-sm-none">
            <div class="fw-500 text-white text-center">
               <span class="darkpink">Features</span> you
            </div>
            <div class="fw-500 text-white text-center">
                don’t want to miss
            </div>

            <hr class="fhrtag">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div class="fw-600 text-white text-center textof-mainfeatures" >Intelligent Statistics</div>
                        <div class="plpr-13px">
                            <img src="{{asset('frontend/images/index/istic.svg')}}" alt="" srcset="" class="img-fluid w-100 rounded-3">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="fw-500 text-white crner-mainangle" >
                                <div class="crner-mainangle-insider">
                                    <div class="crner-angle">
                                        <div class="crner-angle-text" >
                                            Let your clients discover their pictures in a matter of seconds with our cutting edge AI. 99.4 % accurate, 100% awesome.

                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
            </div>


            <hr class="fhrtag">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div class="fw-600 text-white text-center textof-mainfeatures" >Blazing Fast AI Recognition</div>
                        <div class="plpr-13px">
                            <img src="{{asset('frontend/images/index/blazingimg.png')}}" alt="" srcset="" class="img-fluid w-100 rounded-3">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="fw-500 text-white crner-mainangle-bfar" >
                                <div class="crner-mainangle-insider-bfar">
                                    <div class="main-crner-angle-text-bfar" >
                                        <div class="crner-angle-bfar">
                                            <div class="crner-angle-text" >
                                                Let your clients discover their pictures in a matter of seconds with our cutting edge AI. 99.4 % accurate, 100% awesome.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
            </div>

            <hr class="fhrtag">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div class="fw-600 text-white text-center textof-mainfeatures" >Custom web App</div>
                        <div class="plpr-13px">
                            <img src="{{asset('frontend/images/index/sm-custome-app.png')}}" alt="" srcset="" class="img-fluid w-100 rounded-3">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="fw-500 text-white crner-mainangle-bfar" >
                                <div class="crner-mainangle-insider-bfar">
                                    <div class="main-crner-angle-text-bfar" >
                                        <div class="crner-angle-bfar">
                                            <div class="crner-angle-text" >
                                                Let your clients discover their pictures in a matter of seconds with our cutting edge AI. 99.4 % accurate, 100% awesome.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
            </div>

            <hr class="fhrtag">
            <div class="container pb-4 pb-sm-0">
                <div class="row">

                    <div class="col-12">
                        <div class="fw-600 text-white text-center textof-mainfeatures" >Safe, Secure & Private</div>
                        <div class="plpr-13px">
                            <img src="{{asset('frontend/images/index/safe-secure-private.png')}}" alt="" srcset="" class="img-fluid w-100 rounded-3">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="fw-500 text-white crner-mainangle-bfar" >
                                <div class="crner-mainangle-insider-bfar">
                                    <div class="main-crner-angle-text-bfar" >
                                        <div class="crner-angle-bfar">
                                            <div class="crner-angle-text" >
                                                Let your clients discover their pictures in a matter of seconds with our cutting edge AI. 99.4 % accurate, 100% awesome.
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



    <div class="container main-large-slider sm-container-padd">

        <div class="main_slide_main">
            <div class="outer-smarty-bg position-relative">

                <img src="{{ asset('frontend/images/index/index-new/crossline.svg') }}" alt="" srcset=""
                    class="img-fluid crossline-img">
                <div class="smarty-bg">

                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-11 col-md-9">
                            <div class="slidetext text-white active text-center">
                                <div class="h1 mb-0 main-topheading fw-300 px-5 px-sm-0">
                                    <span class="text-prime fw-600"> 1 Market smartly </span> at every step
                                </div>
                                <div class="h5 mb-0 fw-500 sm-sltext px-4 px-sm-0">
                                    1 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center ">
                                <div class="h1 mb-0 main-topheading fw-300">
                                    <span class="text-prime fw-600"> 2 Market smartly </span> at every step
                                </div>
                                <div class="h5 mb-0 fw-500 sm-sltext">
                                    2 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center">
                                <div class="h1 mb-0 main-topheading fw-300">
                                    <span class="text-prime fw-600"> 3 Market smartly </span> at every step
                                </div>
                                <div class="h5 mb-0 fw-500 sm-sltext">
                                    3 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center">
                                <div class="h1 mb-0 main-topheading fw-300">
                                    <span class="text-prime fw-600"> 4 Market smartly </span> at every step
                                </div>
                                <div class="h5 mb-0 fw-500 sm-sltext">
                                    4 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center">
                                <div class="h1 mb-0 main-topheading fw-300">
                                    <span class="text-prime fw-600"> 5 Market smartly </span> at every step
                                </div>
                                <div class="h5 mb-0 fw-500 sm-sltext">
                                    5 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center">
                                <div class="h1 mb-0 main-topheading fw-300">
                                    <span class="text-prime fw-600"> 6 Market smartly </span> at every step
                                </div>
                                <div class="h5 mb-0 fw-500 sm-sltext">
                                    6 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>

                        </div>
                    </div>




                </div>



            </div>
        </div>


        <div class="row d-flex align-items-center justify-content-center slider-mainpadding">
            <div class="col-12">
                <div class="row">



                    <div class="col-12 ">
                        <div class="rev_slider">
                            <div class="rev_slide active">
                                <div class="test">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 1"
                                        class="rev_slideimg">
                                </div>
                            </div>

                            <div class="rev_slide">
                                <div class="test">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 2"
                                        lass="rev_slideimg">

                                </div>
                            </div>

                            <div class="rev_slide">
                                <div class="test">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 3"
                                        lass="rev_slideimg">

                                </div>
                            </div>

                            <div class="rev_slide">
                                <div class="test">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 4"
                                        lass="rev_slideimg">

                                </div>
                            </div>

                            <div class="rev_slide">
                                <div class="test">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 5"
                                        lass="rev_slideimg">

                                </div>
                            </div>
                            <div class="rev_slide">
                                <div class="test">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 6"
                                        lass="rev_slideimg">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>



    {{-- <div class="container">
        <div class="smarty-bg-mobile">
            <div class="main_slide_main-mobile">
                <div class="outer-smarty-bg-mobile">


                    <div class="main_slide_main">
                        <div class="outer-smarty-bg position-relative">

                            <img src="{{ asset('frontend/images/index/index-new/crossline.svg') }}" alt="" srcset=""
                                class="img-fluid crossline-img">
                            <div class="smarty-bg-mobile">

                                <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col-11 col-md-9">
                                        <div class="slidetext text-white active text-center">
                                            <div class="h1 mb-0 main-topheading fw-300">
                                                <span class="text-prime fw-600"> 1 Market smartly </span> at every step
                                            </div>
                                            <div class="h5 mb-0 fw-500 sm-sltext">
                                                1 Collect invaluable client data with their consent. Use it to reach just the
                                                right audience at fraction of a price compared to instagram marketing.
                                            </div>
                                        </div>
                                        <div class="slidetext text-white text-center ">
                                            <div class="h1 mb-0 main-topheading fw-300">
                                                <span class="text-prime fw-600"> 2 Market smartly </span> at every step
                                            </div>
                                            <div class="h5 mb-0 fw-500 sm-sltext">
                                                2 Collect invaluable client data with their consent. Use it to reach just the
                                                right audience at fraction of a price compared to instagram marketing.
                                            </div>
                                        </div>
                                        <div class="slidetext text-white text-center">
                                            <div class="h1 mb-0 main-topheading fw-300">
                                                <span class="text-prime fw-600"> 3 Market smartly </span> at every step
                                            </div>
                                            <div class="h5 mb-0 fw-500 sm-sltext">
                                                3 Collect invaluable client data with their consent. Use it to reach just the
                                                right audience at fraction of a price compared to instagram marketing.
                                            </div>
                                        </div>
                                        <div class="slidetext text-white text-center">
                                            <div class="h1 mb-0 main-topheading fw-300">
                                                <span class="text-prime fw-600"> 4 Market smartly </span> at every step
                                            </div>
                                            <div class="h5 mb-0 fw-500 sm-sltext">
                                                4 Collect invaluable client data with their consent. Use it to reach just the
                                                right audience at fraction of a price compared to instagram marketing.
                                            </div>
                                        </div>
                                        <div class="slidetext text-white text-center">
                                            <div class="h1 mb-0 main-topheading fw-300">
                                                <span class="text-prime fw-600"> 5 Market smartly </span> at every step
                                            </div>
                                            <div class="h5 mb-0 fw-500 sm-sltext">
                                                5 Collect invaluable client data with their consent. Use it to reach just the
                                                right audience at fraction of a price compared to instagram marketing.
                                            </div>
                                        </div>
                                        <div class="slidetext text-white text-center">
                                            <div class="h1 mb-0 main-topheading fw-300">
                                                <span class="text-prime fw-600"> 6 Market smartly </span> at every step
                                            </div>
                                            <div class="h5 mb-0 fw-500 sm-sltext">
                                                6 Collect invaluable client data with their consent. Use it to reach just the
                                                right audience at fraction of a price compared to instagram marketing.
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>



                        </div>
                    </div>


                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-12">
                            <div class="row">



                                <div class="col-12 mobile-align">
                                    <div class="rev_slider">
                                        <div class="rev_slide active">
                                            <div class="test">
                                                <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 1"
                                                    class="rev_slideimg">
                                            </div>
                                        </div>

                                        <div class="rev_slide">
                                            <div class="test">
                                                <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 2"
                                                    lass="rev_slideimg">

                                            </div>
                                        </div>

                                        <div class="rev_slide">
                                            <div class="test">
                                                <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 3"
                                                    lass="rev_slideimg">

                                            </div>
                                        </div>

                                        <div class="rev_slide">
                                            <div class="test">
                                                <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 4"
                                                    lass="rev_slideimg">

                                            </div>
                                        </div>

                                        <div class="rev_slide">
                                            <div class="test">
                                                <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 5"
                                                    lass="rev_slideimg">

                                            </div>
                                        </div>
                                        <div class="rev_slide">
                                            <div class="test">
                                                <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt="Image 6"
                                                    lass="rev_slideimg">

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
    </div> --}}





    <div class="position-relative isolation overflow-hidden bg-pricetag">

        <img src="{{ asset('frontend/images/index/index-new/pricebgimg.png') }}" alt="" srcset=""
            class="img-fluid w-100 position-absolute h-100 pricebgimg-img" style="z-index: -1;">

        <div class="container pt-5 mt-xl-5">

            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-10 col-xl-9 col-xxl-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-4">
                                <p class="algoshare pt-4 pt-sm-0">
                                    Picscan offers tiered pricing plans <br />
                                    with options for free basic access, mid-tier advanced features, <br />
                                    and a premium plan with full access to all tools and priority support.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-6 col-sm-0 d-flex flex-column gap-5 d-sm-none">
                        <div class=" text-white">
                            Pricing <br/>
                            plans <br />
                            for algoshare
                        </div>
                        <div>
                            <ul class="list-unstyled">
                                <li class="li12px text-white pb-3">Storage</li>
                                <li class="li12px text-white pb-3">Max Image Size</li>
                                <li class="li12px text-white pb-3">Face Searches</li>
                                <li class="li12px text-white pb-3">Pre Registrations</li>
                                <li class="li12px text-white pb-3">Events</li>
                                <li class="li12px text-white pb-3">Image limit per sub event</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-6 col-sm-12">

                        <div class="slider curve-main-slider row">



                             <div class="col  card-price mb-xl-2 mb-md-4 white card-price-tentb" >

                                <div class="tentb-bgblck ">
                                    <img src="{{ asset('frontend/images/priceimg/tenelement.svg') }}" alt=""
                                        srcset="" class="img-fluid tenelement-img">
                                    <div class="main-tentb prcard-minheight">
                                        <h5 class="text-prime">FREE</h5>
                                        <p class="data">10GB</p>
                                        <span class="duration d-block"> 14 day trial</span>
                                        <div class="text-center my-4">
                                            <button class="btn-round first"> TRY NOW</button>
                                        </div>
                                        <p class="points">10GB</p>
                                        <p class="points">5MB</p>
                                        <p class="points">25 per event</p>
                                        <p class="points">25 per event</p>
                                        <p class="points">1</p>
                                        <p class="points" style="margin-bottom: 0px;padding-bottom:1rem">10</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col card-price mb-xl-2 mb-md-4 orange card-price-hundredtb" >
                                <div class="hundredtb-bgblck">
                                    <img src="{{ asset('frontend/images/priceimg/hundredelement.svg') }}" alt=""
                                        srcset="" class="img-fluid hundred-element-img">
                                    <div class="main-hundredtb prcard-minheight">
                                        <h5 class="yclr">BASIC</h5>
                                        <p class="data">100GB</p>
                                        <span class="duration d-block"> Contact Sales For Pricing</span>
                                        <div class="text-center my-4">
                                            <button class="btn-round basic-btn second"> CONTACT SALES</button>
                                        </div>
                                        <p class="points">100GB</p>
                                        <p class="points">5MB</p>
                                        <p class="points">15 per event</p>
                                        <p class="points">15 per event</p>
                                        <p class="points">100</p>
                                        <p class="points">6000</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col card-price mb-xl-2 mb-md-4 empty ">
                               <div class="prcard-minheight">
                                    <h5 class="text-white">Pricing plans for algoshare</h5>

                                    <div class="mt-sm-5  pt-5">
                                        <p class="points">Storage</p>
                                        <p class="points">Max Image Size</p>
                                        <p class="points">Face Searches</p>
                                        <p class="points">Pre Registrations</p>

                                        <p class="points">Events</p>
                                        <p class="points">Storage</p>
                                        <p class="points">Image Limit Per Sub Event</p>
                                    </div>
                               </div>
                            </div>

                            <div class="col card-price mb-xl-2 mb-md-4 position-relative purple card-price-onetb">
                                <div class="onetb-bgblck">
                                    <img src="{{ asset('frontend/images/priceimg/onetbelement.svg') }}" alt=""
                                        srcset="" class="img-fluid one-element-img">

                                    <div class="main-onetb position-relative prcard-minheight">
                                        <span class="recomend"
                                        style="background-color: #37054D;border-radius:5px;font-size:14px;font-weight:600;color:white;padding:5px 18px"
                                        >Recommended</span>

                                        <h5 class="narangicolor">ADVANCE</h5>
                                        <p class="data">1TB</p>
                                        <span class="duration d-block"> Contact Sales For Pricing</span>
                                        <div class="text-center my-4">
                                            <button class="btn-round advance-btn third"> CONTACT SALES</button>
                                        </div>
                                        <p class="points">1TB</p>
                                        <p class="points">15MB</p>
                                        <p class="points">2000 per event</p>
                                        <p class="points">2000 per event</p>
                                        <p class="points">200</p>
                                        <p class="points">10000</p>
                                    </div>

                                </div>

                            </div>

                            <div class="col card-price mb-xl-2 mb-md-4 green card-price-fivetb">
                                <div class="fivetb-bgblck">
                                    <img src="{{ asset('frontend/images/priceimg/fivetbelement.svg') }}" alt=""
                                        srcset="" class="img-fluid five-element-img">

                                    <div class="main-fivetb prcard-minheight">
                                        <h5 class="greencolor">PREMIUM</h5>
                                        <p class="data">10GB</p>
                                        <span class="duration d-block"> Contact Sales For Pricing</span>
                                        <div class="text-center my-4">
                                            <button class="btn-round premium-btn fifth"> CONTACT SALES</button>
                                        </div>
                                        <p class="points">5TB</p>
                                        <p class="points">25MB</p>
                                        <p class="points">Unlimited</p>
                                        <p class="points">Unlimited</p>
                                        <p class="points">Unlimited</p>
                                        <p class="points">20000</p>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="progress-container d-block d-sm-none">
                            <div class="progress-bar"></div>
                        </div>

                    </div>

                    <div class="col-12 text-center text-white ">
                        <div class="text-start text-sm-center  mt-5 pb-5 mb-2">
                            <p class="algobottom"> * After your subscription ends, a 15-day countdown will commence before removing
                                your data securely.</p>
                        </div>
                    </div>
            </div>


                {{-- <div class="curve">

                    <div class="row d-flex gap-4 justify-content-center mt-5 px-md-0 px-3">

                        <div class="col">
                            <div class="card-price mb-xl-2 mb-md-4 white card-price-tentb">

                                <div class="tentb-bgblck">
                                    <img src="{{ asset('frontend/images/priceimg/tenelement.svg') }}" alt=""
                                        srcset="" class="img-fluid tenelement-img">
                                    <div class="main-tentb">
                                        <h5 class="text-prime">FREE</h5>
                                        <p class="data">10GB</p>
                                        <span class="duration d-block"> 14 day trial</span>
                                        <div class="text-center my-4">
                                            <button class="btn-round first"> TRY NOW</button>
                                        </div>
                                        <p class="points">10GB</p>
                                        <p class="points">5MB</p>
                                        <p class="points">25 per event</p>
                                        <p class="points">25 per event</p>
                                        <p class="points">1</p>
                                        <p class="points" style="margin-bottom: 0px;padding-bottom:1rem">10</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card-price mb-xl-2 mb-md-4 orange card-price-hundredtb">
                                <div class="hundredtb-bgblck">
                                    <img src="{{ asset('frontend/images/priceimg/hundredelement.svg') }}" alt=""
                                        srcset="" class="img-fluid hundred-element-img">
                                    <div class="main-hundredtb">
                                        <h5 class="yclr">BASIC</h5>
                                        <p class="data">100GB</p>
                                        <span class="duration d-block"> Contact Sales For Pricing</span>
                                        <div class="text-center my-4">
                                            <button class="btn-round basic-btn second"> CONTACT SALES</button>
                                        </div>
                                        <p class="points">100GB</p>
                                        <p class="points">5MB</p>
                                        <p class="points">15 per event</p>
                                        <p class="points">15 per event</p>
                                        <p class="points">100</p>
                                        <p class="points">6000</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card-price mb-xl-2 mb-md-4 empty">
                                <h5 class="text-white">Pricing plans for algoshare</h5>

                                <div class="mt-sm-5  pt-5">
                                    <p class="points">Storage</p>
                                    <p class="points">Max Image Size</p>
                                    <p class="points">Face Searches</p>
                                    <p class="points">Pre Registrations</p>

                                    <p class="points">Events</p>
                                    <p class="points">Storage</p>
                                    <p class="points">Image Limit Per Sub Event</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card-price mb-xl-2 mb-md-4 position-relative purple card-price-onetb">
                                <div class="onetb-bgblck">
                                    <img src="{{ asset('frontend/images/priceimg/onetbelement.svg') }}" alt=""
                                        srcset="" class="img-fluid one-element-img">

                                    <div class="main-onetb">
                                        <span class="recomend">Recommended</span>
                                        <h5 class="narangicolor">ADVANCE</h5>
                                        <p class="data">1TB</p>
                                        <span class="duration d-block"> Contact Sales For Pricing</span>
                                        <div class="text-center my-4">
                                            <button class="btn-round advance-btn third"> CONTACT SALES</button>
                                        </div>
                                        <p class="points">1TB</p>
                                        <p class="points">15MB</p>
                                        <p class="points">2000 per event</p>
                                        <p class="points">2000 per event</p>
                                        <p class="points">200</p>
                                        <p class="points">10000</p>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div>
                            <div class="col card-price mb-xl-2 mb-md-4 green card-price-fivetb">
                                <div class="fivetb-bgblck">
                                    <img src="{{ asset('frontend/images/priceimg/fivetbelement.svg') }}" alt=""
                                        srcset="" class="img-fluid five-element-img">

                                    <div class="main-fivetb">
                                        <h5 class="greencolor">PREMIUM</h5>
                                        <p class="data">10GB</p>
                                        <span class="duration d-block"> Contact Sales For Pricing</span>
                                        <div class="text-center my-4">
                                            <button class="btn-round premium-btn fifth"> CONTACT SALES</button>
                                        </div>
                                        <p class="points">5TB</p>
                                        <p class="points">25MB</p>
                                        <p class="points">Unlimited</p>
                                        <p class="points">Unlimited</p>
                                        <p class="points">Unlimited</p>
                                        <p class="points">20000</p>
                                    </div>

                                </div>
                            </div>
                        <div>



                    </div>

                    <div class="text-center mt-5 pb-5 mb-2">
                        <p class="algobottom"> * After your subscription ends, a 15-day countdown will commence before removing
                            your data securely.</p>
                    </div>

                </div> --}}

        </div>
    </div>




@endsection
@section('js')
<script>
  $(document).ready(function () {
  var totalSlides = $('.slider .card-price').length;
  console.log("total slide", totalSlides);
  var progressStep = 100 / (totalSlides - 1);
  var currentProgress = 0;
  $('.slider').slick({
    dots: false,
    infinite: true,
    speed: 500,
    slidesToShow: 5,
    arrows: false,
    adaptiveHeight: true,
    cssEase: 'ease-in-out',
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    if (nextSlide > currentSlide) {
      currentProgress = nextSlide * progressStep;
    } else if (nextSlide === 0) {
      currentProgress = 0;
    }
    $('.progress-bar').css('width', currentProgress + '%');
  });
});

  </script>




    <script>
        $('.first').click(function() {
            $('.active-link1').removeClass('d-none');
            $('.active-link2').addClass('d-none');
            $('.active-link3 ').addClass('d-none');
            $('.active-link4 ').addClass('d-none');
            $('.active-link5 ').addClass('d-none');
        });
        $('.second').click(function() {
            $('.active-link2').removeClass('d-none');
            $('.active-link1 ').addClass('d-none');
            $('.active-link3 ').addClass('d-none');
            $('.active-link4 ').addClass('d-none');
            $('.active-link5 ').addClass('d-none');
        });
        $('.third').click(function() {
            $('.active-link3').removeClass('d-none');
            $('.active-link1 ').addClass('d-none');
            $('.active-link2 ').addClass('d-none');
            $('.active-link4 ').addClass('d-none');
            $('.active-link5 ').addClass('d-none');
        });

        $('.four').click(function() {
            $('.active-link4').removeClass('d-none');
            $('.active-link1 ').addClass('d-none');
            $('.active-link2 ').addClass('d-none');
            $('.active-link3 ').addClass('d-none');
            $('.active-link5 ').addClass('d-none');
        });

        $('.five').click(function() {
            $('.active-link5').removeClass('d-none');
            $('.active-link1 ').addClass('d-none');
            $('.active-link2 ').addClass('d-none');
            $('.active-link3 ').addClass('d-none');
            $('.active-link4 ').addClass('d-none');
        });
    </script>


    <script>
        var rev = $('.rev_slider');
        var texts = $('.slidetext');

        rev.on('init', function(event, slick, currentSlide) {
            var
                cur = $(slick.$slides[slick.currentSlide]),
                next = cur.next(),
                prev = cur.prev();
            prev.addClass('slick-sprev');
            next.addClass('slick-snext');
            cur.removeClass('slick-snext').removeClass('slick-sprev');
            slick.$prev = prev;
            slick.$next = next;
        }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            console.log('beforeChange');
            var
                cur = $(slick.$slides[nextSlide]);
            console.log(slick.$prev, slick.$next);
            slick.$prev.removeClass('slick-sprev');
            slick.$next.removeClass('slick-snext');
            next = cur.next(),
                prev = cur.prev();
            prev.prev();
            prev.next();
            prev.addClass('slick-sprev');
            next.addClass('slick-snext');
            slick.$prev = prev;
            slick.$next = next;
            cur.removeClass('slick-next').removeClass('slick-sprev');
        });

        rev.slick({
            speed: 1000,
            arrows: true,
            dots: false,
            focusOnSelect: true,

            prevArrow: '<a href="#" class="pre-arrow"><div class="pre-arrow-firstinsider"><div class="pre-arrow-insider"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.95406 12.7959L9.70406 19.5459C9.91541 19.7572 10.2021 19.8759 10.5009 19.8759C10.7998 19.8759 11.0865 19.7572 11.2978 19.5459C11.5092 19.3345 11.6279 19.0479 11.6279 18.749C11.6279 18.4501 11.5092 18.1635 11.2978 17.9521L6.46875 13.1249H20.25C20.5484 13.1249 20.8345 13.0064 21.0455 12.7954C21.2565 12.5844 21.375 12.2983 21.375 11.9999C21.375 11.7016 21.2565 11.4154 21.0455 11.2044C20.8345 10.9934 20.5484 10.8749 20.25 10.8749H6.46875L11.2959 6.04492C11.5073 5.83358 11.626 5.54693 11.626 5.24804C11.626 4.94916 11.5073 4.66251 11.2959 4.45117C11.0846 4.23983 10.7979 4.12109 10.4991 4.12109C10.2002 4.12109 9.91353 4.23983 9.70219 4.45117L2.95219 11.2012C2.84729 11.3058 2.7641 11.4302 2.7074 11.5671C2.65069 11.704 2.62159 11.8507 2.62177 11.9989C2.62194 12.1471 2.65139 12.2938 2.70841 12.4305C2.76544 12.5673 2.84892 12.6914 2.95406 12.7959Z" fill=""/></svg></div></div></a> ',
            nextArrow: '<a href="#" class="next-arrow"><div class="next-arrow-firstinsider"> <div class="next-arrow-insider"><svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.0459 8.79586L12.2959 15.5459C12.0846 15.7572 11.7979 15.8759 11.4991 15.8759C11.2002 15.8759 10.9135 15.7572 10.7022 15.5459C10.4908 15.3345 10.3721 15.0479 10.3721 14.749C10.3721 14.4501 10.4908 14.1635 10.7022 13.9521L15.5312 9.12492H1.75C1.45163 9.12492 1.16548 9.00639 0.954505 8.79541C0.743526 8.58444 0.625 8.29829 0.625 7.99992C0.625 7.70155 0.743526 7.4154 0.954505 7.20442C1.16548 6.99345 1.45163 6.87492 1.75 6.87492H15.5312L10.7041 2.04492C10.4927 1.83358 10.374 1.54693 10.374 1.24804C10.374 0.949159 10.4927 0.662514 10.7041 0.45117C10.9154 0.239826 11.2021 0.121094 11.5009 0.121094C11.7998 0.121094 12.0865 0.239826 12.2978 0.45117L19.0478 7.20117C19.1527 7.30583 19.2359 7.43018 19.2926 7.56707C19.3493 7.70397 19.3784 7.85073 19.3782 7.9989C19.3781 8.14708 19.3486 8.29377 19.2916 8.43053C19.2346 8.5673 19.1511 8.69145 19.0459 8.79586Z" fill=""/></svg></div></div> </a> ',
            infinite: true,
            centerMode: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipe: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {

                        autoplay: true,
                        autoplaySpeed: 2000,

                    },
                },
            ],

        });

        rev.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            texts.removeClass('active');
            $(texts[nextSlide]).addClass('active');
        });
    </script>

@endsection
