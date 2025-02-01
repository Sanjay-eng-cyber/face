@extends('frontend.layouts.app')
@section('title')
@section('cdn')
    <style>
        .custom-ctnrfluid {
            background-image: unset;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            backdrop-filter: unset;
            display: flex;
            align-items: center;
            min-height: 106px;
            margin-top: 0px;
            /* position: fixed;
        width: 98%;
        left: 50%;
        transform: translate(-50%); */
        }

        .blurhero-img {
            display: none !important;
        }

        .custom-ctnrfluid.sticky-nav {
            background-image: url(/frontend/images/index/navbg.svg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(29px);
            display: flex;
            align-items: center;
            min-height: 106px;
            margin-top: 0px;
            position: fixed;
            width: 98%;
            left: 50%;
            border-radius: 34px;
            transform: translate(-50%);
        }

        @media (max-width:992px) {
            .custom-ctnrfluid.sticky-nav {
                min-height: unset;
            }
            .custom-ctnrfluid{
                min-height:unset;
            }
        }

        @media (max-width: 576px) {

            .custom-ctnrfluid.sticky-nav {
                min-height: unset;
                background-image: url(/frontend/images/index/index-new/blurhero.svg);
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                border-radius: 14px;
            }



            .navsmimg {
                display: block;
            }

            .navsmimg {
                top: 7px;
            }


            .custom-ctnrfluid.sticky-nav {
                margin-top: 7px;
            }

        }
    </style>
@endsection
@section('content')
    <section>
        <div style="position: relative">

            <img src="{{ asset('frontend/images/index/index-new/leftarrow.svg') }}"
                alt="Full hero image of the website's main section" class="img-fluid full-img loginfullimg">

            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">

            <div class="blurhero-img-login-new">
                <div class="container overflow-hide">
                    <div class="row d-flex align-items-center justify-content-center  hero-main-login gx-5">
                        <div class="col-12 col-md-6">
                            <div class="lightcolor fw-600 text-center pt-35 fs-30 fs-20 pb-3 pb-md-0">

                                <span class="darkpink">Picscan</span>
                                Is The World's Only End To End Al Powered Image Post Production Solution
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div>
                                <form action="{{ route('frontend.login.submit') }}" method="post" class="login-form">
                                    @csrf
                                    <div class="dblwhitecolor h4 mb-0 fw-600 pb-2">Sign In</div>
                                    <div class="d-flex  align-items-center gap-2 pb-4">
                                        <div class="tplwhitecolor fw-600">New here?</div>
                                        <a href="#" class="ltdrkblue fw-600 text-decoration-none">Create An
                                            Account</a>
                                    </div>
                                    <div class="pb-3">
                                        <label for="email" class="fw-600 frtwhitcolor pb-2">Email ID*</label>
                                        <input type="email" name="email" minlength="8" maxlength="30" placeholder="E-mail" required
                                            class="form-control sin-input">
                                    </div>
                                    {{-- @if ($errors->has('email'))
                                        <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('email') }}
                                        </div>
                                    @endif --}}
                                    <div class="pb-2">
                                        <label for="password" class="fw-600 frtwhitcolor pb-2">Password*</label>
                                        <input type="password" name="password" minlength="8" maxlength="16" required
                                            class="form-control sin-input" placeholder="Password">

                                    </div>
                                    {{-- @if ($errors->has('password'))
                                        <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('password') }}
                                        </div>
                                    @endif --}}

                                    {{-- @if ($errors->has('credentials'))
                                        <div class="text-danger text-left mx-3" role="alert">
                                            {{ $errors->first('credentials') }}</div>
                                    @endif
                                    @if (session('status'))
                                        <div class="text-success">
                                            <li> {{ session('status') }} </li>
                                        </div>
                                    @endif --}}
                                    <div class="d-flex  justify-content-end">
                                        <a href="{{ route('frontend.forgotPassword.index') }}"
                                            class="text-white fw-600 text-decoration-none">Forgot Password</a>
                                    </div>
                                    <div>
                                        {{-- <a href="http://" class="btn btn-login withsignin" style="font-size: 20px">
                                            Sign In
                                        </a> --}}
                                        <button type="submit" class="btn btn-login withsignin withsignin-loginpg">
                                            Sign In
                                        </button>
                                    </div>

                                    <a href="{{ url('login/google') }}"
                                        class="d-flex align-items-center text-decoration-none"
                                        style="gap: 13px;padding-top:12px">
                                        <img src="{{ asset('frontend/images/index/index-new/swg.svg') }}" alt=""
                                            srcset="">

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
        </div>
    </section>
@endsection
@section('js')
@endsection
