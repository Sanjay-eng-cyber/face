@extends('backend.layouts.app')
@section('title', 'Share Event - ' . $event->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Share Event
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Share Event</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-xl-12">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('share.event.store') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-12 row">
                                <div class="col-xl-6 col-md-12 col-sm-12 mt-2">
                                    <div class="mb-3">
                                        <label for="email" class="">Email</label>
                                    </div>
                                    <select class="form-control tagging" name="email[]" minlength="3" maxlength="30"
                                        multiple="multiple" required>
                                    </select>
                                    @if ($errors->has('email'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    @if ($errors->has('email.*'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email.*') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-md-12 col-sm-12 mt-2">
                                    <div class="mb-3">
                                        <label for="email" class="">Email Subject</label>
                                    </div>
                                    <input type="text" class="form-control" required name="email_subject"
                                        value="Register for {{ $event->name }}">
                                    @if ($errors->has('email_subject'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email_subject') }}
                                        </div>
                                    @endif
                                </div>
                                <!-- Add More Email Button -->

                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="descriptions">Message</label>
                                    <textarea id="team-about" class="form-control team-about" name="message" minlength="3" maxlength="20000" required>{{ old('message') }}</textarea>
                                    @if ($errors->has('message'))
                                        <div class="text-danger" role="alert">{{ $errors->first('message') }}</div>
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
    {{-- <script>
     <div class="d-flex     align-items-center">
                                                <button type="button" class="btn btn-secondary" id="add-email-btn">Add More Email</button>
                                            </div>
    document.getElementById('add-email-btn').addEventListener('click', function() {
        const emailSection = document.getElementById('email-section');
        const newEmailDiv = document.createElement('div');
        newEmailDiv.classList.add('mt-2');

        newEmailDiv.innerHTML = `
            <input type="email" class="form-control mt-2" placeholder="Enter Email" minlength="3" maxlength="30" required name="email[]">
        `;

        emailSection.appendChild(newEmailDiv);
    });
</script> --}}
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
    <script>
        $(".tagging").select2({
            tags: true,
            placeholder: "Enter Emails",
        });
    </script>
@endsection
