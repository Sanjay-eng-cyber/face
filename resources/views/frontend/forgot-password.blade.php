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
            {{-- <img src="{{ asset('frontend/images/index/index-new/blurhero.svg') }}" alt="Blurred background hero image"
                class="img-fluid blurhero-img-login"> --}}
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2-frgtpasswd">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">

            <div class="blurhero-img-login-new">
                <div class="container overflow-hide">
                    <div class="row d-flex align-items-center justify-content-center hero-mh hero-main-frgtpw gx-5">
                        <div class="col-12 col-md-6">
                            <div class="lightcolor fw-600 text-center pt-35 fs-30 fs-20 pb-3 pb-md-0 frtg-text">

                                <span class="darkpink">Picscan</span>
                                Is The World's Only End To End Al Powered Image Post Production Solution
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div>
                                <form action="{{ route('frontend.password.email') }}" method="post" class="login-form">
                                    @csrf
                                    <div class="dblwhitecolor h4 mb-0 fw-600 pb-2">Reset Password</div>
                                    <div class="pb-3">
                                        <label for="email" class="fw-600 frtwhitcolor pb-2">Email ID*</label>
                                        <input type="email" name="email" minlength="8" maxlength="30" required
                                            class="form-control sin-input" placeholder="E-mail">
                                        @if ($errors->has('email'))
                                            <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                        @endif
                                        @if (session('status'))
                                            <div class="text-success">
                                                <li> {{ session('status') }} </li>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-login withsignin withsignin-fdtps-btn">
                                            Submit
                                        </button>
                                    </div>
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
