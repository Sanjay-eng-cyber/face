@extends('backend.layouts.app')
@section('title', 'Update Profile')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing">
        {{-- <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow" style="padding: 10px">
            <div class="widget-header">
                <div class="row justify-content-between align-items-center">
                    <div class="col-3">
                        <h5>Expenses</h5>
                    </div>
                    <div class="col-7">
                    </div>
                    <div class="col-2">
                        <p>Home -> Expenses</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-10 widget box box-shadow ">
                    <div class="statbox widget box box-shadow">
                        <h4 class="text-clr">Update Profile</h4>
                        <form class="mt-3" method="POST" action="{{ route('cms.password.submit', $user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="30" required name="name"
                                        value="{{ old('name') ?? $user->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Email</label>
                                    <input type="email" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Email" minlength="5" maxlength="40" required name="email"
                                        value="{{ old('email') ?? $user->email }}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Password</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Password" minlength="8" maxlength="16" name="password"
                                        value="{{ old('password') }}">
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="formGroupExampleInput">Confirm Password</label>
                                    <input id="password2" name="password_confirmation" type="password" class="form-control"
                                        placeholder="Confirm Password" minlength="8" maxlength="16">
                                    @if ($errors->has('password'))
                                        <div class="text-danger" role="alert">{{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @cmsUserRole('admin')
                                <div class="form-group mb-3 row" id="additional-fields">
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Custom Domain Name</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Custom Domain Name" minlength="3" maxlength="50"
                                            name="custom_domain_name"
                                            value="{{ old('custom_domain_name') ?? $user->custom_domain_name }}">
                                        @if ($errors->has('custom_domain_name'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('custom_domain_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Phone No.</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Phone No" minlength="10" maxlength="10" name="phone"
                                            value="{{ old('phone') ?? $user->phone }}" required>
                                        @if ($errors->has('phone'))
                                            <div class="text-danger" role="alert">{{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Portfolio
                                            Website</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Portfolio Website" minlength="3" maxlength="50"
                                            name="portfolio_website"
                                            value="{{ old('portfolio_website') ?? $user->portfolio_website }}">
                                        @if ($errors->has('portfolio_website'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('portfolio_website') }}
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Vimeo Url</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Vimeo Url" minlength="3" maxlength="50" name="vimeo_url"
                                            value="{{ old('vimeo_url') ?? $user->vimeo_url }}">
                                        @if ($errors->has('vimeo_url'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('vimeo_url') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Linkedin Url</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Linkedin Url" minlength="3" maxlength="50"
                                            name="linkedin_url" value="{{ old('linkedin_url') ?? $user->linkedin_url }}">
                                        @if ($errors->has('linkedin_url'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('linkedin_url') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Facebook Url</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Facebook Url" minlength="3" maxlength="50"
                                            name="facebook_url" value="{{ old('facebook_url') ?? $user->facebook_url }}">
                                        @if ($errors->has('facebook_url'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('facebook_url') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Youtube Url</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Youtube Url" minlength="3" maxlength="50" name="youtube_url"
                                            value="{{ old('youtube_url') ?? $user->youtube_url }}">
                                        @if ($errors->has('youtube_url'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('youtube_url') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Instagram Url</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Instagram Url" minlength="3" maxlength="50"
                                            name="instagram_url" value="{{ old('instagram_url') ?? $user->instagram_url }}">
                                        @if ($errors->has('instagram_url'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('instagram_url') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Twitter Url</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Twitter Url" minlength="3" maxlength="50" name="twitter_url"
                                            value="{{ old('twitter_url') ?? $user->twitter_url }}">
                                        @if ($errors->has('twitter_url'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('twitter_url') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="descriptions">Bio</label>
                                        <textarea id="team-about" class="team-about" name="bio" minlength="3" maxlength="20000">{{ old('bio') ?? $user->bio }}</textarea>
                                        @if ($errors->has('bio'))
                                            <div class="text-danger" role="alert">{{ $errors->first('bio') }}
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            @endcmsUserRole
                            <input type="submit" class="btn btn-primary ltr-space">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("html,body").css("overflow-x", "hidden");
    </script>
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
    </script>
@endsection
