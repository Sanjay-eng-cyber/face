@extends('backend.layouts.app')
@section('title', 'Edit Category')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
        
            
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h2 text-clr fw-600">
                                Edit Category
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                           
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);"> Edit Category</a>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-xl-6 col-md-10 mt-3 mt-lg-4">
                <div class="row m-0">
                    <div class="col-md-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.category.update', $category->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">

                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Event*</label>
                                    <select class="form-control event-dpd-cust" name="event_id" required>
                                        <option value="">Select Any</option>
                                        @foreach ($events as $event)
                                            @if (old('event_id'))
                                                <option value="{{ $event->id }}"
                                                    @if (old('event_id')) selected @endif>
                                                    {{ $event->name }}</option>
                                            @else
                                                <option value="{{ $event->id }}"
                                                    @if ($event->id == $category->event_id) selected @endif>
                                                    {{ $event->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('event_id'))
                                        <div class="text-danger" role="alert">{{ $errors->first('event_id') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Name*</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="40" required name="name"
                                        value="{{ old('name') ?? $category->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Cover Image</label>
                                    <input type="file" class="form-control p-8px" id="formGroupExampleInput"
                                        name="cover_image">
                                    @if ($category->cover_image)
                                        <div id="lightgallery" class="text-end">
                                            <a href="{{ asset('storage/images/categories/' . $category->cover_image) }}"
                                                target="_blank" class="text-white-2">View</a>
                                        </div>
                                    @endif
                                    @if ($errors->has('cover_image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('cover_image') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-6  mb-3">
                                    <label for="descriptions">Sharing*</label><br>
                                    @if (old('sharing'))
                                        <input type="radio" id="sharingYes" name="sharing" value="1"
                                            @if (old('sharing') == '1') {{ 'checked' }} @endif required>
                                        <label for="sharingYes">Yes</label>
                                        <input type="radio" id="sharingNo" name="sharing" value="0"
                                            @if (old('sharing') == '0') {{ 'checked' }} @endif required>
                                        <label for="sharingNo">No</label>
                                    @else
                                        <input type="radio" id="sharingYes" name="sharing" value="1"
                                            @if ($category->sharing == '1') {{ 'checked' }} @endif required>
                                        <label for="sharingYes">Yes</label>
                                        <input type="radio" id="sharingNo" name="sharing" value="0"
                                            @if ($category->sharing == '0') {{ 'checked' }} @endif required>
                                        <label for="sharingNo">No</label>
                                    @endif

                                    @if ($errors->has('sharing'))
                                        <div class="text-danger" role="alert">{{ $errors->first('sharing') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="descriptions">Visibility* </label><br>
                                    @if (old('visibility'))
                                        <input type="radio" id="visibilityYes" name="visibility" value="1"
                                            @if (old('visibility') == '1') {{ 'checked' }} @endif required>
                                        <label for="visibilityYes">Yes</label>
                                        <input type="radio" id="visibilityNo" name="visibility" value="0"
                                            @if (old('visibility') == '0') {{ 'checked' }} @endif required>
                                        <label for="visibilityNo">No</label>
                                    @else
                                        <input type="radio" id="visibilityYes" name="visibility" value="1"
                                            @if ($category->visibility == '1') {{ 'checked' }} @endif required>
                                        <label for="visibilityYes">Yes</label>
                                        <input type="radio" id="visibilityNo" name="visibility" value="0"
                                            @if ($category->visibility == '0') {{ 'checked' }} @endif required>
                                        <label for="visibilityNo">No</label>
                                    @endif

                                    @if ($errors->has('visibility'))
                                        <div class="text-danger" role="alert">{{ $errors->first('visibility') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary ctr-submit">
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
    <link type="text/css" rel="stylesheet" href="{{ asset('custom/plugins/lightgallery/css/lightgallery.min.css') }}" />
    <script src="{{ asset('custom/plugins/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('custom/plugins/lightgallery/js/lg-zoom.js') }}"></script>
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

        $(document).ready(function() {
            lightGallery(document.getElementById('lightgallery'), {
                download: false,
            });
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
