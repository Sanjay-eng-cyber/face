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
    <link rel="icon" type="image/png" href="{{url('frontend/image/icons/favicon.png')}}">
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
    <link rel="stylesheet" href="{{ url('backend/assets/css/tinymce.min.css') }}">
    <script src="{{ url('backend/assets/js/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea.description',
            height: 500,
            theme: 'modern',
            plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
            templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                },
                {
                    title: 'Test template 2',
                    content: 'Test 2'
                }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>

</body>

</html>
