@extends('backend.layouts.app')
@section('title', 'Event - ' . $event->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1 mp-0">
                            <legend class="h2 text-clr fw-600 ">
                                Event Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-lg-end align-it mt-1 mp-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Event Details</a>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>

            <div class="info statbox widget box box-shadow mt-3">
                <div class="row widget-header p-smm-0">
                    <div class="col-md-11 p-smm-0">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-12 p-smm-0">

                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Name</label><br>
                                                <p class="label-title">{{ $event->name }}</p>
                                            </div>
                                        </div>
                                        @if ($event->cover_image)
                                            <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Cover
                                                        Image</label><br>
                                                    <div id="lightgallery_one">
                                                        <a href="{{ asset('storage/images/events/' . $event->cover_image) }}"
                                                            target="blank">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($event->watermark_image)
                                            <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Watermark
                                                        Image</label><br>
                                                    <div id="lightgallery_one">
                                                        <a href="{{ asset('storage/images/events/watermark_image/' . $event->watermark_image) }}"
                                                            target="blank" style="color: #C7C6CC">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Start
                                                    Date</label><br>
                                                <p class="label-title">
                                                    {{ dd_format($event->start_date, 'd-m-y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">End
                                                    Date</label><br>
                                                <p class="label-title">{{ dd_format($event->end_date, 'd-m-y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Link Start
                                                    Date</label><br>
                                                <p class="label-title">
                                                    {{ dd_format($event->link_start_date, 'd-m-y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Link End
                                                    Date</label><br>
                                                <p class="label-title">
                                                    {{ dd_format($event->link_end_date, 'd-m-y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Upload
                                                    Image
                                                    Quality</label><br>
                                                {{-- <p class="label-title">{{ ucfirst($event->download_size) }}</p> --}}
                                                <p class="text-white badge badge-primary">
                                                    {{ ucfirst($event->upload_image_quality ?? '----') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Link
                                                    Sharing</label><br>
                                                @if ($event->link_sharing)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Is Pin
                                                    Protection Required</label><br>
                                                @if ($event->is_pin_protection_required)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Visibility</label><br>
                                                @if ($event->visibility)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Pin</label><br>
                                                {{-- <p class="label-title">{{ ucfirst($event->download_size) }}</p> --}}
                                                <p class="text-white badge badge-primary">
                                                    {{ $event->pin ?? '----' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Single
                                                    Image
                                                    Download</label><br>
                                                @if ($event->single_image_download)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Bulk
                                                    Image
                                                    Download</label><br>
                                                @if ($event->bulk_image_download)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Guest
                                                    Images
                                                    Upload</label><br>
                                                @if ($event->guest_images_upload)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Is
                                                    Watermark
                                                    Required</label><br>
                                                @if ($event->is_watermark_required)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        @cmsUserRole('admin')
                                            <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Event
                                                        Share
                                                        URL</label><br>
                                                    @if (session('shared_url'))
                                                        <p class="label-title">
                                                            <a target="_blank"
                                                                href="{{ session('shared_url') }}">{{ session('shared_url') }}</a>
                                                            <i class="far fa-clone cursor-pointer"
                                                                onclick="copyToClipboard('{{ session('shared_url') }}')"></i>
                                                        </p>
                                                    @else
                                                        <form method="Post"
                                                            action="{{ route('backend.event.url', $event->id) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Generate Event
                                                                Url</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endcmsUserRole
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Uploaded
                                                    Images Count</label><br>
                                                {{-- <p class="label-title">{{ ucfirst($event->download_size) }}</p> --}}
                                                <p class="text-white badge badge-primary">
                                                    {{ $galleryImagesCount ?? '----' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Uploaded
                                                    Images Size</label><br>
                                                {{-- <p class="label-title">{{ ucfirst($event->download_size) }}</p> --}}
                                                <p class="text-white badge badge-primary">
                                                    {{ $galleryImagesFileSize ?? '----' }} GB</p>
                                            </div>
                                        </div>
                                        {{-- @if (session('shared_url'))
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Event
                                                        Url</label><br>
                                                    <div class="" id="eventUrl">
                                                        {{ session('shared_url') }}
                                                    </div>
                                                </div>
                                                <button class="btn btn-secondary mt-2" onclick="copyEventUrl()">Copy Event
                                                    Share URL</button>
                                            </div>
                                        @endif --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-12 p-smm-0">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Descriptions</label><br>
                                                @if ($event->descriptions)
                                                    <p class="label-title">{!! $event->descriptions !!}</p>
                                                @else
                                                    <p class="label-title">---</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="widget-content widget-content-area">

            </div> --}}
        </div>
    </div>
@endsection
@section('cdn')
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="{{ asset('plugins/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('plugins/lightgallery/js/lg-zoom.js') }}"></script>>
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            let activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('a[href="' + activeTab + '"]').tab('show');
            }
        })
    </script>
    <link type=" text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}">
    </script>
    <script src="{{ asset('js/lg-zoom.min.js') }}"></script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            // lightGallery(document.getElementById('lightgallery1'), {
            //     speed: 500,
            //     download: false,
            //     thumbnail: true,
            // });
            // lightGallery(document.getElementById('lightgallery2'), {
            //     speed: 500,
            //     download: false,
            //     thumbnail: true,
            // });
            // getValues();
        });

        function copyToClipboard(text) {
            if (window.clipboardData && window.clipboardData.setData) {
                // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
                return window.clipboardData.setData("Text", text);

            } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
                var textarea = document.createElement("textarea");
                textarea.textContent = text;
                textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    document.execCommand("copy"); // Security exception may be thrown by some browsers.
                    Snackbar.show({
                        text: 'Link Copied',
                        pos: 'top-right',
                        actionTextColor: '#fff',
                        backgroundColor: '#1abc9c'
                    });
                } catch (ex) {
                    console.warn("Copy to clipboard failed.", ex);
                    return false;
                } finally {
                    document.body.removeChild(textarea);
                }
            }
        }
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
