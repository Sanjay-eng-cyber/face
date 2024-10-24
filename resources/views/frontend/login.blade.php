@extends('frontend.layouts.app')
@section('title')
@section('content')
    <section>
        <div style="position: relative">
         
            <img src="{{asset('frontend/images/index/index-new/leftarrow.svg')}}" alt="Full hero image of the website's main section" class="img-fluid full-img loginfullimg">
            <img src="{{asset('frontend/images/index/index-new/blurhero.svg')}}" alt="Blurred background hero image" class="img-fluid blurhero-img-login">
            <img src="{{asset('frontend/images/index/index-new/plainplate2.svg')}}" alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2">
            <img src="{{asset('frontend/images/index/index-new/smalllarrow.svg')}}" alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">
            
            <div class="container overflow-hide">
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main gx-5" >
                    <div class="col-12 col-md-6">
                            <div class="lightcolor fw-600 text-center pt-35 fs-30 fs-20 pb-3 pb-md-0" >
                                
                                <span class="darkpink">Picscan</span>
                                Is The World's Only End To End Al Powered Image Post Production Solution
                            </div>
                    </div>
                    <div class="col-12 col-md-6">
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
                    </div>
                
                </div>
                  
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection