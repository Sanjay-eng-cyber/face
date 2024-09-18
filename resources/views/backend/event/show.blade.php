@extends('backend.layouts.app')
@section('title', 'Event - ' . $event->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h4">
                                Event Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Event Details</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info statbox widget box box-shadow">
                <div class="row widget-header">
                    <div class="col-md-11">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Name</label><br>
                                                <p class="label-title">{{ $event->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Start
                                                    Date</label><br>
                                                <p class="label-title">{{ dd_format($event->start_date, 'd-m-y h:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">End
                                                    Date</label><br>
                                                <p class="label-title">{{ dd_format($event->end_date, 'd-m-y h:i a') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Download
                                                    Size</label><br>
                                                {{-- <p class="label-title">{{ ucfirst($event->download_size) }}</p> --}}
                                                <p class="text-white badge badge-primary">{{ ucfirst($event->download_size) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Sharing</label><br>
                                                @if ($event->sharing)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                    {{-- @elseif ($event->status == '')
                                                    <label
                                                        class="text-white badge badge-warning">{{ $event->status }}</label>
                                                @elseif ($event->status == '')
                                                    <label
                                                        class="text-white badge badge-success">{{ $event->status }}</label> --}}
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Single Image
                                                    Download</label><br>
                                                @if ($event->single_image_download)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Bulk Image
                                                    Download</label><br>
                                                @if ($event->bulk_image_download)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree2" class="label-title cust-title">Thumbnail
                                                    Image</label><br>
                                                <span id="lightgallery1"><a class="text-primary font-weight-bold"
                                                        href="{{ asset('storage/images/products/thumbnails/' . $event->thumbnail_image) }}">View</a>
                                                </span>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Other
                                                    Images</label><br>
                                                <div class="d-flex flex-wrap">
                                                    <span id="lightgallery2">
                                                        @forelse ($event->medias()->get()  as $key => $media)
                                                            @if ($key == 0)
                                                                <a href="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                                    type="button"
                                                                    class="text-primary font-weight-bold float-right">
                                                                    View
                                                                </a>
                                                            @else
                                                                <a href="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                                    type="button" class="d-none">
                                                                    View
                                                                </a>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                    </span>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Attribute</label><br>
                                                @forelse ($product_attributes as $product_attribute)
                                                    <p class="label-title">
                                                        {{ $product_attribute->attribute->name . ' - ' . $product_attribute->value->name }}
                                                    </p>
                                                @empty
                                                    <p class="label-title">---</p>
                                                @endforelse
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Short
                                                    Description</label><br>
                                                <p class="label-title">{{ $event->short_descriptions ?? '---' }}</p>
                                            </div>
                                        </div> --}}

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Description</label><br>
                                                <p class="label-title">{!! $event->descriptions !!}</p>
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
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}"></script>
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
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
