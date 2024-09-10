<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @hasSection('title')
            @yield('title') |  Lorem
        @else
           Lorem
        @endif
    </title>
    @include('frontend.layouts.header')
    @yield('cdn')

    
</head>

<body>
    <header>
        @include('frontend.layouts.nav')
    </header>
    <main>
        @yield('content')
    </main>

    @include('frontend.layouts.footer')

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>


    @yield('js')
   
</body>

</html>
