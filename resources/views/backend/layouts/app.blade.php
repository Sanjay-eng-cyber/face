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
    <style>
        .mce-notification-inner{
            display: none !important;
        }
        .mce-notification .mce-close{
            display: none !important;
        }
        .mce-notification.mce-has-close{
            display: none !important;
        }
        #mceu_40{
            display: none !important;
        }
        .mce-notification.mce-has-close{
            left: 0px;
            top:0px;
        }
        .mce-notification-warning{
            background-color: transparent !important;
            border-color:transparent !important;
        }
    </style>
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
</body>

</html>
