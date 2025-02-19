<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Forgot Password - Face Recognition</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/images/mainlogo.png') }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="backend/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="backend/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="backend/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="backend/assets/css/forms/switches.css">
    <link rel="shortcut icon" href="{{ asset('backend/images/mainlogo.png') }}" type="image/x-icon">

    <style>
        .fw-300 {
            font-weight: 300
        }

        .fw-400 {
            font-weight: 400
        }

        .fw-400 {
            font-weight: 500
        }

        .form-form .terms-conditions a{
            font-weight: 300;
        }
        .body-bg {
            background-image: url(/backend/images/login/login-bg.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            /* Set the height of the container */
        }

        .radius-10 {
            border-radius: 10px;
        }

        .text-black {
            color: #000000;
        }

        .bg-pink-color {
            background-color: #FE3B96;
            border-radius: 12px;
            color: white;
            transition: none;
            padding: 12px 35px !important;
            width: 100%;
            font-weight: 500;
            font-size: 18px;
            border: 0px;
            /* Remove default transition effect */

        }

        .btn:hover,
        .btn:focus {
            transform: unset;
            background-color: #FE3B96;

            color: unset;
            box-shadow: unset;
            border: unset;
            background-color: #FE3B96;
            border-radius: 12px;
            color: white;
            transition: none;
            padding: 12px 35px !important;
            width: 100%;
            font-weight: 500;
            font-size: 18px;
            border: 0px;

        }

        input[data-custom-attribute="channels-login"] {
            background: #FFFFFF;
            box-shadow: 8.03325px 11.6847px 15.3362px 1.46059px rgba(0, 0, 0, 0.13);
            border-radius: 10.9544px;

        }

        .text-cl {
            color: #000000;
        }

        .form-form .form-form-wrap form .field-wrapper svg {
            top: 18px;
            left: 7px;
        }

        .form-form .terms-conditions {
            margin-top: 35px;
        }

        .form-form .form-form-wrap form .field-wrapper input {
            background-color: #1A1A1A !important;
            border: 0px;
            color: white;
            border-radius: 12px !important;
        }

        .form-form .form-form-wrap form .field-wrapper input::placeholder {
            color: #8C9187;
        }

        .form-form .form-form-wrap form .field-wrapper input:focus {
            border-bottom: 0px;
        }

        .form-form .form-form-wrap form .field-wrapper svg {
            top: 21px;
        }

        .form-form .form-form-wrap form .field-wrapper input {
            min-height: 45px;
            padding: 0px 0 0px 45px !important;
        }

        .form-form .form-form-wrap p.signup-link {
            margin-bottom: 20px;
        }

        .auth-form {
            /* background: linear-gradient(114.88deg, #5A1837 7.26%, #181215 25.65%, #181215 41.63%, #181215 59.05%, #F99EC9 104.07%); */
            padding: 1px;
            border-radius: 25px;

        }

        .auth-form-inner {
            /* background: linear-gradient(165.93deg, rgba(48, 46, 46, 0.14) -2%, rgba(84, 7, 43, 0.14) 105.79%); */
            padding: 36px 59px 59px 60px;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .auth-form-inner-one {
            /* background: black; */
            border-radius: 25px;
        }

        .form-form .form-form-wrap {
            max-width: 480px;
            margin: 0 auto;
            min-width: 311px;
            min-height: 100%;
            height: auto;
        }

        .form-container {
            height: 100%;
            display: flex;
            align-items: center;

        }

        .form-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        li::marker {
            content: none;
            display: none;
        }

        .text-success {
            text-align: center;
            padding-top: 10px;
        }
        .text-underline {
    text-decoration: underline;
}
            @media screen and (max-width:576px) {   

            }
        @media screen and (max-width:480px) {
            .auth-form-inner {
                padding: 15px;
            }

            .form-form .form-form-wrap {
                max-width: 100%;
                margin: 0 auto;
                min-width: 100%;
                min-height: 100%;
                height: auto;
            }

            .bg-pink-color {
                font-size: 16px;
            }

            .form-form .terms-conditions {
                margin-top: 13px;
            }

            .footer-wrapper .footer-section p {
                font-size: 12px;
            }

            .form-form .form-form-wrap p.signup-link {
                font-size: 12px;
            }
           
            .picscanai-logo{
                width: 80px;
            }

        }
    </style>

</head>

<body class="form body-bg">


    <div class="form-container justify-content-center">
        <div class="auth-form mx-auto" style="width:694px;">
            <div class="auth-form-inner-one">
                <div class="auth-form-inner">
                    <div class="form-form">
                        <div class="form-form-wrap">
                            <div class="form-content">

                                <div class="row text-center mb-4 mb-sm-5">
                                    <div class="col col-12">
                                        <a href="/">
                                            <img class="d-block mx-auto picscanai-logo" style=""
                                            src="{{ asset('backend/images/login/picscanai-logo.png') }}" alt="">
                                        </a>
                                    </div>
                                    {{-- <div class="col col-12 py-3">
                                        <h1 class="h3"><span class="text-cl text-white">Reset Password</span></h1>

                                    </div> --}}
                                </div>
                                <p class="signup-link text-center text-white ">Enter your email address <br /> to
                                    receive a link to reset password!
                                </p>
                                <form class="text-left" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form">
                                        <div id="email-field" class="field-wrapper input ">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                                </svg> --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-envelope-fill mx-1" viewBox="0 0 16 16"
                                                style="fill:#8C9187 ">
                                                <path
                                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z">
                                                </path>
                                            </svg>
                                            <span><i class="bi bi-envelope-fill "></i></span>
                                            <input id="email" name="email" type="email" value=""
                                                placeholder="Email" minlength="8" maxlength="30" required
                                                data-custom-attribute="channels-login" class=" py-2  radius-10 rounded">
                                            @if ($errors->has('email'))
                                                <div class="text-danger" role="alert">{{ $errors->first('email') }}
                                                </div>
                                            @endif
                                            @if (session('status'))
                                                <div class="text-success">
                                                    <li> {{ session('status') }} </li>
                                                </div>
                                            @endif
                                        </div>
                                        <div class=" w-100">
                                            <div class="field-wrapper text-center">
                                                <button type="submit" class="btn  bg-pink-color mx-auto fw-bold"
                                                    value="">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <div class="terms-conditions footer-wrapper justify-content-center">
                                    <div class="footer-section f-section-1">
                                        <p class="text-white text-center fw-300 pt-20px ">
                                            &copy;
                                            {{ date('Y') }} All Rights Reserved | Powered by
                                            <a href="http://acetrot.com" target="_blank" class="text-white text-underline fw-300">
                                                Acetrot <img src="{{ url('/backend/assets/img/acetrot.png') }}"
                                                    width="24" alt="">
                                            </a>

                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="backend/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="backend/bootstrap/js/popper.min.js"></script>
    <script src="backend/bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="backend/assets/js/authentication/form-1.js"></script>

</body>

</html>
