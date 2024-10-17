@extends('backend.layouts.app')
@section('title', 'Create Event')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Create Event
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">
                                            Create Event</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-xl-7 col-md-10">
                <div class="row m-0">
                    <div class="col-md-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.event.store') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Name*</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="250" required name="name"
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Cover Image</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput"
                                        name="cover_image">
                                    @if ($errors->has('cover_image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('cover_image') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Start Date*</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput" required
                                        name="start_date" value="{{ old('start_date') }}">
                                    @if ($errors->has('start_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('start_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">End Date*</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput" required
                                        name="end_date" value="{{ old('end_date') }}">
                                    @if ($errors->has('end_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('end_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="descriptions">Description</label>
                                    <textarea id="team-about" class="team-about" name="descriptions" minlength="3" maxlength="20000">{{ old('descriptions') }}</textarea>
                                    @if ($errors->has('descriptions'))
                                        <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js">
    </script> --}}
    <script>
        tinymce.init({
            selector: '.team-about',
            height: 200,
            plugins: 'textcolor colorpicker lists link',
            toolbar: "formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist | link | outdent indent  | removeformat",
            // theme: 'modern',
            // plugins: ' fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample  charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern ',
            // toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            // image_advtab: true,
            // templates: [{
            //         title: 'Test template 1',
            //         content: 'Test 1'
            //     },
            //     {
            //         title: 'Test template 2',
            //         content: 'Test 2'
            //     }
            // ],
            // content_css: [
            //     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',

            // ]
        });

        // function getValues() {
        //     $('#sub').html('')

        //     if ($('#sel1').val()) {

        //         $.ajax({
        //             url: '/category/get/subcategory/' + $('#sel1').val(),
        //             method: "GET",
        //             success: function(data) {
        //                 if (data.data == '') {
        //                     $('#sub').append(`<option value=''>No data</option>`)
        //                 } else {
        //                     $('#sub').append(`<option value=''>Select If Required</option>`)
        //                     $.each(data.data, function(id, value) {
        //                         $('#sub').append(`<option value="${value.id}">${value.name}</option>`)
        //                     })
        //                 }
        //             },
        //             error: function() {
        //                 Snackbar.show({
        //                     text: "Internal Error",
        //                     pos: 'top-right',
        //                     actionTextColor: '#fff',
        //                     backgroundColor: '#e7515a'
        //                 });
        //             }
        //         })
        //     }
        // }
        // $(".tagging").select2({
        //     tags: true,
        //     placeholder: "Select / Enter Tags",
        // });
    </script>
@endsection
