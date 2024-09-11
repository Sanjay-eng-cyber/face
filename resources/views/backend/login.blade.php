<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login - Techplastiks</title>
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/assets/images/backgrounds/logo.png')}}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">

    <style>
        .text-primary{
            color:#03426D !important;
        }

        .btn-primary{
            background:#03426D !important;
            border:1px solid #03426D;
        }
        .btn-primary:hover{
            background:#03426D !important;
            border:1px solid #03426D;
        }
        .switch.s-primary .slider:before{
            background-color: #03426D;
        }
        .switch.s-primary input:checked + .slider{
            background-color: #03426D;
        }
        .form-form .form-form-wrap form .field-wrapper input:focus{
            border-bottom-color: #03426D;
        }
        .field-wrapper .forgot-pass-link:hover{
            color:#959ca9 !important;
        }
        .field-wrapper .forgot-pass-link{
           padding-top: 15px;
        }
        @media screen and (max-width:576px){
            .footer-wrapper .footer-section.f-section-1 p {
                font-size: 11px ;

            }
            .footer-wrapper{
                padding: 0px;
            }
            .footer-wrapper .footer-section.f-section-1 img {
                 width:20px;

            }
            h1{
                font-size: 34px;
            }
        }
        .text-center{
            text-align: center
        }
        .terms-conditions.footer-wrapper{
            margin-top: 75px;
        }
    </style>
</head>

<body class="form">
    <div class="form-container justify-content-center">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <div class="row text-center">
                            <div class="col col-12">
                                <a href="{{url('/')}}">
                                    <img src="{{asset('frontend/assets/images/backgrounds/logo.png')}}" alt="" width="40%" alt="logo">
                                    {{-- <img src="{{ asset('frontend/images/hr-logo.png') }}" width="30%"
                                        class="" alt="logo"> --}}
                                    {{-- <h1 class="text-warning">Techplastiks</h1> --}}
                                </a>
                            </div>
                            <div class="col col-12 py-3">
                                <h1 class="text-primary"><span class="">Login</span></h1>

                            </div>
                        </div>
                        <!-- <p class="signup-link">New Here? <a href="auth_register.html">Create an account</a></p> -->
                        <form class="text-left" method="POST" action="{{ route('cms.login.submit') }}">
                            @csrf
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"
                                        style="fill:#03426D">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>

                                    <input id="email" name="email" type="email" class="form-control"
                                        placeholder="Username" minlength="8" maxlength="30" required>
                                </div>
                                @if ($errors->has('email'))
                                    <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                @endif

                                <div id="password-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"
                                        style="fill:#03426D">
                                        <path
                                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password" required>
                                    @if ($errors->has('password'))
                                        <div class="text-danger" role="alert">{{ $errors->first('password') }}</div>
                                    @endif
                                    @if ($errors->has('credentials'))
                                        <div class="text-danger" role="alert">{{ $errors->first('credentials') }}
                                        </div>
                                    @endif
                                    @if (session('status'))
                                        <div class="text-success">
                                            <li> {{ session('status') }} </li>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none text-primary">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper text-center">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>

                                </div>

                                <!-- <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span>Keep me logged in
                                        </label>
                                    </div>
                                </div> -->

                                <div class="field-wrapper">
                                    <a href="{{ route('cms.forgotPassword.index') }}" class="forgot-pass-link text-primary">Forgot
                                        Password?</a>
                                </div>

                            </div>
                        </form>
                        <div class="terms-conditions footer-wrapper justify-content-center ">
                            <div class="footer-section f-section-1">
                                <p>
                                    &copy;
                                    {{ date('Y') }} All Rights Reserved.
                                    <a href="http://acetrot.com" target="_blank">
                                        Acetrot <img src="{{ url('/assets/img/acetrot.png') }}" width="24" alt="">
                                    </a>

                                </p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="backend/bootstrap/js/popper.min.js"></script>
    <script src="backend/bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-1.js"></script>

</body>

</html>
