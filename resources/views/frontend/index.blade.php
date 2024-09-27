@extends('frontend.layouts.app')
@section('title')

@section('content')

    <section>
        <div class="container" style="overflow: hidden">
            <div class="row"
                style="    display: flex;
                        align-items: center;
                        justify-content: center;">
                <div class="col-10">
                    <div class="row">
                        <div class="col-12 py-5">

                            <div class=" py-5 position-relative isolation"
                                style="    display: flex;align-items: center;justify-content: center;">

                                <div class="fw-14 fw-500 animate__animated animate__fadeInLeft delayed-animation-lefttop"
                                    style="position: absolute;background: white;padding: 15px 23px;border-radius: 30px;left: 0px;top: 28px;">
                                    Share Party Album With Friends
                                </div>


                                <div class="fw-14 fw-500 animate__animated animate__fadeInLeft delayed-animationlefttbottom"
                                    style="position: absolute;background: white;padding: 15px 23px;border-radius: 30px;left: 149px;bottom: 13px;">
                                    Share Memories Of Friends
                                </div>



                                <div class="fw-14 fw-500 animate__animated animate__fadeInRight delayed-animation-righttop "
                                    style="position: absolute;background: white;padding: 15px 23px;border-radius: 30px;right: 0px;top: 16px;">
                                    We Have Found Common Images With People
                                </div>

                                <div class="animate__animated animate__fadeInRight delayed-animationrightbottom"
                                    style="position: absolute;background: white;padding: 15px 23px;border-radius: 30px;bottom: 41px;right: 0px;">
                                    We Found 6 New Photos!
                                </div>


                                <div class="first-glow-main" style="position: relative;left: 79px;z-index: -1;">
                                    <img src="{{ asset('frontend/images/index/one.png') }}" alt=""
                                        class="img-fluid first-glow">
                                </div>

                                <div class="grow-image-main">
                                    <img src="{{ asset('frontend/images/index/two.png') }}" alt=""
                                        class="img-fluid grow-image-middle">
                                </div>


                                <div class="third-glow-main" style="position: relative;z-index: -1;right: 79px;">
                                    <img src="{{ asset('frontend/images/index/three.png') }}" alt=""
                                        class="img-fluid third-glow">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row position-relative">
                <div class="col-12">

                    <div
                        style="display: flex;
                            justify-content: space-between;
                            align-items: center;">
                        <div>
                            <div class="h1 text-white">
                                Share Images Using <span class="granny-lipgloss">Face Recognition</span>
                            </div>
                            <div class="h5 text-white">
                                wow your clients and get <span class="granny-lipgloss">8X</span> more visibility
                            </div>
                        </div>

                        <button type="button h4 mb-0" class="btn btn-warning" style="padding: 19px 45px">
                            Get Started
                        </button>



                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row gx-5">
                <div class="col-6">
                    <img src="{{ asset('frontend/images/index/clientmain.png') }}" alt="" srcset=""
                        class="img-fluid w-100">
                    <h5 class="mb-0 text-white">
                        Facial recognition system that works like a charm, allowing your friends and acquaintances to see
                        every photo that
                        they've made an appearance in!
                    </h5>
                </div>
                <div class="col-6">
                    <h1 class="text-white" style="font-size: 36px">How Kwikpic Works?</h1>
                    <h5 class="text-white">let your clients discover their images within seconds</h5>
                    <div
                        style="padding-bottom:30px;display: grid;grid-template-columns: 110px auto; grid-gap: 20px;align-items: center;">
                        <div
                            style="    max-width: 110px; height: 110px;border: 1px solid #7C003E;box-shadow: 0px 4px 4px 20px #000000CC;display: flex;  align-items: center;justify-content: center; border-radius:15px;">
                            <img src="{{ asset('frontend/images/index/chain.svg') }}" alt="" class="img-fluid">
                        </div>

                        <h4 class="text-white kanit-thin">
                            Share event link with attendees via email, QR code or WhatsApp
                        </h4>
                    </div>


                    <div
                        style="padding-bottom:30px;    display: grid;grid-template-columns: 110px auto; grid-gap: 20px;align-items: center;">
                        <div
                            style="    max-width: 110px; height: 110px;border: 1px solid #7C003E;box-shadow: 0px 4px 4px 20px #000000CC;display: flex;  align-items: center;justify-content: center; border-radius:15px;">
                            <img src="{{ asset('frontend/images/index/camera.svg') }}" alt="" class="img-fluid">
                        </div>

                        <h4 class="text-white kanit-thin">
                            Attendees go to the link and take a selfie
                        </h4>
                    </div>


                    <div
                        style="padding-bottom:30px; display: grid;grid-template-columns: 110px auto; grid-gap: 20px;align-items: center;">
                        <div
                            style="    max-width: 110px; height: 110px;border: 1px solid #7C003E;box-shadow: 0px 4px 4px 20px #000000CC;display: flex;  align-items: center;justify-content: center; border-radius:15px;">
                            <img src="{{ asset('frontend/images/index/faceai.svg') }}" alt="" class="img-fluid">
                        </div>

                        <h4 class="text-white kanit-thin">
                            Our AI recognizes attendees with 99% accuracy and show them all their images
                        </h4>
                    </div>


                    <div
                        style="padding-bottom:30px;display: grid;grid-template-columns: 110px auto; grid-gap: 20px;align-items: center;">
                        <div
                            style="    max-width: 110px; height: 110px;border: 1px solid #7C003E;box-shadow: 0px 4px 4px 20px #000000CC;display: flex;  align-items: center;justify-content: center; border-radius:15px;">
                            <img src="{{ asset('frontend/images/index/ciframe.svg') }}" alt="" class="img-fluid">
                        </div>

                        <h4 class="text-white kanit-thin">
                            Images can be printed or downloaded right from mobile
                        </h4>
                    </div>



                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="text-white fw-500" style="font-size: 32px">For Our Professionals</div>
                    <div class="text-white" style="font-size: 36px"> <span class="granny-lipgloss">Smartly</span> Deliver
                        Photos to your Clients</div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div
                            style="
                        border-radius:45px;
                        padding:1px;
                        background: linear-gradient(101.22deg, #FFFFFF 38.55%, rgba(13, 11, 12, 0) 100.18%);

                                        ">
                            <div
                                style="background-color: #040404;
                            border-radius:45px;padding:68px 34px;
                            display: grid;
                            grid-template-columns: 64% 34%;
                            grid-gap: 2%;
                            ">
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
                                <div style="position: relative">
                                    <img src="{{ asset('frontend/images/index/flowline.svg') }}" alt=""
                                        srcset="" class="img-fluid"
                                        style="position: absolute;
                                        z-index: 1;
                                        right: -30px;
                                        top: -65px;">
                                    <img src="{{ asset('frontend/images/index/mobilesize.png') }}" alt=""
                                        srcset="" class="img-fluid" style="position: absolute;bottom:-67px">
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
                                                        alt="" srcset="" class="img-fluid"
                                                        style="
                                              position: absolute;
    z-index: 99;
    transform: rotate(10deg);
    left: 31px;
    top: -126px;
    border-radius: 24px 0px 0px 15px;
                                                ">

                                                    <div style="position:relative">
                                                        <img src="{{ asset('frontend/images/index/robothand.svg') }}"
                                                            alt="" srcset="" class="img-fluid robot"
                                                            style="
            position: absolute;
right: -137px;
top: -119px;
width: 150px;
z-index: 999;">
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
	<a class="prev" href="#"><img src="{{asset('frontend/images/index/left.png')}}" alt=""></a>
	<a class="next" href="#"><img src="{{asset('frontend/images/index/left.png')}}" alt=""></a>
	<div class="slider">
		<div class="slide">
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
            </section>

		</div>
		<div class="slide">
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
            </section>

		</div>
		<div class="slide">
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

    <section class="my-5 position-relative pb-5 uppersection">



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
                <div class="col-lg-4">
                    <h3 class="section-title"><span class="text-white">Included in every</span><br>
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

$('.prev').click(function(){
    slider.slick('slickPrev');
    return false;
});

$('.next').click(function(){
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
