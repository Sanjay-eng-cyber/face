@extends('backend.layouts.app')
@section('title', 'Category - ' . $category->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1">
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                Category Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Category Details</a></li>
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
                            @if ($category->link_visibility == 1)
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Name</label><br>
                                        <p class="label-title">{{ $category->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Event</label><br>
                                        <p class="label-title">{{ $category->event->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="visibility" class="cust-title">Visibility</label><br>
                                        <div>
                                            <input type="radio" id="visibility_yes" name="visibility" value="1"
                                                {{ $category->visibility == '1' ? 'checked' : '' }}>
                                            <label for="visibility_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="visibility_no" name="visibility" value="0"
                                                {{ $category->visibility == '0' ? 'checked' : '' }}>
                                            <label for="visibility_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sharing" class="cust-title">Sharing</label><br>
                                        <div>
                                            <input type="radio" id="sharing_yes" name="sharing" value="1"
                                                {{ $category->sharing == '1' ? 'checked' : '' }}>
                                            <label for="sharing_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="sharing_no" name="sharing" value="0"
                                                {{ $category->sharing == '0' ? 'checked' : '' }}>
                                            <label for="sharing_no">No</label>
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
