@extends('backend.layouts.app')
@section('title', 'Edit Cms User')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Edit Cms User
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">
                                            Edit Cms User</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-md-12">
                <div class="row m-0">
                    <div class="col-md-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.cms-user.update', $cmsUser->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="30" required name="name"
                                        value="{{ old('name') ?? $cmsUser->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Role</label>
                                    <select name="role" class="form-control" required>
                                        <Option value="">
                                            Select Any
                                        </Option>
                                        <option value="admin" @if (old('role') == 'admin' || $cmsUser->role == 'admin') {{ 'selected' }} @endif>
                                            Admin</option>
                                        <option value="super-admin"
                                            @if (old('role') == 'super-admin' || $cmsUser->role == 'super-admin') {{ 'selected' }} @endif>Super Admin
                                        </option>
                                    </select>
                                    @if ($errors->has('role'))
                                        <div class="text-danger" role="alert">{{ $errors->first('role') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Email</label>
                                    <input type="email" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Email" minlength="5" maxlength="40" required name="email"
                                        value="{{ old('email') ?? $cmsUser->email }}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Password</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Password" minlength="8" maxlength="16" required name="password"
                                        value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <div class="text-danger" role="alert">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Custom Domain Name</label>
                                    <input type="custom_domain_name" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Custom Domain Name" minlength="3" maxlength="50"
                                        name="custom_domain_name"
                                        value="{{ old('custom_domain_name') ?? $cmsUser->custom_domain_name }}">
                                    @if ($errors->has('custom_domain_name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('custom_domain_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Phone No.</label>
                                    <input type="phone" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Phone No" minlength="10" maxlength="10" name="phone"
                                        value="{{ old('phone') ?? $cmsUser->phone }}">
                                    @if ($errors->has('phone'))
                                        <div class="text-danger" role="alert">{{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Portfolio Website</label>
                                    <input type="portfolio_website" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Portfolio Website" minlength="3" maxlength="50"
                                        name="portfolio_website"
                                        value="{{ old('portfolio_website') ?? $cmsUser->portfolio_website }}">
                                    @if ($errors->has('portfolio_website'))
                                        <div class="text-danger" role="alert">{{ $errors->first('portfolio_website') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="descriptions">Bio</label>
                                    <textarea id="team-about" class="team-about" name="bio" minlength="3" maxlength="20000">{{ old('bio') ?? $cmsUser->bio }}</textarea>
                                    @if ($errors->has('bio'))
                                        <div class="text-danger" role="alert">{{ $errors->first('bio') }}
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
