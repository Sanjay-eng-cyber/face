@extends('backend.layouts.app')
@section('title', 'Create Cms user')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Create Cms User
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">
                                            Create Cms User</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-md-12">
                <div class="row m-0">
                    <div class="col-md-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.cms-user.store') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="30" required name="name"
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Role</label>
                                    <select name="role" class="form-control" id="role-select" required>
                                        <Option value="">
                                            Select Any
                                        </Option>
                                        <option value="admin" @if (old('role')) {{ 'selected' }} @endif>
                                            Admin</option>
                                        <option value="super-admin"
                                            @if (old('role')) {{ 'selected' }} @endif>Super Admin
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
                                        value="{{ old('email') }}">
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
                            </div>
                            <div class="form-group mb-3 row" id="additional-fields">
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Plan</label>
                                    <select name="plan" class="form-control">
                                        <Option value="">
                                            Select Any
                                        </Option>
                                        <option value="1"
                                            @if (old('plan')) {{ 'selected' }} @endif>
                                            Plan 1</option>
                                        <option value="2"
                                            @if (old('plan')) {{ 'selected' }} @endif>
                                            Plan 2
                                        </option>
                                    </select>
                                    @if ($errors->has('plan'))
                                        <div class="text-danger" plan="alert">{{ $errors->first('plan') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Custom Domain Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Custom Domain Name" minlength="3" maxlength="50"
                                        name="custom_domain_name" value="{{ old('custom_domain_name') }}">
                                    @if ($errors->has('custom_domain_name'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('custom_domain_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Phone No.</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Phone No" minlength="10" maxlength="10" name="phone"
                                        value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <div class="text-danger" role="alert">{{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Portfolio Website</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Portfolio Website" minlength="3" maxlength="50"
                                        name="portfolio_website" value="{{ old('portfolio_website') }}">
                                    @if ($errors->has('portfolio_website'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('portfolio_website') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Vimeo Url</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Vimeo Url" minlength="3" maxlength="50" name="vimeo_url"
                                        value="{{ old('vimeo_url') }}">
                                    @if ($errors->has('vimeo_url'))
                                        <div class="text-danger" role="alert">{{ $errors->first('vimeo_url') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Linkedin Url</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Linkedin Url" minlength="3" maxlength="50"
                                        name="linkedin_url" value="{{ old('linkedin_url') }}">
                                    @if ($errors->has('linkedin_url'))
                                        <div class="text-danger" role="alert">{{ $errors->first('linkedin_url') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Facebook Url</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Facebook Url" minlength="3" maxlength="50"
                                        name="facebook_url" value="{{ old('facebook_url') }}">
                                    @if ($errors->has('facebook_url'))
                                        <div class="text-danger" role="alert">{{ $errors->first('facebook_url') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Youtube Url</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Youtube Url" minlength="3" maxlength="50" name="youtube_url"
                                        value="{{ old('youtube_url') }}">
                                    @if ($errors->has('youtube_url'))
                                        <div class="text-danger" role="alert">{{ $errors->first('youtube_url') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Instagram Url</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Instagram Url" minlength="3" maxlength="50"
                                        name="instagram_url" value="{{ old('instagram_url') }}">
                                    @if ($errors->has('instagram_url'))
                                        <div class="text-danger" role="alert">{{ $errors->first('instagram_url') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Twitter Url</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Twitter Url" minlength="3" maxlength="50" name="twitter_url"
                                        value="{{ old('twitter_url') }}">
                                    @if ($errors->has('twitter_url'))
                                        <div class="text-danger" role="alert">{{ $errors->first('twitter_url') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="descriptions">Bio</label>
                                    <textarea id="team-about" class="team-about" name="bio" minlength="3" maxlength="20000">{{ old('bio') }}</textarea>
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role-select');
            const additionalFields = document.getElementById('additional-fields');

            function toggleFields() {
                if (roleSelect.value === 'super-admin') {
                    additionalFields.style.display = 'none';
                } else {
                    additionalFields.style.display = 'block';
                }
            }

            // Initialize toggle based on old value or default
            toggleFields();

            // Add change event listener
            roleSelect.addEventListener('change', toggleFields);
        });
    </script>
@endsection
