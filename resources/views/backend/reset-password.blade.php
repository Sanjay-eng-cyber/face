<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('backend/images/mainlogo.png') }}" type="image/x-icon">
    <title>Reset Password - face</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="backend/css/cms.css">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .text-cl {
            color: #000000;
        }

        .text-black {
            color: #000000 !important;
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


        .bg-pink-color {
            background-color: #FE3B96;
            border-radius: 12px;
            color: white;
            border: 1px solid transparent;
            transition: none;
            padding: 8px 35px;
            width: 100%;
            margin: auto;
            font-size: 24px;
            font-weight: 500;
            /* Remove default transition effect */


        }


        /* .bg-pink-color:hover {
    background-color: transparent;
    color: #64002F;
    border: 1px solid #64002F;
} */

        /* input[data-custom-attribute="channels-login"] {
    background:#1A1A1A;
    box-shadow: 8.03325px 11.6847px 15.3362px 1.46059px rgba(0, 0, 0, 0.13);
    border-radius: 10.9544px;
    

} */
        .form-control:focus {
            background: #1A1A1A;

        }

        .fw-300 {
            font-weight: 300;
        }

        .fw-400 {
            font-weight: 400;
        }

        .fw-500 {
            font-weight: 500;
        }

        .pt-20px {
            padding-top: 20px;
        }

        .auth-form {
            padding: 1px;
            border-radius: 25px;

        }

        .auth-form-inner {
            padding: 36px 59px 59px 60px;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .auth-form-inner-one {
            border-radius: 25px;
        }

        .auth-form-input input{
            font-size: 16px;
            min-height: 46px;
        }

        .auth-form-input input::placeholder {
            color: #8C9187;
            background: #1A1A1A;
            font-size: 16px;

        }

        .cmn-input {
            color: #ffffff;
            background: #1A1A1A !important;
        }

        .cmn-input:focus {
            outline: none;
            background-color: transparent;
            color: white;
            border: none;
        }

        .z-index-1 {
            z-index: -1;
        }

        .login-form {
            max-width: 441px;
            width: 100%;
        }

        input[disabled],
        select[disabled],
        textarea[disabled],
        input[readonly],
        select[readonly],
        textarea[readonly] {
            background-color: #1A1A1A !important;
        }

        .bg-pink-color.form-control:focus {
            background-color: #FE3B96;
            color: white
        }

        @media screen and (max-width:576px) {
            .auth-form-inner {
                padding: 25px 15px 25px 15px;
            }
            .bg-pink-color {
                font-size: 16px;
            }

            
            .auth-form-input input{
                font-size: 13px;
                min-height: 100%;
            }

            .auth-form-input input::placeholder {
                font-size: 13px;
            }
            .auth-form-inner{
                padding: 0px;
            }

        }
        @media screen and (max-width:480px) {
            .bg-pink-color {
                font-size: 13px;
            }
        }
    </style>
</head>



<body class="auth-page-bg body-bg">
    <img src="{{ asset('backend/images/login/ele-login.svg') }}" alt="" srcset=""
        class="img-fluid position-absolute start-0 top-0 z-index-1">
    <div class="container h-100 d-flex  align-items-center">

        <div class="auth-form mx-auto" style="width:694px;">
            <div class="auth-form-inner-one">
                <div class="auth-form-inner">
                    <a href="{{ url('/') }}"> <img class="d-block mx-auto " style=""
                            src="{{ asset('backend/images/login/picscanai-logo.png') }}" alt=""></a>
                    <h1 class="text-center h5 mt-5 pb-1 auth-text-primary cubold text-cl text-white">Reset Password</h1>

                    <form method="POST" action="{{ route('password.update') }}" class="login-form">
                        @csrf
                        <input class="form-control" type="text" name="token" value="{{ $request->route('token') }}"
                            required hidden data-custom-attribute="channels-login">
                        <div class="auth-form-input">
                            {{-- <img class="icon" src="backend/images/icon-user.svg" draggable="false"> --}}
                            <input class="form-control readonly-field cmn-input" placeholder="E-mail or Username "
                                id="email" name="email" type="email" minlength="8" maxlength="30"
                                value="{{ request('email') }}" readonly required data-custom-attribute="channels-login">
                        </div>
                        @if ($errors->has('email'))
                            <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                        @endif
                        <div class="auth-form-input mt-4">
                            {{-- <img class="icon eye-show-pass" src="backend/images/icon-eye.svg" draggable="false"> --}}
                            <input class="form-control password cmn-input" type="text" placeholder="Password"
                                id="password" name="password" minlength="8" maxlength="16" required>
                        </div>
                        <div class="auth-form-input mt-4">
                            {{-- <img class="icon eye-show-pass" src="backend/images/icon-eye.svg" draggable="false"> --}}
                            <input class="form-control password cmn-input" type="text" placeholder="Password"
                                id="password2" name="password_confirmation" minlength="8" maxlength="16" required
                                data-custom-attribute="channels-login">
                        </div>
                        @if ($errors->has('password'))
                            <div class="text-danger" role="alert">{{ $errors->first('password') }}</div>
                        @endif

                        <button type="submit" class="form-control btn-lg h-auto bg-pink-color font-bold mt-4">
                            Done
                        </button>



                    </form>


                    {{-- <div class="text-center text-muted mt-3 text-white">
                    <small class="p-0 text-black">
                        &copy;
                        {{ date('Y') }} All Rights Reserved | Powered by
                        <a href="http://acetrot.com" class="text-muted text-black text-underline" target="_blank">
                            Acetrot.com
                        </a>
                    </small>
                </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="backend/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="backend/bootstrap/js/popper.min.js"></script>
    <script src="backend/bootstrap/js/bootstrap.min.js"></script>
    <script>
        var eyeIcon = document.querySelectorAll(".eye-show-pass");
        var passwordInput = document.querySelectorAll(".password");
        eyeIcon.forEach(icons => {
            icons.addEventListener('click', function(e) {
                passwordInput.forEach(inputs => {
                    if (inputs.type === "password") {
                        inputs.type = "tepasswordInputt";
                    } else {
                        inputs.type = "password";
                    }
                });
            })
        });
    </script>
</body>


</html>
