@extends('frontend.layouts.app')
@section('title')

@section('content')

    <section>
       <div style="position: relative">
            <img src="{{asset('frontend/images/index/herobottommirror.svg')}}" alt="" srcset="" class="img-fluid" style="
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
                            <button type="button" class="btn btn-success " style="padding:10px 44px;font-size:24px">Get Started</button>

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="heroslider text-white" >
                                <div><img src="{{asset('frontend/images/index/1.png')}}" alt="" srcset="" class="img-fluid"></div>
                                <div><img src="{{asset('frontend/images/index/2.png')}}" alt="" srcset="" class="img-fluid"></div>
                                <div><img src="{{asset('frontend/images/index/1.png')}}" alt="" srcset="" class="img-fluid"></div>
                                <div><img src="{{asset('frontend/images/index/3.png')}}" alt="" srcset="" class="img-fluid"></div>
                        
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

       </div>

       <div style="padding-top:100px;padding-bottom:100px ">
            <div class="index-slogn" style=";display:flex;align-items: center;position:relative;min-height:131px;background:linear-gradient(90deg, #082399 0%, #030C33 100%);">
                <div class="container">
                    <h2 class="mb-0 text-white text-center">let your clients discover their images within seconds</h2>
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
  responsive: [
    {
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
