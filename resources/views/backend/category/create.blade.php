@extends('backend.layouts.app')
@section('title', 'Create Category')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <a href="{{ route('backend.category.index') }}" class="top-arrowbtn">
                <img src="{{ asset('backend/assets/img/prearrow.svg') }}" alt="" srcset="" class="img-fluid logo">
            </a>

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2  mp-0">
                            <legend class="h2 text-clr fw-600">
                                Create Category
                            </legend>
                        </div>

                        <div
                            class="col-xl-4 col-md-6 mb-0 mb-sm-2 d-flex justify-content-start justify-content-sm-end align-it mt-1  mp-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider bdpd">
                                    <li class="breadcrumb-item"><a href="{{ route('backend.category.index') }}">Categories</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Create Category</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow main-widthcc mt-3 mt-lg-4">
                <div class="row m-0">
                    <div class="col-md-12 mp-0">
                        <form class="mb-1" method="POST" action="{{ route('backend.category.store') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row">

                                <div class="col-xl-12 col-12 mb-3 mp-0 p-0">
                                    <label for="formGroupExampleInput" class="">Event Name*</label>
                                    <select class="form-control event-dpd-cust" name="event_id" required>
                                        <option value="">Select Any</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}"
                                                @if (old('event_id')) {{ 'selected' }} @endif>
                                                {{ $event->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('event_id'))
                                        <div class="text-danger" role="alert">{{ $errors->first('event_id') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-12 mb-3 mp-0 p-0">
                                    <label for="formGroupExampleInput" class="">Category Name*</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Category Name" minlength="3" maxlength="40" required name="name"
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 mp-0 ccm-grid p-0">
                                    <div class="mb-3 mp-0">
                                        <label for="formGroupExampleInput" class="">Cover Image</label>
                                        <input type="file" class="form-control p-8px cvimgcsw" id="formGroupExampleInput"
                                            name="cover_image" value="{{ old('cover_image') }}">
                                        @if ($errors->has('cover_image'))
                                            <div class="text-danger" role="alert">{{ $errors->first('cover_image') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3 mb-sm-0 ccm-grid-child">
                                        <div class="mp-0">
                                            <label for="descriptions">Sharing* </label><br>
                                            <input type="radio" id="sharingYes" name="sharing" value="1"
                                                @if (old('sharing')) {{ 'checked' }} @endif required>
                                            <label for="sharingYes" class="mb-0">Yes</label>
                                            <input type="radio" id="sharingNo" name="sharing" value="0"
                                                @if (old('sharing')) {{ 'checked' }} @endif required>
                                            <label for="sharingNo" class="mb-0">No</label>

                                            @if ($errors->has('sharing'))
                                                <div class="text-danger" role="alert">{{ $errors->first('sharing') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="mp-0">
                                            <label for="descriptions">Visibility* </label><br>
                                            <input type="radio" id="visibilityYes" name="visibility" value="1"
                                                @if (old('visibility')) {{ 'checked' }} @endif required>
                                            <label for="visibilityYes" class="mb-0">Yes</label>
                                            <input type="radio" id="visibilityNo" name="visibility" value="0"
                                                @if (old('visibility')) {{ 'checked' }} @endif required>
                                            <label for="visibilityNo" class="mb-0">No</label>

                                            @if ($errors->has('visibility'))
                                                <div class="text-danger" role="alert">{{ $errors->first('visibility') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-12  mp-0 p-0">
                                    <input type="submit" class="btn btn-primary w-100">
                                </div>
                            </div>
                            {{-- <div class="d-flex justify-content-lg-end">
                                <input type="submit" class="btn btn-primary w-100">
                            </div> --}}
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
