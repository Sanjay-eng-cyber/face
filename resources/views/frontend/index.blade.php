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
                            <div class="h5 text-white mb-3">
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
                    <h5 class="mb-0 text-white mt-3">
                        Facial recognition system that works like a charm, allowing your friends and acquaintances to see
                        every photo that
                        they've made an appearance in!
                    </h5>
                </div>
                <div class="col-6">
                    <h1 class="text-white" style="font-size: 36px">How Kwikpic Works?</h1>
                    <h5 class="text-white mb-3">let your clients discover their images within seconds</h5>
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
                        Photos To Your Clients</div>
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

        {{-- <div style="position:relative">
            <img src="{{ asset('frontend/images/index/robothand.svg') }}" alt="" srcset=""
                class="img-fluid"
                style="
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
    top: -146px;
    border-radius: 24px 0px 0px 15px;
                                                ">

<div style="position:relative">
    <img src="{{ asset('frontend/images/index/robothand.svg') }}" alt="" srcset=""
        class="img-fluid"
        style="
            position: absolute;
right: -140px;
top: -139px;
width: 246px;
z-index: 999;">
</div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Intelligent Statistics
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="text-white">
                                                Intelligent statistics often refer to the application of advanced
                                                statistical methods and data analytics to derive meaningful insights from
                                                data. Here are some key concepts and techniques,
                                                Descriptive Statistics: Summarizes data using measures like mean, median,
                                                mode, variance, and standard deviation.

                                                Inferential Statistics: Allows for making predictions or inferences about a
                                                population based on a sample, using techniques like hypothesis testing and
                                                confidence intervals.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Custom web App
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="text-white">
                                                Creating a custom web app involves several key steps, from initial planning
                                                to deployment. Here’s a general overview of the process.
                                                Identify the Problem: What problem does your web app solve?
                                                Target Audience: Who will use it? Understand their needs and preferences.
                                                Goals: What do you want to achieve with this web app? Define success
                                                metrics.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingfour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsefour"
                                            aria-expanded="false" aria-controls="collapsefour">
                                            Safe, Secure & Private
                                        </button>
                                    </h2>
                                    <div id="collapsefour" class="accordion-collapse collapse"
                                        aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="text-white">
                                                Ensuring that a web app is safe, secure, and private involves implementing
                                                best practices at every stage of development. Here are key considerations,
                                                Code Security. Regularly review and audit your code for vulnerabilities. Use
                                                tools like static analysis to identify potential security flaws.
                                                Dependency Management: Keep libraries and frameworks up-to-date. Use tools
                                                like npm audit or Snyk to check for vulnerabilities in third-party packages.
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
