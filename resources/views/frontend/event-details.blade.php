@extends('frontend.layouts.app')
@section('title')
@section('content')
    <section>
        <div style="position: relative">
         
            <img src="{{asset('frontend/images/index/index-new/leftarrow.svg')}}" alt="Full hero image of the website's main section" class="img-fluid full-img3">
            <img src="{{asset('frontend/images/index/index-new/blurhero.svg')}}" alt="Blurred background hero image" class="img-fluid blurhero-img-login">
            <img src="{{asset('frontend/images/index/index-new/plainplate2.svg')}}" alt="Plain plate design element for the hero section" class="img-fluid plainplate-img3">
            <img src="{{asset('frontend/images/index/index-new/smalllarrow.svg')}}" alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">
            
            <div class="container overflow-hide">
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main" >
                    {{-- <div class="col-6">
                            <div class="lightcolor fw-600" style="font-size: 30px;padding:35px">
                                Picscan
                                Is The World's Only End To End Al Powered Image Post Production Solution
                            </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <form action="" method="post" class="login-form">
                                <div class="dblwhitecolor h4 mb-0 fw-600 pb-2">Sign In</div>
                                <div class="d-flex  align-items-center gap-2 pb-4">
                                    <div class="tplwhitecolor fw-600">New here?</div>
                                    <a href="#" class="ltdrkblue fw-600 text-decoration-none">Create An Account</a>
                                </div>
                                <div class="pb-3">
                                    <label for="email" class="fw-600 frtwhitcolor pb-2">Email ID*</label>
                                    <input type="email" class="form-control sin-input">
                                </div>
                                <div class="pb-2">
                                    <label for="email" class="fw-600 frtwhitcolor pb-2">Password*</label>
                                    <input type="email" class="form-control sin-input">
    
                                </div>
                                <div class="d-flex  justify-content-end">
                                    <a href="http://" class="text-white fw-600 text-decoration-none">Forgot Password</a>
                                </div>
                                <div>
                                    <a href="http://" class="btn btn-login withsignin" style="font-size: 20px">
                                        Sign In
                                    </a>
                                   
                                </div>

                                <a href="#" class="d-flex align-items-center text-decoration-none" style="gap: 13px;padding-top:12px">
                                    <img src="{{asset('frontend/images/index/index-new/swg.svg')}}" alt="" srcset="">
                                        
                                    <div class="text-white" style="font-size: 12px">    
                                        Sign up with Google
                                    </div>
                                </a>


                            </form>
                        </div>
                    </div> --}}
                    <div style="background:linear-gradient(148.82deg, #045959 9.59%, rgba(123, 69, 139, 0) 59.44%);padding:1px;border-radius:45px">
                        
                        <div style="background: #040404;border-radius:45px">
                            <div class="event-detailsbg">
                                <div class="row pb-5">
                                    <div class="col-4">
                                        <img src="{{asset('frontend/images/eventdetails/evtimg.png')}}" alt="" srcset="" class="img-fluid rounded-2">
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex align-items" style="gap: 20px">
                                            <div class="lightcolor h4 mb-0">Event Name</div>
                                            <div class="dppink fw-600 h4 mb-0">Bussiness event</div>
                                        </div>

                                        <div class="d-flex align-items pt-3" style="gap: 20px">
                                            <div class="lightcolor h4 mb-0">Event Date</div>
                                            <div class="dppink fw-600 h4 mb-0">10/09/2024 to 14/09/2024</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row row-cols-4">
                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/1.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                            <div class="text-white h5 mb-0 fw-400" style="padding-top:15px;padding-bottom:15px">
                                                Bussiness event meet
                                            </div>
                                            <a href="http://" class="btn btn-login" style="font-size: 14px;width:131px;font-weight:500">
                                                View images
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/2.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                            <div class="text-white h5 mb-0 fw-400" style="padding-top:15px;padding-bottom:15px">
                                                Dance party
                                            </div>
                                            <a href="http://" class="btn btn-login" style="font-size: 14px;width:131px;font-weight:500">
                                                View images
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/3.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                            <div class="text-white h5 mb-0 fw-400" style="padding-top:15px;padding-bottom:15px">
                                                Award ceremony
                                            </div>
                                            <a href="http://" class="btn btn-login" style="font-size: 14px;width:131px;font-weight:500">
                                                View images
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/4.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                            <div class="text-white h5 mb-0 fw-400" style="padding-top:15px;padding-bottom:15px">
                                                Funny moment 
                                            </div>
                                            <a href="http://" class="btn btn-login" style="font-size: 14px;width:131px;font-weight:500">
                                                View images
                                            </a>
                                        </div>
                                    </div>


                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/5.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                            <div class="text-white h5 mb-0 fw-400" style="padding-top:15px;padding-bottom:15px">
                                                Games moment 
                                            </div>
                                            <a href="http://" class="btn btn-login" style="font-size: 14px;width:131px;font-weight:500">
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
    </section>
@endsection
@section('js')
@endsection 