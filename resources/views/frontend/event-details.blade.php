@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<style>
    .halfarrowt-img{
        display: none;
    }
    .blurhero-img{
        display: none;
    }
</style>
@endsection
@section('content')
    <section>
        <div style="position: relative">
            <img src="{{asset('frontend/images/index/smallarrow.svg')}}" alt="" srcset="" class="img-fluid smallarrow" >
            <img src="{{asset('frontend/images/index/index-new/leftarrow.svg')}}" alt="Full hero image of the website's main section" class="img-fluid full-img3">
            {{-- <img src="{{asset('frontend/images/index/index-new/blurhero.svg')}}" alt="Blurred background hero image" class="img-fluid blurhero-img-login"> --}}
            {{-- <img src="{{asset('frontend/images/index/index-new/plainplate2.svg')}}" alt="Plain plate design element for the hero section" class="img-fluid plainplate-img3"> --}}
            <img src="{{asset('frontend/images/index/index-new/smalllarrow.svg')}}" alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">
            
            <div class="container overflow-hide">
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main" >  
                    <div class="col-12" >
                        <div class="event-detailsbg-fouter">                        
                            <div class="event-detailsbg-souter">

                                <div class="event-detailsbg">
                                    <div class="row pb-5">
                                        <div class="col-12 col-lg-5 col-xl-4">
                                            <img src="{{asset('frontend/images/eventdetails/evtimg.png')}}" alt="" srcset="" class="img-fluid rounded-2 w-blg-100 pb-4 pb-lg-0">
                                        </div>
                                        <div class="col-12 col-lg-7 col-xl-8">
                                            <div class="d-flex align-items gap-4">
                                                <div class="lightcolor h4 mb-0">Event Name</div>
                                                <div class="dppink fw-600 h4 mb-0">Bussiness event</div>
                                            </div>

                                            <div class="d-flex align-items pt-3 gap-4" >
                                                <div class="lightcolor h4 mb-0">Event Date</div>
                                                <div class="dppink fw-600 h4 mb-0">10/09/2024 to 14/09/2024</div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/1.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-3 pb-3">
                                                    Bussiness event meet
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event">
                                                    View images
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/2.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-3 pb-3" >
                                                    Dance party
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event" >
                                                    View images
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/3.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-3 pb-3">
                                                    Award ceremony
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event">
                                                    View images
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/4.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-3 pb-3">
                                                    Funny moment 
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event">
                                                    View images
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/5.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-3 pb-3">
                                                    Games moment 
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event" >
                                                    View images
                                                </a>
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
@endsection 