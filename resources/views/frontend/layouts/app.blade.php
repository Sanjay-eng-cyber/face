<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('frontend/images/index/mainlogo.png') }}" type="image/x-icon">
    <title>
        @hasSection('title')
            @yield('title') |  Face Recognition
        @else
        Face Recognition
        @endif
    </title>
    @include('frontend.layouts.header')
    @yield('cdn')


</head>

<body style="background-color:#000000;">
    <header>
        @include('frontend.layouts.nav')
    </header>
    <main class="w-100">
        @yield('content')
    </main>

    @include('frontend.layouts.footer')

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>


    @yield('js')

</body>

</html>
