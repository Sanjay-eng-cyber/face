@extends('backend.layouts.app')
@section('title', 'Create Category')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Create Category
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Create Category</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-xl-12">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.category.store') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-12 row">
                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <label for="name" class="">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        minlength="3" maxlength="30" required name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <label for="name" class="">Event</label>
                                    <select class="form-control" name="event_id" required>
                                        <option value="">Select Any Event</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}"> {{ $event->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('event_id'))
                                        <div class="text-danger" role="alert">{{ $errors->first('event_id') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="visibility" class="">Link Visibility</label><br>
                                    <div class="radio-container">
                                        <input type="radio" id="yes" name="visibility" value="1"
                                            {{ old('visibility') == '1' ? 'checked' : '' }} required>
                                        <label for="yes">Yes</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="no" name="visibility" value="0"
                                            {{ old('visibility') == '0' ? 'checked' : '' }} required>
                                        <label for="no">No</label>
                                    </div>
                                    @if ($errors->has('visibility'))
                                        <div class="text-danger" role="alert">{{ $errors->first('visibility') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="sharing" class="">Sharing</label><br>
                                    <div class="radio-container">
                                        <input type="radio" id="yes" name="sharing" value="1"
                                            {{ old('sharing') == '1' ? 'checked' : '' }} required>
                                        <label for="yes">Yes</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="no" name="sharing" value="0"
                                            {{ old('sharing') == '0' ? 'checked' : '' }} required>
                                        <label for="no">No</label>
                                    </div>
                                    @if ($errors->has('sharing'))
                                        <div class="text-danger" role="alert">{{ $errors->first('sharing') }}
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
    {{-- <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js">
    </script>
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
    </script> --}}
@endsection
