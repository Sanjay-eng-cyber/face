<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Find anyone online with face recognition search engine. Search for people by photo and verify you are talking to the person they claim to be.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{asset('frontend/js/fancybox-min.js')}}"></script>

  
    @yield('js')

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('mainNavbar');
            var sticky = navbar.offsetTop;
    
            if (window.pageYOffset > sticky && !navbar.classList.contains('sticky-nav')) {
                navbar.classList.add('sticky-nav');
            } else if (window.pageYOffset <= sticky && navbar.classList.contains('sticky-nav')) {
                navbar.classList.remove('sticky-nav');
            }
        });
    </script>
    


</body>

</html>
