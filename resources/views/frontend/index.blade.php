@extends('frontend.layouts.app')
@section('title')
@section('content')
    <section>
        <div style="position: relative">
         
            <img src="{{asset('frontend/images/index/index-new/full.svg')}}" alt="Full hero image of the website's main section" class="img-fluid full-img">
            <img src="{{asset('frontend/images/index/index-new/blurhero.svg')}}" alt="Blurred background hero image" class="img-fluid blurhero-img">
            <img src="{{asset('frontend/images/index/index-new/plainplate.svg')}}" alt="Plain plate design element for the hero section" class="img-fluid plainplate-img">
            <img src="{{asset('frontend/images/index/index-new/smalllarrow.svg')}}" alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img">
            
            <div class="container overflow-hide">
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main" >
                    <div class="col-lg-8 col-xl-8 col-xxl-7 text-white position-relative">
                        <div class="display-4 display-xl-4 display-xxl-3 fw-500 share-img-text">
                            Share Images
                            <img src="{{asset('frontend/images/index/index-new/rightarrow.svg')}}" alt="" srcset="" class="img-fluid">

                        </div>
                        <div class="display-4 display-xl-4 display-xxl-3 fw-500">
                            <span>Using</span> <span class="dbcolor">Face</span> <span class="darkpink">Recognition</span>
                        </div>
                        <div class=" h4 mb-0" style="padding-top: 29px">Wow Your Clients And Get <span class="darkpink">8X</span> More Visibility </div>

                    </div>
                    <div class="col-lg-4 col-xl-4 col-xxl-5">
                        <img src="{{asset('frontend/images/index/index-new/new-robot-one.png')}}" alt="" srcset="" class="img-fluid" style="width: 474px">
                    </div>
                
                </div>
                  
            </div>
        </div>

        <div class="kws-bg" style="">
           
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="text-white" style="font-size: 36px">How Kwikpic <span style="color: #FF0C7D;">Works?</span></div>
                            <div class="text-white h4">let your clients discover their images within seconds</div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-12">
                            <img src="{{asset('frontend/images/index/index-new/robot-withimg.svg')}}" alt="" srcset="" class="img-fluid" style="margin-bottom:-40px">

                        </div>
                    </div>

                    <div class="row row-cols-4">
                        <div class="col">
                            <div class="scn-sharemain">
                                <div class="share-box">
                                    <img src="{{ asset('frontend/images/index/chain.svg') }}" alt="" class="img-fluid">
        
                                </div>
        
                                <h4 class="text-white kanit-thin fw-400">
                                    Share event link with attendees via email, QR code or WhatsApp
                                </h4>
                            </div>

                        </div>
                        <div class="col">
                            
                            <div class="scn-sharemain">
                                <div class="share-box">
                                    <img src="{{ asset('frontend/images/index/camera.svg') }}" alt="" class="img-fluid">

                                </div>

                                <h4 class="text-white kanit-thin fw-400">
                                    Attendees go to the link and take a selfie
                                </h4>
                            </div>

                        </div>
                        <div class="col">
                            <div class="scn-sharemain">
                                <div class="share-box">
                                    <img src="{{ asset('frontend/images/index/faceai.svg') }}" alt="" class="img-fluid">

                                </div>
        
                                <h4 class="text-white kanit-thin fw-400">
                                    Our AI recognizes attendees with 99% accuracy and show them all their images
                                </h4>
                            </div>
                        </div>
                        <div class="col">
                            <div class="scn-sharemain">
                                <div class="share-box">
                                    <img src="{{ asset('frontend/images/index/ciframe.svg') }}" alt="" class="img-fluid">
        
                                </div>
        
                                <h4 class="text-white kanit-thin fw-400">
                                    Images can be printed or downloaded right from mobile
                                </h4>
                            </div>
                        </div>
    
                    </div>
                </div>
            
        </div>

        <div class="container">
            <div class="row" style="position: relative">
                <img src="{{asset('frontend/images/index/index-new/lptbg.png')}}" alt="" srcset="" class="img-fluid lptbg-img">
                <img src="{{asset('frontend/images/index/index-new/tg-one.png')}}" alt="" srcset="" class="img-fluid tg-one-img">
                <img src="{{asset('frontend/images/index/index-new/tg-two.png')}}" alt="" srcset="" class="img-fluid tg-two-img">
                <img src="{{asset('frontend/images/index/index-new/tg-three.png')}}" alt="" srcset="" class="img-fluid tg-three-img"> 

                <div class="col-4">
                </div>
                <div class="col-8 position-relative">
                    <img src="{{asset('frontend/images/index/index-new/thanoshand.svg')}}" alt="" srcset="" class="img-fluid thanoshand-img" >

                    <img src="{{asset('frontend/images/index/index-new/arrowtype.svg')}}" alt="" srcset="" class="img-fluid arrowtype-img">
                    <div class="outer-tgbg" >
                        <div class="outer-tgbg-black" >
                            <div class="ofmainbg" >
                                <div class="text-white h2 fw-600">For Our <span class="lpinkmc">Professionals ?</span></div>
                                <div class="text-white smty-text" >
                                    <span class="lpinkmc">Smartly</span> Deliver Photos to your Clients
                                </div>
                                <div class="text-white clcphotot" >
                                    Clicking photos is one half of the task. The second half is delivering them to your clients. 
                                </div>
            
                                <div class="text-white cmw-text" >                        
                                    Choose the modern way of delivering photos smartly using AI. With our paid plans, unlock Kwikpic s best features to grow your brand and customer reach, choose from a range of gallery templates to best represent your style, get different download settings and much more!
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
{{-- 
        <div class="container">
            <div class="row gx-5">
                <div class="col-12 col-lg-6 position-relative anim-bg mt-3">
                    <img src="{{ asset('frontend/images/index/bracket.png') }}" alt="" class="bracket">
                    <img src="{{ asset('frontend/images/index/clientmain.png') }}" alt="" srcset=""
                        class="img-fluid w-100 z-index-0">
                    <span class="px-2 "> <img src="{{ asset('frontend/images/index/scan.png') }}" alt=""
                            srcset="" class=" scan up-down"></span>
                    <h5 class="mb-0 text-white mt-lg-1 mt-0 pt-4 pb-4 pt-lg-0 pb-lg-0 l-h">
                        Facial recognition system that works like a charm, allowing your friends and acquaintances to see
                        every photo that
                        they've made an appearance in!
                    </h5>
                </div>
                <div class="col-12 col-lg-6">
                    <h1 class="text-white mb-0 kpichead title-mob">How Kwikpic Works?</h1>
                    <h4 class="text-white mb-0 kpik-subhead">let your clients discover their images within seconds</h4>
                    <div class="scn-sharemain">
                        <div class="share-box">
                            <img src="{{ asset('frontend/images/index/chain.svg') }}" alt="" class="img-fluid">
                            <img src="{{ asset('frontend/images/index/vector.png') }}" alt="" class="dot">

                        </div>

                        <h4 class="text-white kanit-thin fw-400">
                            Share event link with attendees via email, QR code or WhatsApp
                        </h4>
                    </div>


                    <div class="scn-sharemain">
                        <div class="share-box">
                            <img src="{{ asset('frontend/images/index/camera.svg') }}" alt="" class="img-fluid">
                            <img src="{{ asset('frontend/images/index/vector.png') }}" alt="" class="dot">
                        </div>

                        <h4 class="text-white kanit-thin fw-400">
                            Attendees go to the link and take a selfie
                        </h4>
                    </div>


                    <div class="scn-sharemain">
                        <div class="share-box">
                            <img src="{{ asset('frontend/images/index/faceai.svg') }}" alt="" class="img-fluid">
                            <img src="{{ asset('frontend/images/index/vector.png') }}" alt="" class="dot">
                        </div>

                        <h4 class="text-white kanit-thin fw-400">
                            Our AI recognizes attendees with 99% accuracy and show them all their images
                        </h4>
                    </div>


                    <div class="scn-sharemain">
                        <div class="share-box">
                            <img src="{{ asset('frontend/images/index/ciframe.svg') }}" alt="" class="img-fluid">

                        </div>

                        <h4 class="text-white kanit-thin fw-400">
                            Images can be printed or downloaded right from mobile
                        </h4>
                    </div>
                </div>
            </div>
        </div>  --}}


        {{-- <section class=" mb-md-4 pb-md-4">
            <img src="{{ asset('frontend/images/index/kwik-bg.png') }}" alt="" class="kwik-bg">
        </section> --}}
        {{-- <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="text-white fw-500 sub">For Our Professionals</div>
                    <div class="text-white title-mobi"> <span class="granny-lipgloss">Smartly</span> Deliver
                        Photos To Your Clients</div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 px-0">
                        <div class="our-profession-sctn">
                            <div class="our-profession-sub">
                                <div>
                                    <h4 class="text-white mb-0">
                                        Clicking photos is one half of the task. The second half is delivering them to your
                                        clients.
                                    </h4>
                                    <h4 class="text-white mb-0 pt-4 pb-xl-4">
                                        Choose the modern way of delivering photos smartly using AI. With our paid plans,
                                        unlock Kwikpic s best features to grow your brand and customer reach, choose from a
                                        range of gallery templates to best represent your style, get different download
                                        settings and much more!
                                    </h4>
                                </div>
                                <div class="position-relative pfsn-img">
                                    <img src="{{ asset('frontend/images/index/flowline.svg') }}" alt=""
                                        srcset="" class="img-fluid flowline-img">
                                    <img src="{{ asset('frontend/images/index/mobilesize.png') }}" alt=""
                                        srcset="" class="img-fluid mobilesize">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="position-relative">


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="fw-500 mb-0 text-white py-5"><span class="lpinkmc">Features</span> you don’t want to miss</h2>
                        <div class="custome-accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header " id="headingOne">
                                        <button class="accordion-button h2 fw-600 d-flex justify-content-between" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Intelligent Statistics

                                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 24H41" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M28 38L42 24L28 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                                
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body " style="position: relative">
                                           
                                            <img src="{{asset('frontend/images/index/index-new/dwimg.png')}}" alt="" srcset="" class="img-fluid" style="
                                                width:59%;
                                                height: 290px;
                                                object-fit: cover;
                                                border-radius:70px;
                                                ">
                                           
                                                <div class="accordion-body-mi">
                                                    <div class="h5 fw-500 text-white" style="position: relative;z-index:99">
                                                        Let your clients discover their pictures 
                                                        in a matter of seconds with our cutting edge AI. 99.4 % accurate, 100% awesome.
                                                    </div>
                                                </div>
                                           
                                        
                                       
                                      
                                        </div>

                                    </div>

                                </div>
                            </div>
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Intelligent Statistics
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="text-white py-2">
                                            Statistical intelligence formulates the analysis model and reveals the system
                                            that can be easily visible and understandable to mankind.
                                            Data intelligence refers to the tools and methods that enterprise-scale
                                            organizations use to better understand the information they collect, store, and
                                            utilize to improve their products and/or services. Apply AI and machine learning
                                            to stored data, and you get data intelligence.
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Custom Web App
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 24H41" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M28 38L42 24L28 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                                    <button class="accordion-button collapsed d-flex justify-content-between " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        Safe, Secure & Private

                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 24H41" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M28 38L42 24L28 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
        </div>

    </section>


 
    <div class="container">
       
            <div class="main_slide_main">
                <div style="background: #040404;border-radius:60px;    min-height: 439px;padding-top:65px">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-9 ">
                            <div class="slidetext text-white active text-center">
                                <div class="h2 mb-0 main-topheading">
                                    <span class="text-prime"> 1 Market smartly </span> at every step
                                </div>
                                <div class="h4 mb-0 ">
                                    1 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center ">
                                <div class="h2 mb-0 main-topheading">
                                    <span class="text-prime"> 2 Market smartly </span> at every step
                                </div>
                                <div class="h4 mb-0 ">
                                    2 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center">
                                <div class="h2 mb-0 main-topheading">
                                    <span class="text-prime"> 3 Market smartly </span> at every step
                                </div>
                                <div class="h4 mb-0 ">
                                    3 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center">
                                <div class="h2 mb-0 main-topheading">
                                    <span class="text-prime"> 4 Market smartly </span> at every step
                                </div>
                                <div class="h4 mb-0 ">
                                    4 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center">
                                <div class="h2 mb-0 main-topheading">
                                    <span class="text-prime"> 5 Market smartly </span> at every step
                                </div>
                                <div class="h4 mb-0 ">
                                    5 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
                                </div>
                            </div>
                            <div class="slidetext text-white text-center">
                                <div class="h2 mb-0 main-topheading">
                                    <span class="text-prime"> 6 Market smartly </span> at every step
                                </div>
                                <div class="h4 mb-0 ">
                                    6 Collect invaluable client data with their consent. Use it to reach just the
                                    right audience at fraction of a price compared to instagram marketing.
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




    {{--
    <section class="slider-sec">
        <div class="container ">
            <div class="row ">
                <div class="bg-slider">
                    <div class="img-group d-flex position-relative">
                        <img src="{{asset('frontend/images/index/sl-3.png')}}" alt="" class="f-img">
                        <img src="{{asset('frontend/images/index/sl-1.png')}}" alt="" class="s-img">
                        <img src="{{asset('frontend/images/index/sl-2.png')}}" alt="" class="t-img">
                    </div>
                    <div class="textgroup">
                        <h4 class="text-pink text-center slider-title">Market Smartly <span class="text-white">At Every Step</span></h4>
                    <p class="slider-txt">Collect invaluable client data with their consent. Use it to reach just the right audience at fraction of a price compared to instagram marketing.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="mb-xl-5 position-relative pb-xl-5 uppersection">



        <div class="container pt-5 mt-xl-5">

            <div class="curve">
                <div class="text-center mb-4">
                    <p class="algoshare">Algoshare offers tiered pricing plans with options for free basic access, mid-tier
                        advanced features, and a premium plan with full access to all tools and priority support.</p>
                </div>
                <div class="row d-flex gap-4 justify-content-center mt-5 px-md-0 px-3">

                    <div class="card-price mb-xl-2 mb-md-4 white">
                        <h5>FREE</h5>
                        <p class="data">10GB</p>
                        <span class="duration d-block"> 14 day trial</span>
                        <div class="text-center my-4">
                            <button class="btn-round first"> TRY NOW</button>
                        </div>
                        <p class="points">10GB</p>
                        <p class="points">5MB</p>
                        <p class="points">25 per event</p>
                        <p class="points">25 per event</p>
                    </div>

                    <div class="card-price mb-xl-2 mb-md-4 orange">
                        <h5>BASIC</h5>
                        <p class="data">100GB</p>
                        <span class="duration d-block"> Contact Sales For Pricing</span>
                        <div class="text-center my-4">
                            <button class="btn-round second"> CONTACT SALES</button>
                        </div>
                        <p class="points">100GB</p>
                        <p class="points">5MB</p>
                        <p class="points">15 per event</p>
                        <p class="points">15 per event</p>
                        <p class="points">100</p>
                        <p class="points">6000</p>
                    </div>


                    <div class="card-price mb-xl-2 mb-md-4 empty">
                        <h5>Pricing plans for algoshare</h5>

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

                    <div class="card-price mb-xl-2 mb-md-4 position-relative purple">
                        <span class="recomend">Recommended</span>
                        <h5>ADVANCE</h5>
                        <p class="data">1TB</p>
                        <span class="duration d-block"> Contact Sales For Pricing</span>
                        <div class="text-center my-4">
                            <button class="btn-round third"> CONTACT SALES</button>
                        </div>
                        <p class="points">1TB</p>
                        <p class="points">15MB</p>
                        <p class="points">2000 per event</p>
                        <p class="points">2000 per event</p>
                        <p class="points">200</p>
                        <p class="points">10000</p>
                    </div>

                    <div class="card-price mb-xl-2 mb-md-4 green">
                        <h5>PREMIUM</h5>
                        <p class="data">10GB</p>
                        <span class="duration d-block"> Contact Sales For Pricing</span>
                        <div class="text-center my-4">
                            <button class="btn-round fifth"> CONTACT SALES</button>
                        </div>
                        <p class="points">5TB</p>
                        <p class="points">25MB</p>
                        <p class="points">Unlimited</p>
                        <p class="points">Unlimited</p>
                        <p class="points">Unlimited</p>
                        <p class="points">20000</p>
                    </div>



                </div>

                <div class="text-center mt-5">
                    <p class="algobottom"> * After your subscription ends, a 15-day countdown will commence before removing
                        your data securely.</p>
                </div>

            </div>
        </div>
    </section>
{{-- 
    <section >
        <div class="container">

            <div class="row py-2 d-flex align-items-center">
                <div class="col-lg-4 ">
                    <h3 class="section-title text-lg-start text-center mb-lg-0 mb-4"><span class="text-white">Included in
                            every</span><br>
                        <span class="text-pink">algoshare plan</span>
                    </h3>
                </div>

                <div class="col-lg-8 px-md-1 px-3">
                    <div class="row box-outer">
                        <div class="col-md-6">
                            <div class="box">
                                <h4 class="title">Analytics</h4>
                                <p>See user trends, download the list of all users who accessed the event.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="box">
                                <h4 class="title">Face Searches</h4>
                                <p>Allow users to find their own photos, just by clicking a selfie</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="box">
                                <h4 class="title">Pre Registrations</h4>
                                <p>Allow guests to pre register to get their photos directly in their email when you upload.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="box">
                                <h4 class="title">Print Store</h4>
                                <p>Users can order prints directly from the gallery. You get comission on every sale.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}



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


        var slider = $('.slider');

        $('.prev').click(function() {
            slider.slick('slickPrev');
            return false;
        });

        $('.next').click(function() {
            slider.slick('slickNext');
            return false;
        });

        slider.slick({
            infinite: true,
            dots: false,
            arrows: false,
            fade: true,
            fadeSpeed: 1000
        });
    </script>



    <script>
        var mq = window.matchMedia("(min-width: 1396px)");
        if (mq.matches) {

            setInterval(function() {
                $('.scan').css('transition', 'all 1s linear');
                $('.scan').css('top', '0px');

            }, 1000);


            setInterval(function() {

                $('.scan').css('top', '400px');
            }, 3000);


        }



        var mq = window.matchMedia("(min-width: 577px)");
        if (mq.matches) {
            setInterval(function() {
                $('.scan').css('transition', 'all 1s linear');
                $('.scan').css('top', '0px');

            }, 1000);

            setInterval(function() {

                $('.scan').css('top', '350px');
            }, 3000);

        }

        var mq = window.matchMedia("(max-width: 576px)");
        if (mq.matches) {

            setInterval(function() {
                $('.scan').css('transition', 'all 1s linear');
                $('.scan').css('top', '0px');

            }, 1000);


            setInterval(function() {

                $('.scan').css('top', '250px');
            }, 3000);


        }


        $('.navbar-nav .nav-link').click(function(){
            $('.navbar-nav .nav-link').removeClass('active');
            $(this).toggleClass('active');

           });



    </script>



    <script>
        $(document).ready(function() {
            // Initialize the slick slider
            $('.image-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                arrows: true,
                dots: false,
                speed: 300,
                centerPadding: '20px',
            });

            // Show the first text initially
            $('#slide1').addClass('active-text');

            // Change text and apply rotation on slide change
            $('.image-slider').on('afterChange', function(event, slick, currentSlide) {
                // Hide all text slides
                $('.slide-text').removeClass('active-text');
                // Show the text for the current slide
                $('#slide' + (currentSlide + 1)).addClass('active-text');

                // Reset rotation for all slides
                slick.$slides.css({
                    'transform': 'rotate(0deg)',
                    'transition': 'transform 0.5s ease'
                });

                // Get the indices for the previous and next slides
                const totalSlides = slick.$slides.length;
                const prevSlideIndex = (currentSlide > 0) ? currentSlide - 1 : totalSlides -
                    1; // Previous slide
                const nextSlideIndex = (currentSlide < totalSlides - 1) ? currentSlide + 1 :
                    0; // Next slide

                // Rotate the previous and next slides
                $(slick.$slides[prevSlideIndex]).css({
                    'transform': 'rotate(-17deg)'
                });
                $(slick.$slides[nextSlideIndex]).css({
                    'transform': 'rotate(17deg)'
                });
            });

            // Initial rotation for the center slide (the first active slide)
            const slickInstance = $('.image-slider').slick('getSlick');
            $('.image-slider').slick('slickGoTo', 0); // Go to the first slide initially

            // Apply initial rotation
            $('.image-slider').on('init', function(event, slick) {
                $(slick.$slides[0]).css('transform', 'rotate(0deg) scale(1.5)'); // Center slide
                $(slick.$slides[1]).css('transform', 'rotate(-17deg)'); // Previous slide
                $(slick.$slides[2]).css('transform', 'rotate(17deg)'); // Next slide
            });

            // Initialize the text and rotation
            $('.image-slider').on('init', function(event, slick) {
                $('#slide1').show(); // Show text for first slide
            });

            // Force rotate cloned slides on initialization
            slickInstance.$slides.each(function(index) {
                if ($(this).hasClass('slick-cloned')) {
                    const slideIndex = index % slickInstance.slideCount; // Get original index
                    if (slideIndex === 0) {
                        $(this).css('transform', 'rotate(-17deg)'); // Rotate first cloned slide
                    } else if (slideIndex === slickInstance.slideCount - 1) {
                        $(this).css('transform', 'rotate(17deg)'); // Rotate last cloned slide
                    }
                }
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
        var texts = $('.slidetext'); // Use slidetext class to update text

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
            // prevArrow: '<button> prev</button>',
            // nextArrow: '<button> next</button>',
            prevArrow: '<a href="#" class="pre-arrow"><img src="frontend/images/index/left.png"></a> ',
            nextArrow: '<a href="#" class="next-arrow"><img src="frontend/images/index/left.png" class="r-arrow"> </a> ',
            infinite: true,
            centerMode: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipe: true,
        });

        // Handle the beforeChange event to update the text
        rev.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            // Remove 'active' class from all texts and add it to the new one
            texts.removeClass('active');
            $(texts[nextSlide]).addClass('active');
        });
    </script>

@endsection
