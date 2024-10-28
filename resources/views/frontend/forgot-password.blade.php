@extends('frontend.layouts.app')
@section('title')
@section('content')
    <section>
        <div style="position: relative">

            <img src="{{ asset('frontend/images/index/index-new/leftarrow.svg') }}"
                alt="Full hero image of the website's main section" class="img-fluid full-img loginfullimg">
            <img src="{{ asset('frontend/images/index/index-new/blurhero.svg') }}" alt="Blurred background hero image"
                class="img-fluid blurhero-img-login">
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">

            <div class="container overflow-hide">
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main gx-5">
                    <div class="col-12 col-md-6">
                        <div class="lightcolor fw-600 text-center pt-35 fs-30 fs-20 pb-3 pb-md-0">

                            <span class="darkpink">Picscan</span>
                            Is The World's Only End To End Al Powered Image Post Production Solution
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <form action="{{ route('frontend.password.email') }}" method="post" class="login-form">
                                @csrf
                                <div class="dblwhitecolor h4 mb-0 fw-600 pb-2">Reset Password</div>
                                {{-- <div class="d-flex  align-items-center gap-2 pb-4">
                                    <div class="tplwhitecolor fw-600">New here?</div>
                                    <a href="#" class="ltdrkblue fw-600 text-decoration-none">Create An Account</a>
                                </div> --}}
                                <div class="pb-3">
                                    <label for="email" class="fw-600 frtwhitcolor pb-2">Email ID*</label>
                                    <input type="email" name="email" minlength="8" maxlength="30" required
                                        class="form-control sin-input">
                                </div>
                                @if ($errors->has('email'))
                                    <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                @endif
                                @if (session('status'))
                                    <div class="text-success">
                                        <li> {{ session('status') }} </li>
                                    </div>
                                @endif
                                {{-- @if ($errors->has('email'))
                                    <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('email') }}
                                    </div>
                                @endif --}}
                                {{-- <div class="pb-2">
                                    <label for="password" class="fw-600 frtwhitcolor pb-2">Password*</label>
                                    <input type="password" name="password" minlength="8" maxlength="16" required
                                        class="form-control sin-input">

                                </div> --}}
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
                                {{-- <div class="d-flex  justify-content-end">
                                    <a href="#" class="text-white fw-600 text-decoration-none">Forgot Password</a>
                                </div> --}}
                                <div>
                                    {{-- <a href="http://" class="btn btn-login withsignin" style="font-size: 20px">
                                        Sign In
                                    </a> --}}
                                    <button type="submit" class="btn btn-login withsignin" style="font-size: 20px">
                                        Submit
                                    </button>
                                </div>

                                {{-- <a href="#" class="d-flex align-items-center text-decoration-none"
                                    style="gap: 13px;padding-top:12px">
                                    <img src="{{ asset('frontend/images/index/index-new/swg.svg') }}" alt=""
                                        srcset="">

                                    <div class="text-white" style="font-size: 12px">
                                        Sign up with Google
                                    </div>
                                </a> --}}


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
