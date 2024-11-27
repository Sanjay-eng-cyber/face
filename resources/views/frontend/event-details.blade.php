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
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main-basic-details" >  
                    <div class="col-12" >
                        <div class="event-detailsbg-fouter">                        
                            <div class="event-detailsbg-souter">

                                <div class="event-detailsbg">

                                    <div class="event-detailsbg-fouter-mbbg">
                                        <div class="event-detailsbg-souter-mbbg">
                                            <div class="event-detailsbg-mbbg">
                                                <div class="row pb-4 pb-sm-5">
                                                    <div class="col-12 col-lg-5 col-xl-4">
                                                        <img src="{{asset('frontend/images/eventdetails/evtimg.png')}}" alt="" srcset="" class="img-fluid rounded-2 w-blg-100 pb-4 pb-lg-0">
                                                    </div>
                                                    <div class="col-12 col-lg-7 col-xl-8">
                                                        <div class="d-flex flex-column flex-sm-row gap-2 align-items gap-sm-4">
                                                            <div class="lightcolor h4 mb-0 bd-peventname">Event Name</div>
                                                            <div class="dppink fw-600 h4 mb-0 bd-be-page">Bussiness event</div>
                                                        </div>

                                                        <div class="d-flex flex-column flex-sm-row gap-2 align-items gap-sm-4 pt-3 pt-sm-2" >
                                                            <div class="lightcolor h4 mb-0 bd-sm-eventdate">Event Date</div>
                                                            <div class="dppink fw-600 h4 mb-0 bd-sm-actualdate">10/09/2024 to 14/09/2024</div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row  row-cols-2 row-cols-lg-3 row-cols-xl-4 bd-mtctpage">
                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/1.png')}}" alt="" srcset="" class="img-fluid bdp-img-height rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-2 pb-2 pt-sm-3 pb-sm-3 bd-card-heading">
                                                    Bussiness event meet
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event">
                                                    View images
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/2.png')}}" alt="" srcset="" class="img-fluid bdp-img-height rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-2 pb-2 pt-sm-3 pb-sm-3 bd-card-heading">
                                                    Dance party
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event" >
                                                    View images
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/3.png')}}" alt="" srcset="" class="img-fluid  bdp-img-height rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-2 pb-2 pt-sm-3 pb-sm-3 bd-card-heading">
                                                    Award ceremony
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event">
                                                    View images
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/4.png')}}" alt="" srcset="" class="img-fluid bdp-img-height rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-2 pb-2 pt-sm-3 pb-sm-3 bd-card-heading">
                                                    Funny moment 
                                                </div>
                                                <a href="http://" class="btn btn-login btn-event">
                                                    View images
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col pb-4">
                                            <div>
                                                <img src="{{asset('frontend/images/eventdetails/5.png')}}" alt="" srcset="" class="img-fluid bdp-img-height rounded-3">
                                                <div class="text-white h5 mb-0 fw-400 pt-2 pb-2 pt-sm-3 pb-sm-3 bd-card-heading">
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