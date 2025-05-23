@extends('backend.layouts.app')
@section('title', 'Create Event')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <a href="{{ route('backend.event.index') }}" class="top-arrowbtn">
                <img src="{{ asset('backend/assets/img/prearrow.svg') }}" alt="" srcset="" class="img-fluid logo">
            </a>

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 mp-0">
                            <legend class="h2 text-clr fw-600">
                                Create Event
                            </legend>
                        </div>

                        <div
                            class="col-xl-4 col-md-6 mb-0 mb-sm-2 d-flex justify-content-start justify-content-sm-end align-it mt-1  mp-0">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider bdpd">
                                    <li class="breadcrumb-item"><a href="{{ route('backend.event.index') }}">Events</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Create Event</a>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-xl-12 col-12 mt-3 mt-lg-4">

                <form class="" method="POST" action="{{ route('backend.event.store') }}"
                    enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-12  mp-0 bottom-margin">
                            <label for="formGroupExampleInput" class="">Event Name*</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Event Name"
                                minlength="3" maxlength="250" required name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="col-xl-6 col-12  mp-0 bottom-margin">
                            <label for="formGroupExampleInput" class="">Cover Image</label>
                            <input type="file" class="form-control p-8px" id="formGroupExampleInput" name="cover_image">
                            @if ($errors->has('cover_image'))
                                <div class="text-danger" role="alert">{{ $errors->first('cover_image') }}</div>
                            @endif
                        </div>

                        

                        <div class="col-12  mp-0 bottom-margin">
                            <label for="descriptions">Description</label>
                            <textarea id="team-about" class="team-about" name="descriptions" minlength="3" maxlength="20000">{{ old('descriptions') }}</textarea>
                            @if ($errors->has('descriptions'))
                                <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-xl-3 col-6 bottom-margin cl-pr">
                            <label for="formGroupExampleInput" class="">Start Date*</label>
                            <input type="datetime-local" class="form-control" id="formGroupExampleInput" required
                                name="start_date" value="{{ old('start_date') }}">
                            @if ($errors->has('start_date'))
                                <div class="text-danger" role="alert">{{ $errors->first('start_date') }}</div>
                            @endif
                        </div>
                        <div class="col-xl-3 col-6 bottom-margin cl-pl">
                            <label for="formGroupExampleInput" class="">End Date*</label>
                            <input type="datetime-local" class="form-control" id="formGroupExampleInput" required
                                name="end_date" value="{{ old('end_date') }}">
                            @if ($errors->has('end_date'))
                                <div class="text-danger" role="alert">{{ $errors->first('end_date') }}</div>
                            @endif
                        </div>

                        <div class="col-xl-3 col-6 bottom-margin cl-pr">
                            <label for="formGroupExampleInput" class="">Link Start Date*</label>
                            <input type="datetime-local" class="form-control" id="formGroupExampleInput" required
                                name="link_start_date" value="{{ old('link_start_date') }}">
                            @if ($errors->has('link_start_date'))
                                <div class="text-danger" role="alert">{{ $errors->first('link_start_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-3 col-6 bottom-margin cl-pl">
                            <label for="formGroupExampleInput" class="">Link End Date*</label>
                            <input type="datetime-local" class="form-control" id="formGroupExampleInput" required
                                name="link_end_date" value="{{ old('link_end_date') }}">
                            @if ($errors->has('link_end_date'))
                                <div class="text-danger" role="alert">{{ $errors->first('link_end_date') }}
                                </div>
                            @endif
                        </div>


                        <div class="col-12 clm-p">
                            <div class="main-dv-grid-outer">
                                <div class="bottom-margin">
                                    <label for="descriptions">Upload Image Quality</label><br>
                                    <input type="radio" id="original" name="upload_image_quality" value="original"
                                        @if (old('upload_image_quality') == 'original') {{ 'checked' }} @endif>
                                    <label for="original" class="mb-0">Original</label>
                                    <input type="radio" id="compressed" name="upload_image_quality" value="compressed"
                                        @if (old('upload_image_quality') == 'compressed') {{ 'checked' }} @endif>
                                    <label for="compressed" class="mb-0">compressed</label>
        
                                    @if ($errors->has('upload_image_quality'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('upload_image_quality') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bottom-margin">
                                    <label for="descriptions">Guest Images Upload </label><br>
                                    <input type="radio" id="guest_images_uploadYes" name="guest_images_upload" value="1"
                                        @if (old('guest_images_upload') == '1') {{ 'checked' }} @endif>
                                    <label for="guest_images_uploadYes" class="mb-0">Yes</label>
                                    <input type="radio" id="guest_images_uploadNo" name="guest_images_upload" value="0"
                                        @if (old('guest_images_upload') == '0') {{ 'checked' }} @endif>
                                    <label for="guest_images_uploadNo" class="mb-0">No</label>

                                    @if ($errors->has('guest_images_upload'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('guest_images_upload') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bottom-margin">
                                    <label for="descriptions">Link Sharing</label><br>
                                    <input type="radio" id="link_sharingYes" name="link_sharing" value="1"
                                        @if (old('link_sharing') == '1') {{ 'checked' }} @endif>
                                    <label for="link_sharingYes" class="mb-0">Yes</label>
                                    <input type="radio" id="link_sharingNo" name="link_sharing" value="0"
                                        @if (old('link_sharing') == '0') {{ 'checked' }} @endif>
                                    <label for="link_sharingNo" class="mb-0">No</label>
        
                                    @if ($errors->has('link_sharing'))
                                        <div class="text-danger" role="alert">{{ $errors->first('link_sharing') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                           
                        </div>


                        <div class="col-12 clm-p">
                            <div class="main-dv-grid">

                                <div class="pin-protection-grid ">

                                    <div class="bottom-margin">
                                        <label for="descriptions">Is Pin Protection Required</label><br>
                                        <input type="radio" id="is_pin_protection_requiredYes" name="is_pin_protection_required"
                                            value="1" @if (old('is_pin_protection_required') == '1') {{ 'checked' }} @endif>
                                        <label for="is_pin_protection_requiredYes" class="mb-0">Yes</label>
                                        <input type="radio" id="is_pin_protection_requiredNo" name="is_pin_protection_required"
                                            value="0" @if (old('is_pin_protection_required') == '0') {{ 'checked' }} @endif>
                                        <label for="is_pin_protection_requiredNo" class="mb-0">No</label>
            
                                        @if ($errors->has('is_pin_protection_required'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('is_pin_protection_required') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div>
                                        <div class="mp-0 bottom-margin" id="pinField" style="display: none;">
                                            <label for="formGroupExampleInput" class="">Pin</label>
                                            <input type="text" class="form-control pin-width" id="pin" placeholder="Enter Pin"
                                                minlength="4" maxlength="4" name="pin" value="{{ old('pin') }}">
                                            @if ($errors->has('pin'))
                                                <div class="text-danger" role="alert">{{ $errors->first('pin') }}</div>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                                <div class="watermark-grid ">
                                    <div class="is-watermark bottom-margin">
                                            <label for="descriptions">Is Watermark Required </label><br>
                                            <input type="radio" id="is_watermark_requiredYes" name="is_watermark_required"
                                                value="1" @if (old('is_watermark_required') == '1') {{ 'checked' }} @endif>
                                            <label for="is_watermark_requiredYes" class="mb-0">Yes</label>
                                            <input type="radio" id="is_watermark_requiredNo" name="is_watermark_required"
                                                value="0" @if (old('is_watermark_required') == '0') {{ 'checked' }} @endif>
                                            <label for="is_watermark_requiredNo" class="mb-0">No</label>
                
                                            @if ($errors->has('is_watermark_required'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('is_watermark_required') }}
                                                </div>
                                            @endif

                                    </div>

                                    <div id="watermarkField" style="display: none;">

                                            <label for="formGroupExampleInput">Watermark Image</label>
                                            <input type="file" class="form-control p-8px watermarkimg-width" id="formGroupExampleInput"
                                                name="watermark_image">
                                            @if ($errors->has('watermark_image'))
                                                <div class="text-danger" role="alert">{{ $errors->first('watermark_image') }}
                                                </div>
                                            @endif

                                        
                                    </div>


                                </div>

                                <div class="visibility-ipf bottom-margin d-none d-xl-block">
                                    <label for="descriptions" >Visibility </label><br>
                                    <input type="radio" id="visibilityYes" name="visibility" value="1"
                                        @if (old('visibility') == '1') {{ 'checked' }} @endif required>
                                    <label for="visibilityYes" class="mb-0">Yes</label>
                                    <input type="radio" id="visibilityNo" name="visibility" value="0"
                                        @if (old('visibility') == '0') {{ 'checked' }} @endif required>
                                    <label for="visibilityNo" class="mb-0">No</label>
        
                                    @if ($errors->has('visibility'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('visibility') }}
                                        </div>
                                    @endif
                                </div>


                            </div>
                        </div>


                        <div class="col-12 clm-p">

                            <div class="unique-grid">
                                
        
                                <div class=" mp-0 bottom-margin">
                                    <label for="descriptions">Bulk Image Download </label><br>
                                    <input type="radio" id="bulk_image_downloadYes" name="bulk_image_download" value="1"
                                        @if (old('bulk_image_download') == '1') {{ 'checked' }} @endif>
                                    <label for="bulk_image_downloadYes" class="mb-0">Yes</label>
                                    <input type="radio" id="bulk_image_downloadNo" name="bulk_image_download" value="0"
                                        @if (old('bulk_image_download') == '0') {{ 'checked' }} @endif>
                                    <label for="bulk_image_downloadNo" class="mb-0">No</label>
        
                                    @if ($errors->has('bulk_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('bulk_image_download') }}
                                        </div>
                                    @endif
                                </div>
        
                                <div class="  mp-0 bottom-margin is-watermark">
                                    <label for="descriptions">Single Image Download </label><br>
                                    <input type="radio" id="single_image_downloadYes" name="single_image_download"
                                        value="1" @if (old('single_image_download') == '1') {{ 'checked' }} @endif>
                                    <label for="single_image_downloadYes" class="mb-0">Yes</label>
                                    <input type="radio" id="single_image_downloadNo" name="single_image_download"
                                        value="0" @if (old('single_image_download') == '0') {{ 'checked' }} @endif>
                                    <label for="single_image_downloadNo" class="mb-0">No</label>
        
                                    @if ($errors->has('single_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('single_image_download') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="  mp-0 bottom-margin  d-block d-xl-none">
                                    <div class="visibility-ipf">
                                        <label for="descriptions" >Visibility </label><br>
                                        <input type="radio" id="visibilityYes" name="visibility" value="1"
                                            @if (old('visibility') == '1') {{ 'checked' }} @endif required>
                                        <label for="visibilityYes" class="mb-0">Yes</label>
                                        <input type="radio" id="visibilityNo" name="visibility" value="0"
                                            @if (old('visibility') == '0') {{ 'checked' }} @endif required>
                                        <label for="visibilityNo" class="mb-0">No</label>
        
                                        @if ($errors->has('visibility'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('visibility') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                            </div>


                        </div>
                        

                      

                       


                    </div>
                    <div class="d-flex justify-content-lg-end">
                        <input type="submit" class="btn btn-primary mcsw wm100">
                    </div>
                </form>

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
            const field = $(`#${fieldId}`);

            if (isRequired === '1') {
                field.show(); // Show field if value is '1'
            } else {
                field.hide(); // Hide field otherwise
            }

            adjustColumns(); // Call function to adjust column sizes
        }

        function adjustColumns() {
            const pinVisible = $('#pinField').is(':visible');
            const watermarkVisible = $('#watermarkField').is(':visible');

            if (!pinVisible && !watermarkVisible) {
                $('.adjustable-col').removeClass('col-xl-2').addClass('col-xl-4'); // Expand when both are hidden
            } else {
                $('.adjustable-col').removeClass('col-xl-4').addClass('col-xl-2'); // Shrink when any is visible
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
