@extends('frontend.layouts.app')
@section('title')

@section('content')

    <section>
        <div class="container">
            <div class="row" style="    display: flex;
                        align-items: center;
                        justify-content: center;">
                <div class="col-10">
                    <div class="row">
                        <div class="col-12 py-5">
                           
                           <div class=" py-5 position-relative isolation" style="    display: flex;align-items: center;justify-content: center;">

                            <div class="fw-14 fw-500 animate__animated animate__fadeInLeft delayed-animation-lefttop" style="position: absolute;background: white;padding: 15px 23px;border-radius: 30px;left: 0px;top: 28px;">
                                Share Party Album With Friends 
                            </div>

                            
                            <div class="fw-14 fw-500 animate__animated animate__fadeInLeft delayed-animationlefttbottom" style="position: absolute;background: white;padding: 15px 23px;border-radius: 30px;left: 149px;bottom: 13px;">
                                Share Memories Of Friends 
                            </div>


                            
                            <div class="fw-14 fw-500 animate__animated animate__fadeInRight delayed-animation-righttop " style="position: absolute;background: white;padding: 15px 23px;border-radius: 30px;right: 0px;top: 16px;">
                              We Have Found Common Images With People 
                            </div>

                            <div class="animate__animated animate__fadeInRight delayed-animationrightbottom" style="position: absolute;background: white;padding: 15px 23px;border-radius: 30px;bottom: 41px;right: 0px;">
                             We Found 6 New Photos! 
                            </div>

                            
                            <div class="first-glow-main" style="position: relative;left: 79px;z-index: -1;">
                                <img src="{{asset('frontend/images/index/one.png')}}" alt="" class="img-fluid first-glow" >
                            </div>

                            <div class="grow-image-main">
                                <img src="{{asset('frontend/images/index/two.png')}}" alt="" class="img-fluid grow-image-middle">
                            </div>
                                

                            <div class="third-glow-main" style="position: relative;z-index: -1;right: 79px;">
                                <img src="{{asset('frontend/images/index/three.png')}}" alt="" class="img-fluid third-glow" > 
                            </div>
                           

                           </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                      <div style="display: flex;
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

                         <button type="button" class="btn btn-warning">button</button>



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
