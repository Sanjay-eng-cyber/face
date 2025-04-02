<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> @yield('title') - Admin </title>
    @include('backend.layouts.header')
    @yield('cdn')
</head>

<body class="sidebar-noneoverflow">

    @include('backend.layouts.nav')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        @yield('content')
        @include('backend.layouts.footer')
    </div>
    <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    @include('backend.layouts.js')
    @yield('js')
    <script>
        function updateHeights() {
                   const header = document.querySelector("header");
                   const myCustom = document.querySelector(".my-custom-section");
                   const footer = document.querySelector(".footer-wrapper");
       
                   if (header) {
                       document.documentElement.style.setProperty("--header-height", `${header.offsetHeight}px`);
                   }
                   if (myCustom) {
                       document.documentElement.style.setProperty("--mycustom-height", `${myCustom.offsetHeight}px`);
                   }
                   if (footer) {
                       document.documentElement.style.setProperty("--footer-height", `${footer.offsetHeight}px`);
                   }
               }
       
               window.addEventListener("load", updateHeights);
               window.addEventListener("resize", updateHeights);
       
       </script>
   
</body>

</html>
