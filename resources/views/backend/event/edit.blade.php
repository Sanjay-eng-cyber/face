@extends('backend.layouts.app')
@section('title', 'Eevnt Edit')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Edit Eevnt
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">
                                            Edit Eevnt</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-md-6">
                <div class="row m-0">
                    <div class="col-md-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.event.update', $event->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Name*</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="250" required name="name"
                                        value="{{ old('name') ?? $event->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Start Date*</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput" required
                                        name="start_date"
                                        value="{{ old('start_date') ?? dd_format($event->start_date, 'Y-m-d') }}">
                                    @if ($errors->has('start_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('start_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-12 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">End Date*</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput" required
                                        name="end_date"
                                        value="{{ old('end_date') ?? dd_format($event->end_date, 'Y-m-d') }}">
                                    @if ($errors->has('end_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('end_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="descriptions">Description</label>
                                    <textarea id="team-about" class="team-about" name="descriptions" minlength="3" maxlength="20000">{{ old('descriptions') ?? $event->descriptions }}</textarea>
                                    @if ($errors->has('descriptions'))
                                        <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Download Size :</label><br>
                                    @if (old('download_size'))
                                        <input type="radio" id="original" name="download_size" value="original"
                                            @if (old('download_size') == 'original') {{ 'checked' }} @endif required>
                                        <label for="original">Original</label>
                                        <input type="radio" id="1600" name="download_size" value="1600"
                                            @if (old('download_size') == '1600') {{ 'checked' }} @endif required>
                                        <label for="1600">1600 px</label>
                                    @else
                                        <input type="radio" id="original" name="download_size" value="original"
                                            @if ($event->download_size == 'original') {{ 'checked' }} @endif required>
                                        <label for="original">Original</label>
                                        <input type="radio" id="1600" name="download_size" value="1600"
                                            @if ($event->download_size == '1600') {{ 'checked' }} @endif required>
                                        <label for="1600">1600 px</label>
                                    @endif

                                    @if ($errors->has('download_size'))
                                        <div class="text-danger" role="alert">{{ $errors->first('download_size') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Sharing :</label><br>
                                    @if (old('sharing'))
                                        <input type="radio" id="sharingYes" name="sharing" value="1"
                                            @if (old('sharing') == '1') {{ 'checked' }} @endif required>
                                        <label for="sharingYes">Yes</label>
                                        <input type="radio" id="sharingNo" name="sharing" value="0"
                                            @if (old('sharing') == '0') {{ 'checked' }} @endif required>
                                        <label for="sharingNo">No</label>
                                    @else
                                        <input type="radio" id="sharingYes" name="sharing" value="1"
                                            @if ($event->sharing == '1') {{ 'checked' }} @endif required>
                                        <label for="sharingYes">Yes</label>
                                        <input type="radio" id="sharingNo" name="sharing" value="0"
                                            @if ($event->sharing == '0') {{ 'checked' }} @endif required>
                                        <label for="sharingNo">No</label>
                                    @endif

                                    @if ($errors->has('sharing'))
                                        <div class="text-danger" role="alert">{{ $errors->first('sharing') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Visibility :</label><br>
                                    @if (old('visibility'))
                                        <input type="radio" id="visibilityYes" name="visibility" value="1"
                                            @if (old('visibility') == '1') {{ 'checked' }} @endif required>
                                        <label for="visibilityYes">Yes</label>
                                        <input type="radio" id="visibilityNo" name="visibility" value="0"
                                            @if (old('visibility') == '0') {{ 'checked' }} @endif required>
                                        <label for="visibilityNo">No</label>
                                    @else
                                        <input type="radio" id="visibilityYes" name="visibility" value="1"
                                            @if ($event->visibility == '1') {{ 'checked' }} @endif required>
                                        <label for="visibilityYes">Yes</label>
                                        <input type="radio" id="visibilityNo" name="visibility" value="0"
                                            @if ($event->visibility == '0') {{ 'checked' }} @endif required>
                                        <label for="visibilityNo">No</label>
                                    @endif

                                    @if ($errors->has('visibility'))
                                        <div class="text-danger" role="alert">{{ $errors->first('visibility') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Single Image Download :</label><br>
                                    @if (old('single_image_download'))
                                        <input type="radio" id="single_image_downloadYes" name="single_image_download"
                                            value="1" @if (old('single_image_download') == '1') {{ 'checked' }} @endif
                                            required>
                                        <label for="single_image_downloadYes">Yes</label>
                                        <input type="radio" id="single_image_downloadNo" name="single_image_download"
                                            value="0" @if (old('single_image_download') == '0') {{ 'checked' }} @endif
                                            required>
                                        <label for="single_image_downloadNo">No</label>
                                    @else
                                        <input type="radio" id="single_image_downloadYes" name="single_image_download"
                                            value="1" @if ($event->single_image_download == '1') {{ 'checked' }} @endif
                                            required>
                                        <label for="single_image_downloadYes">Yes</label>
                                        <input type="radio" id="single_image_downloadNo" name="single_image_download"
                                            value="0" @if ($event->single_image_download == '0') {{ 'checked' }} @endif
                                            required>
                                        <label for="single_image_downloadNo">No</label>
                                    @endif

                                    @if ($errors->has('single_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('single_image_download') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Bulk Image Download :</label><br>

                                    @if (old('bulk_image_download'))
                                        <input type="radio" id="bulk_image_downloadYes" name="bulk_image_download"
                                            value="1" @if (old('bulk_image_download') == '1') {{ 'checked' }} @endif
                                            required>
                                        <label for="bulk_image_downloadYes">Yes</label>
                                        <input type="radio" id="bulk_image_downloadNo" name="bulk_image_download"
                                            value="0" @if (old('bulk_image_download') == '0') {{ 'checked' }} @endif
                                            required>
                                        <label for="bulk_image_downloadNo">No</label>
                                    @else
                                        <input type="radio" id="bulk_image_downloadYes" name="bulk_image_download"
                                            value="1" @if ($event->bulk_image_download == '1') {{ 'checked' }} @endif
                                            required>
                                        <label for="bulk_image_downloadYes">Yes</label>
                                        <input type="radio" id="bulk_image_downloadNo" name="bulk_image_download"
                                            value="0" @if ($event->bulk_image_download == '0') {{ 'checked' }} @endif
                                            required>
                                        <label for="bulk_image_downloadNo">No</label>
                                    @endif

                                    @if ($errors->has('bulk_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('bulk_image_download') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">Brand</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="">Select Any Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    @if (old('brand_id') == $brand->id) {{ 'selected' }} @endif>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('brand_id'))
                                            <div class="text-danger" role="alert">{{ $errors->first('brand_id') }}
                                            </div>
                                        @endif
                                    </div> --}}

                                {{-- <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">Thumbnail Image*</label>
                                        <input class="form-control" name="thumbnail_image" type="file" id="image"
                                            required>
                                        @if ($errors->has('thumbnail_image'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('thumbnail_image') }}
                                            </div>
                                        @endif
                                    </div> --}}

                                {{-- <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">Image*</label>
                                        <input class="form-control" name="image[]" type="file" id="image" multiple
                                            required />
                                        @if ($errors->has('image'))
                                            <div class="text-danger" role="alert">{{ $errors->first('image') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('image.*'))
                                            <div class="text-danger" role="alert">{{ $errors->first('image.*') }}
                                            </div>
                                        @endif
                                </div> --}}

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
