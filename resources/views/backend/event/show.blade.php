@extends('backend.layouts.app')
@section('title', 'event - ' . $event->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1">
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                Event Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2 ">
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


            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row  mb-1">

                        <div class="col-12 mb-2  mt-2 ">
                            <div class="" style="font-weight: bold;font-size:24px;padding-bottom:20px">Find a matching
                                image from your collection</div>
                            @if ($event->link_visibility == 1)
                                <a href="http://127.0.0.1:8181/upload/{{ $event->id }}" target="_blank"
                                    style="color:blue">
                                    http://127.0.0.1:8181/upload/{{ $event->id }}
                                </a>
                            @else
                                <span>Link is not available</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="info statbox widget box box-shadow">
                <div class="row widget-header">
                    <div class="col-md-12">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Name</label><br>
                                        <p class="label-title">{{ $event->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Start Date</label><br>
                                        <p class="label-title">{{ dd_format($event->start_date, 'd-m-Y') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">End Date</label><br>
                                        <p class="label-title">{{ dd_format($event->end_date, 'd-m-Y') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="visibility" class="cust-title">Visibility</label><br>
                                        <div>
                                            <input type="radio" id="visibility_yes" name="visibility" value="1"
                                                {{ $event->visibility == '1' ? 'checked' : '' }}>
                                            <label for="visibility_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="visibility_no" name="visibility" value="0"
                                                {{ $event->visibility == '0' ? 'checked' : '' }}>
                                            <label for="visibility_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sharing" class="cust-title">Sharing</label><br>
                                        <div>
                                            <input type="radio" id="sharing_yes" name="sharing" value="1"
                                                {{ $event->sharing == '1' ? 'checked' : '' }}>
                                            <label for="sharing_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="sharing_no" name="sharing" value="0"
                                                {{ $event->sharing == '0' ? 'checked' : '' }}>
                                            <label for="sharing_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="single_image_download" class="cust-title">Single Image
                                            Download</label><br>
                                        <div>
                                            <input type="radio" id="visibility_yes" name="single_image_download"
                                                value="1" {{ $event->single_image_download == '1' ? 'checked' : '' }}>
                                            <label for="single_image_download_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="single_image_download_no" name="single_image_download"
                                                value="0" {{ $event->single_image_download == '0' ? 'checked' : '' }}>
                                            <label for="single_image_download_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bulk_image_download" class="cust-title">Bulk Image Download</label><br>
                                        <div>
                                            <input type="radio" id="bulk_image_download_yes" name="bulk_image_download"
                                                value="1" {{ $event->bulk_image_download == '1' ? 'checked' : '' }}>
                                            <label for="bulk_image_download_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="bulk_image_download_no" name="bulk_image_download"
                                                value="0" {{ $event->bulk_image_download == '0' ? 'checked' : '' }}>
                                            <label for="bulk_image_download_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="download_size" class="cust-title">Download Size</label><br>
                                        <div>
                                            <input type="radio" id="download_size" name="download_size"
                                                value="original"
                                                {{ $event->download_size == 'original' ? 'checked' : '' }}>
                                            <label for="download_size_yes">Original</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="download_size_no" name="download_size"
                                                value="1600"
                                                {{ $event->download_size == '1600' ? 'checked' : '' }}>
                                            <label for="download_size_no">1600 px</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title"
                                            class="label-title">Description</label><br>
                                        <p class="label-title">{{ $event->descriptions }}</p>
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
        <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"
            type="text/css" />
    @endsection
