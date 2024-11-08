@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<style>
    footer{
      margin-top: 80px
    }
    .custom-ctnrfluid {
      /* background-image: unset;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      backdrop-filter: unset;
      display: flex;
      align-items: center;
      min-height: 106px;
      margin-top: 14px; */
      /* position: fixed;
      width: 98%;
      left: 50%;
      transform: translate(-50%); */
    }
    .halfarrowt-img{
      display: none;
    } 
    .blurhero-img {
            display: none;
        }
</style>
@endsection
@section('content')
    <section>
        <div class="position-relative">

           
            {{-- <img src="{{ asset('frontend/images/index/index-new/blurhero.svg') }}" alt="Blurred background hero image"
                class="img-fluid blurhero-bdptwo" style="backdrop-filter: blur(30px);"> --}}
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img-new">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2-new">
            <img src="{{asset('frontend/images/gallery/bigarrow.svg')}}" alt="" srcset="" class="img-fluid bigarrow-img" style="z-index: -99">
            
            <div class="container-fluid ">
                <div class="basic-details-trbg">
                    <div class="container overflow-hide" style="">
                    <div class="row  pt-35px">
                    {{-- <div class="col-6 col-xl-6 col-xxl-6">
                        
                                
                            <div class="basic-event-one-main" >
                                <div class="basic-event-one-main-insider" >
                                    <div>
                                        <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}" alt="" class="img-fluid ex-one-img" >
                                    </div>
                                    <div>
                                        <div class="eventanddatespit ">
                                            <div class="h5 fw-600 mb-0 text-white">Business event</div>
                                            <div class="text-white fw-300 fs-14" >10/09/2024 to 14/09/2024</div>
                                        </div>
                                        <div class="text-white pt-3 fs-14" >
                                            Picscan is the world's only end-to-end AI-powered image post-production solution.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        

                    </div> --}}
                    <div class="col-12">
                            <div class="" style="
                               background-color: #000000;
                               border: 1px solid #FE3B96;
                               padding: 13px 8px;
                               border-radius: 12px;
                               display: grid;
                               grid-template-columns: 49.4% 1% 49.4%;
                               grid-gap: 1px;
                                ">
                                <div class="basic-event-one-main" style="height:100%;">
                                    <div class="basic-event-one-main-insider" >
                                        <div>
                                            <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}" alt="" class="img-fluid ex-one-img" >
                                        </div>
                                        <div>
                                            <div class="eventanddatespit ">
                                                <div class="h5 fw-600 mb-0 text-white">Business event</div>
                                                <div class="text-white fw-300 fs-14" >10/09/2024 to 14/09/2024</div>
                                            </div>
                                            <div class="text-white pt-3 fs-14" >
                                                Picscan is the world's only end-to-end AI-powered image post-production solution.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div style="width: 1px; background-color:#FF3895; height: auto; align-self: stretch;"></div>
                            
                                <div class="basic-event-one-main" style="height:100%;">
                                    <div class="basic-event-one-main-insider" >
                                        <div>
                                            <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}" alt="" class="img-fluid ex-one-img" >
                                        </div>
                                        <div>
                                            <div class="eventanddatespit ">
                                                <div class="h5 fw-600 mb-0 text-white">Business event</div>
                                                <div class="text-white fw-300 fs-14" >10/09/2024 to 14/09/2024</div>
                                            </div>
                                            <div class="text-white pt-3 fs-14" >
                                                Picscan is the world's only end-to-end AI-powered image post-production solution.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    
                    </div>

                    <div class="row pt-5 pb-4">
                        <div class="fw-600 h4 mb-0 text-white text-center">Matched photos </div>

                    </div>

                    <div class="row row-cols-4">
                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>


                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>
                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>
                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>


                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                        </div>

                        <div class="col pb-4">
                            <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
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
