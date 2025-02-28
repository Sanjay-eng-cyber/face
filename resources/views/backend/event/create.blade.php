@extends('backend.layouts.app')
@section('title', 'Create Event')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <a href="javascript:void(0);" class="sidebarCollapse arrow-main-btn d-none d-lg-block" data-placement="bottom" style="width:33px;" >
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="32" height="32" rx="15" fill="#D9D9D9"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8431 16.7111L17.5001 22.3681L18.9141 20.9541L13.9641 16.0041L18.9141 11.0541L17.5001 9.64014L11.8431 15.2971C11.6556 15.4847 11.5503 15.739 11.5503 16.0041C11.5503 16.2693 11.6556 16.5236 11.8431 16.7111Z" fill="black"/>
                </svg>    
            </a>
            
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h2 text-clr fw-600">
                                Create Event
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Create Event</a>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-xl-12 col-md-10 mt-3 mt-lg-4">
                <div class="row m-0">
                    <div class="col-md-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.event.store') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Name*</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="250" required name="name"
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Cover Image</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput"
                                        name="cover_image">
                                    @if ($errors->has('cover_image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('cover_image') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Start Date*</label>
                                    <input type="datetime-local" class="form-control" id="formGroupExampleInput" required
                                        name="start_date"  value="{{ old('start_date') }}">
                                    @if ($errors->has('start_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('start_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">End Date*</label>
                                    <input type="datetime-local" class="form-control" id="formGroupExampleInput" required
                                        name="end_date" value="{{ old('end_date') }}">
                                    @if ($errors->has('end_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('end_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Link Start Date*</label>
                                    <input type="datetime-local" class="form-control" id="formGroupExampleInput" required
                                        name="link_start_date" value="{{ old('link_start_date') }}">
                                    @if ($errors->has('link_start_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('link_start_date') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Link End Date*</label>
                                    <input type="datetime-local" class="form-control" id="formGroupExampleInput" required
                                        name="link_end_date" value="{{ old('link_end_date') }}">
                                    @if ($errors->has('link_end_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('link_end_date') }}
                                        </div>
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

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Upload Image Quality</label><br>
                                    <input type="radio" id="original" name="upload_image_quality" value="original"
                                        @if (old('upload_image_quality') == 'original') {{ 'checked' }} @endif>
                                    <label for="original">Original</label>
                                    <input type="radio" id="compressed" name="upload_image_quality" value="compressed"
                                        @if (old('upload_image_quality') == 'compressed') {{ 'checked' }} @endif>
                                    <label for="compressed">compressed</label>

                                    @if ($errors->has('upload_image_quality'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('upload_image_quality') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Link Sharing</label><br>
                                    <input type="radio" id="link_sharingYes" name="link_sharing" value="1"
                                        @if (old('link_sharing') == '1') {{ 'checked' }} @endif>
                                    <label for="link_sharingYes">Yes</label>
                                    <input type="radio" id="link_sharingNo" name="link_sharing" value="0"
                                        @if (old('link_sharing') == '0') {{ 'checked' }} @endif>
                                    <label for="link_sharingNo">No</label>

                                    @if ($errors->has('link_sharing'))
                                        <div class="text-danger" role="alert">{{ $errors->first('link_sharing') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Is Pin Protection Required</label><br>
                                    <input type="radio" id="is_pin_protection_requiredYes"
                                        name="is_pin_protection_required" value="1"
                                        @if (old('is_pin_protection_required') == '1') {{ 'checked' }} @endif>
                                    <label for="is_pin_protection_requiredYes">Yes</label>
                                    <input type="radio" id="is_pin_protection_requiredNo"
                                        name="is_pin_protection_required" value="0"
                                        @if (old('is_pin_protection_required') == '0') {{ 'checked' }} @endif>
                                    <label for="is_pin_protection_requiredNo">No</label>

                                    @if ($errors->has('is_pin_protection_required'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('is_pin_protection_required') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3" id="pinField" style="display: none;">
                                    <label for="formGroupExampleInput" class="">Pin</label>
                                    <input type="text" class="form-control" id="pin" placeholder="Enter Pin"
                                        minlength="4" maxlength="4" name="pin" value="{{ old('pin') }}">
                                    @if ($errors->has('pin'))
                                        <div class="text-danger" role="alert">{{ $errors->first('pin') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Single Image Download </label><br>
                                    <input type="radio" id="single_image_downloadYes" name="single_image_download"
                                        value="1" @if (old('single_image_download') == '1') {{ 'checked' }} @endif>
                                    <label for="single_image_downloadYes">Yes</label>
                                    <input type="radio" id="single_image_downloadNo" name="single_image_download"
                                        value="0" @if (old('single_image_download') == '0') {{ 'checked' }} @endif>
                                    <label for="single_image_downloadNo">No</label>

                                    @if ($errors->has('single_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('single_image_download') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Bulk Image Download </label><br>
                                    <input type="radio" id="bulk_image_downloadYes" name="bulk_image_download"
                                        value="1" @if (old('bulk_image_download') == '1') {{ 'checked' }} @endif>
                                    <label for="bulk_image_downloadYes">Yes</label>
                                    <input type="radio" id="bulk_image_downloadNo" name="bulk_image_download"
                                        value="0" @if (old('bulk_image_download') == '0') {{ 'checked' }} @endif>
                                    <label for="bulk_image_downloadNo">No</label>

                                    @if ($errors->has('bulk_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('bulk_image_download') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Is Watermark Required </label><br>
                                    <input type="radio" id="is_watermark_requiredYes" name="is_watermark_required"
                                        value="1" @if (old('is_watermark_required') == '1') {{ 'checked' }} @endif>
                                    <label for="is_watermark_requiredYes">Yes</label>
                                    <input type="radio" id="is_watermark_requiredNo" name="is_watermark_required"
                                        value="0" @if (old('is_watermark_required') == '0') {{ 'checked' }} @endif>
                                    <label for="is_watermark_requiredNo">No</label>

                                    @if ($errors->has('is_watermark_required'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('is_watermark_required') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3" id="watermarkField" style="display: none;">
                                    <label for="formGroupExampleInput" class="">Watermark Image</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput"
                                        name="watermark_image">
                                    @if ($errors->has('watermark_image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('watermark_image') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Visibility </label><br>
                                    <input type="radio" id="visibilityYes" name="visibility" value="1"
                                        @if (old('visibility') == '1') {{ 'checked' }} @endif required>
                                    <label for="visibilityYes">Yes</label>
                                    <input type="radio" id="visibilityNo" name="visibility" value="0"
                                        @if (old('visibility') == '0') {{ 'checked' }} @endif required>
                                    <label for="visibilityNo">No</label>

                                    @if ($errors->has('visibility'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('visibility') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Guest Images Upload </label><br>
                                    <input type="radio" id="guest_images_uploadYes" name="guest_images_upload"
                                        value="1" @if (old('guest_images_upload') == '1') {{ 'checked' }} @endif>
                                    <label for="guest_images_uploadYes">Yes</label>
                                    <input type="radio" id="guest_images_uploadNo" name="guest_images_upload"
                                        value="0" @if (old('guest_images_upload') == '0') {{ 'checked' }} @endif>
                                    <label for="guest_images_uploadNo">No</label>

                                    @if ($errors->has('guest_images_upload'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('guest_images_upload') }}
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
    {{-- <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js">
    </script> --}}
    <script>
        tinymce.init({
            selector: '.team-about',
            height: 200,
            plugins: 'textcolor colorpicker lists link',
            toolbar: "formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist | link | outdent indent  | removeformat",
            content_style: "body { background-color:#1A1A1A; color: white; border: none; }",
            

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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        // Function to toggle the visibility of a field based on radio button selection
        function toggleField(fieldName, fieldId) {
            const isRequired = $(`input[name="${fieldName}"]:checked`).val(); // Get selected value
            if (isRequired === '1') {
                $(`#${fieldId}`).show(); // Show field if value is '1'
            } else {
                $(`#${fieldId}`).hide(); // Hide field otherwise
            }
        }

        $(document).ready(function() {
            // Initialize the fields on page load
            toggleField('is_pin_protection_required', 'pinField');
            toggleField('is_watermark_required', 'watermarkField');

            // Add event listeners to radio buttons
            $('input[name="is_pin_protection_required"]').on('change', function() {
                toggleField('is_pin_protection_required', 'pinField');
            });

            $('input[name="is_watermark_required"]').on('change', function() {
                toggleField('is_watermark_required', 'watermarkField');
            });
        });
    </script>



@endsection
