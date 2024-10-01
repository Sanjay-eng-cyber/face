@extends('frontend.layouts.app')
@section('title')

@section('content')

    <section>
        <div class="container" style="overflow: hidden">
            <div class="row d-flex align-items-center justify-content-center hero-mh">
                <div class="col-12 col-lg-11 col-xxl-10">
                    <div class="row">
                        <div class="col-12  py-2 py-md-4 py-lg-5">

                            <div class=" py-5 position-relative isolation d-flex align-items-center justify-content-center">

                                <div
                                    class="fw-14 fw-500 animate__animated animate__fadeInLeft delayed-animation-lefttop tape-line">
                                    Share Party Album With Friends
                                </div>


                                <div
                                    class="fw-14 fw-500 animate__animated animate__fadeInLeft delayed-animationlefttbottom tape-line-eno">
                                    Share Memories Of Friends
                                </div>



                                <div
                                    class="fw-14 fw-500 animate__animated animate__fadeInRight delayed-animation-righttop tape-line-owt">
                                    We Have Found Common Images With People
                                </div>

                                <div
                                    class="animate__animated animate__fadeInRight delayed-animationrightbottom tape-line-eerht">
                                    We Found 6 New Photos!
                                </div>


                                <div class="first-glow-main">
                                    <img src="{{ asset('frontend/images/index/one.png') }}" alt=""
                                        class="img-fluid first-glow">
                                </div>

                                <div class="grow-image-main">
                                    <img src="{{ asset('frontend/images/index/two.png') }}" alt=""
                                        class="img-fluid grow-image-middle">
                                </div>


                                <div class="third-glow-main">
                                    <img src="{{ asset('frontend/images/index/three.png') }}" alt=""
                                        class="img-fluid third-glow">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row position-relative share-text">
                <div class="col-12">

                    <div class="get-section align-items-center d-md-flex">
                        <div>
                            <div class="h1 text-white">
                                Share Images Using <span class="granny-lipgloss">Face Recognition</span>
                            </div>
                            <div class="h4 text-white">
                                wow your clients and get <span class="granny-lipgloss">8X</span> more visibility
                            </div>
                        </div>





                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row gx-5">
                <div class="col-12 col-lg-6 position-relative anim-bg">
                    <img src="{{ asset('frontend/images/index/clientmain.png') }}" alt="" srcset=""
                        class="img-fluid w-100" style="z-index:0">
                    <span class="px-2 "> <img src="{{ asset('frontend/images/index/scan.png') }}" alt=""
                            srcset="" class=" scan up-down"></span>
                    <h5 class="mb-0 text-white mt-lg-1 mt-0 pt-4 pb-4 pt-lg-0 pb-lg-0">
                        Facial recognition system that works like a charm, allowing your friends and acquaintances to see
                        every photo that
                        they've made an appearance in!
                    </h5>
                </div>
                <div class="col-12 col-lg-6">
                    <h1 class="text-white mb-0 kpichead">How Kwikpic Works?</h1>
                    <h4 class="text-white mb-0 kpik-subhead">let your clients discover their images within seconds</h4>
                    <div class="scn-sharemain">
                        <div class="share-box">
                            <img src="{{ asset('frontend/images/index/chain.svg') }}" alt="" class="img-fluid">
                        </div>

                        <h4 class="text-white kanit-thin fw-400">
                            Share event link with attendees via email, QR code or WhatsApp
                        </h4>
                    </div>


                    <div class="scn-sharemain">
                        <div class="share-box">
                            <img src="{{ asset('frontend/images/index/camera.svg') }}" alt="" class="img-fluid">
                        </div>

                        <h4 class="text-white kanit-thin fw-400">
                            Attendees go to the link and take a selfie
                        </h4>
                    </div>


                    <div class="scn-sharemain">
                        <div class="share-box">
                            <img src="{{ asset('frontend/images/index/faceai.svg') }}" alt="" class="img-fluid">
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
        </div>


        <section class=" mb-5 pb-5">
            <img src="{{ asset('frontend/images/index/kwik-bg.png') }}" alt="" class="kwik-bg">
        </section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="text-white fw-500" style="font-size: 32px">For Our Professionals</div>
                    <div class="text-white" style="font-size: 36px;padding-bottom:60px"> <span class="granny-lipgloss">Smartly</span> Deliver
                        Photos to your Clients</div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="our-profession-sctn">
                            <div class="our-profession-sub">
                                <div>
                                    <h4 class="text-white mb-0">
                                        Clicking photos is one half of the task. The second half is delivering them to your
                                        clients.
                                    </h4>
                                    <h4 class="text-white mb-0 pt-4">
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
                                        srcset="" class="img-fluid mobilesize" >
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="position:relative">
            {{-- <img src="{{asset('frontend/images/index/robothand.svg')}}" alt="" srcset="" class="img-fluid" style="
                    position: absolute;
    right: 0px;
    top: 109px;
    width: 246px;
    z-index: 999;

                "> --}}

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="fw-500 mb-0 text-center text-white py-5">Features you don’t want to miss</h2>
                        <div class="custome-accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header " id="headingOne">
                                        <button class="accordion-button display-4" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Blazing Fast AI Recognition
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <div
                                                style="
                                        display: grid;
                                    grid-template-columns: 65% 31%;
                                    grid-gap: 4%;">
                                                <div class="text-white">
                                                    Let your clients discover their pictures in a matter of seconds with our
                                                    cutting edge AI. 99.4 % accurate, 100% awesome.
                                                </div>
                                                <div class="position-relative">
                                                    <img src="{{ asset('frontend/images/index/blazingimg.png') }}"
                                                        alt="" srcset="" class="img-fluid accordion-img">

                                                    <div style="position:relative">
                                                        <img src="{{ asset('frontend/images/index/robothand.svg') }}"
                                                            alt="" srcset=""
                                                            class="img-fluid robot accordion-img-robot">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Intelligent Statistics
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="text-white">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam nostrum quis
                                            suscipit cumque non. At facilis dicta rem iste enim pariatur est ratione itaque
                                            modi consequatur expedita cumque, aperiam repudiandae? Sit, ut amet minima
                                            tempore sunt fuga ad modi molestias, porro facilis sapiente a, atque minus
                                            culpa. Eos architecto quas nulla molestiae labore voluptatum quia numquam
                                            consequuntur eligendi deleniti suscipit assumenda ut excepturi dolores similique
                                            repellendus sint illum id, odit quis. Quod ullam minima dolore expedita aut
                                            ducimus similique vel, iusto assumenda nisi corrupti inventore dolorum soluta
                                            libero a, sapiente beatae velit! Ipsum alias labore dolorum sed doloribus
                                            delectus necessitatibus.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Custom web App
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="text-white">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque iure ullam
                                            labore error animi, quasi soluta nulla ipsum, eos dolor obcaecati possimus!
                                            Voluptatem eligendi, repudiandae accusamus nisi molestias nemo accusantium culpa
                                            atque dolore alias nihil fuga, vero vitae porro nulla sit. Sunt nesciunt,
                                            eveniet vel magni id hic illum maxime dolores praesentium harum reprehenderit et
                                            dignissimos alias dolorum tempore quam placeat aspernatur numquam blanditiis
                                            corporis! Debitis fugiat laboriosam rerum, veritatis consequuntur voluptas omnis
                                            asperiores quidem ea deserunt consectetur ratione corrupti exercitationem magni
                                            aperiam laudantium obcaecati id vel saepe quae? Magnam repellendus reiciendis
                                            enim aperiam et dignissimos quis quasi labore voluptatum.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Safe, Secure & Private
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="text-white">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui impedit tenetur at
                                            fuga rerum? Tenetur iste magnam aliquid enim laborum vero natus reiciendis at
                                            inventore ducimus corporis quod repudiandae officia vel culpa quis, amet illum,
                                            esse iure dolorum debitis officiis nulla accusantium! Molestias consequatur
                                            repudiandae corrupti, nisi asperiores doloremque mollitia corporis modi et iure
                                            magni aliquam nobis quidem exercitationem, excepturi veritatis velit, eveniet
                                            dolorem ad non labore obcaecati illum assumenda saepe. Alias voluptas ducimus
                                            sapiente perferendis necessitatibus molestias ab non quisquam placeat
                                            consectetur mollitia ut sint veritatis dolor, dolorum fuga aut accusantium
                                            itaque recusandae maiores repellat vero? Rerum, magnam maiores?
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


    <div class="slider-outer">
        {{-- <div class=" d-none">
    <a class="prev" href="#"><img src="{{asset('frontend/images/index/left.png')}}" alt=""></a>
	<a class="next" href="#"><img src="{{asset('frontend/images/index/left.png')}}" alt=""></a>
</div> --}}
        <div class=" d-bock position-relative justify-content-space-between pt-5 index100 ">
            <a class="prev-mobile" href="#"><img src="{{ asset('frontend/images/index/left.png') }}"
                    alt=""></a>
            <a class="next-mobile" href="#"><img src="{{ asset('frontend/images/index/left.png') }}"
                    alt=""></a>
        </div>
        <div class="slider px-1">
            <div class="slide">
                <section class="slider-sec">
                    <div class="container ">
                        <div class="row ">
                            <div class="bg-slider">
                                <div class="img-group d-flex position-relative">
                                    <img src="{{ asset('frontend/images/index/sl-3.png') }}" alt=""
                                        class="f-img">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt=""
                                        class="s-img">
                                    <img src="{{ asset('frontend/images/index/sl-2.png') }}" alt=""
                                        class="t-img">
                                </div>
                                <div class="textgroup">
                                    <h4 class="text-pink text-center slider-title">Market Smartly <span
                                            class="text-white">At Every Step</span></h4>
                                    <p class="slider-txt">Collect invaluable client data with their consent. Use it to
                                        reach just the right audience at fraction of a price compared to instagram
                                        marketing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="slide">
                <section class="slider-sec">
                    <div class="container ">
                        <div class="row ">
                            <div class="bg-slider">
                                <div class="img-group d-flex position-relative">
                                    <img src="{{ asset('frontend/images/index/sl-3.png') }}" alt=""
                                        class="f-img">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt=""
                                        class="s-img">
                                    <img src="{{ asset('frontend/images/index/sl-2.png') }}" alt=""
                                        class="t-img">
                                </div>
                                <div class="textgroup">
                                    <h4 class="text-pink text-center slider-title">Market Smartly <span
                                            class="text-white">At Every Step</span></h4>
                                    <p class="slider-txt">Collect invaluable client data with their consent. Use it to
                                        reach just the right audience at fraction of a price compared to instagram
                                        marketing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="slide">
                <section class="slider-sec">
                    <div class="container ">
                        <div class="row ">
                            <div class="bg-slider">
                                <div class="img-group d-flex position-relative">
                                    <img src="{{ asset('frontend/images/index/sl-3.png') }}" alt=""
                                        class="f-img">
                                    <img src="{{ asset('frontend/images/index/sl-1.png') }}" alt=""
                                        class="s-img">
                                    <img src="{{ asset('frontend/images/index/sl-2.png') }}" alt=""
                                        class="t-img">
                                </div>
                                <div class="textgroup">
                                    <h4 class="text-pink text-center slider-title">Market Smartly <span
                                            class="text-white">At Every Step</span></h4>
                                    <p class="slider-txt">Collect invaluable client data with their consent. Use it to
                                        reach just the right audience at fraction of a price compared to instagram
                                        marketing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

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

    <section class="mb-md-5 position-relative pb-md-5 uppersection">



        <div class="container">

            <div class="curve">
                <div class="text-center mb-4">
                    <p class="algoshare">Algoshare offers tiered pricing plans with options for free basic access, mid-tier
                        advanced features, and a premium plan with full access to all tools and priority support.</p>
                </div>
                <div class="row d-flex gap-4 justify-content-center mt-5 px-md-0 px-2">

                    <div class="card-price" style="border:1px solid White">
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

                    <div class="card-price" style="border:1px solid #FD692A">
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


                    <div class="card-price">
                        <h5>Pricing plans for algoshare</h5>

                        <div class="mt-5  pt-5">
                            <p class="points">Storage</p>
                            <p class="points">Max Image Size</p>
                            <p class="points">Face Searches</p>
                            <p class="points">Pre Registrations</p>

                            <p class="points">Events</p>
                            <p class="points">Storage</p>
                            <p class="points">Image Limit Per Sub Event</p>
                        </div>
                    </div>

                    <div class="card-price position-relative" style="border:1px solid #8E00CB">
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

                    <div class="card-price" style="border:1px solid #84FF89">
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

    <section class="mt-4">
        <div class="container">

            <div class="row py-4 d-flex align-items-center">
                <div class="col-lg-4 ">
                    <h3 class="section-title text-md-start text-center"><span class="text-white">Included in
                            every</span><br>
                        <span class="text-pink">algoshare plan</span>
                    </h3>
                </div>

                <div class="col-lg-8">
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
        var mq = window.matchMedia("(min-width: 1116px)");
        if (mq.matches) {

            $(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 400 && $(this).scrollTop() <= 1000) {
                        $('.scan').css('transition', 'all 1s linear');
                        $('.scan').css('top', '-200px');


                        setInterval(function() {
                            $('.scan').css('top', '300px');
                        }, 400);

                    }
                })
            });

        }
    </script>

    <script>
        var slider = $('.slider');

        $('.prev-mobile').click(function() {
            slider.slick('slickPrev');
            return false;
        });

        $('.next-mobile').click(function() {
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

@endsection
