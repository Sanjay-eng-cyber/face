@extends('backend.layouts.app')
@section('title', 'Edit event - ' . $event->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                Edit Event
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Edit Event</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-xl-12">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.event.update', $event->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-12 row">
                                <div class="col-xl-6 col-md-12 col-sm-12">
                                    <label for="name" class="">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        minlength="3" maxlength="30" required name="name"
                                        value="{{ old('name') ?? $event->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <label for="start_date" class="">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" required name="start_date"
                                        value="{{ old('start_date') ?? dd_format($event->start_date, 'Y-m-d') }}">
                                    @if ($errors->has('start_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('start_date') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <label for="end_date" class="">End Date</label>
                                    <input type="date" class="form-control" id="end_date" required name="end_date"
                                        value="{{ old('end_date') ?? dd_format($event->end_date, 'Y-m-d') }}">
                                    @if ($errors->has('end_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('end_date') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="visibility" class="">Link Visibility</label><br>
                                    <div class="radio-container">
                                        <input type="radio" id="yes" name="visibility" value="1"
                                            {{ (old('visibility') == 1 ? 'checked' : '' ?? $event->visibility == 1) ? 'checked' : '' }}
                                            required>
                                        <label for="yes">Yes</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="no" name="visibility" value="0"
                                            {{ (old('visibility') == 0 ? 'checked' : '' ?? $event->visibility == 0) ? 'checked' : '' }}
                                            required>
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
                                            {{ (old('sharing') == 1 ? 'checked' : '' ?? $event->sharing == 1) ? 'checked' : '' }}
                                            required>
                                        <label for="yes">Yes</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="no" name="sharing" value="0"
                                            {{ (old('sharing') == 0 ? 'checked' : '' ?? $event->sharing == 0) ? 'checked' : '' }}
                                            required>
                                        <label for="no">No</label>
                                    </div>
                                    @if ($errors->has('sharing'))
                                        <div class="text-danger" role="alert">{{ $errors->first('sharing') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="single_image_download" class="">Single Image Download</label><br>
                                    <div class="radio-container">
                                        <input type="radio" id="yes" name="single_image_download" value="1"
                                            {{ (old('single_image_download') == 1 ? 'checked' : '' ?? $event->single_image_download == 1) ? 'checked' : '' }}
                                            required>
                                        <label for="yes">Yes</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="no" name="single_image_download" value="0"
                                            {{ (old('single_image_download') == 0 ? 'checked' : '' ?? $event->single_image_download == 0) ? 'checked' : '' }}
                                            required>
                                        <label for="no">No</label>
                                    </div>
                                    @if ($errors->has('single_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('single_image_download') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="bulk_image_download" class="">Bulk_Image Download</label><br>
                                    <div class="radio-container">
                                        <input type="radio" id="yes" name="bulk_image_download" value="1"
                                            {{ (old('bulk_image_download') == 1 ? 'checked' : '' ?? $event->bulk_image_download == 1) ? 'checked' : '' }}
                                            required>
                                        <label for="yes">Yes</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="no" name="bulk_image_download" value="0"
                                            {{ (old('bulk_image_download') == 0 ? 'checked' : '' ?? $event->bulk_image_download == 0) ? 'checked' : '' }}
                                            required>
                                        <label for="no">No</label>
                                    </div>
                                    @if ($errors->has('bulk_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('bulk_image_download') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="bulk_image_download" class="">Download Size</label><br>
                                    <div class="radio-container">
                                        <input type="radio" id="download_size" name="download_size" value="original"
                                            {{ (old('download_size') == 'original' ? 'checked' : '' ?? $event->download_size == 'original') ? 'checked' : '' }}
                                            required>
                                        <label for="original">original</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="no" name="download_size" value="1600"
                                            {{ (old('download_size') == 1600 ? 'checked' : '' ?? $event->download_size == 1600) ? 'checked' : '' }}
                                            required>
                                        <label for="1600">1600 px</label>
                                    </div>
                                    @if ($errors->has('download_size'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('download_size') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="descriptions">Description</label>
                                    <textarea id="team-about" class="form-control team-about" name="descriptions" minlength="3" maxlength="20000"
                                        required>{{ old('descriptions') ?? $event->descriptions }}</textarea>
                                    @if ($errors->has('descriptions'))
                                        <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
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
    </div>
@endsection
@section('js')
@endsection
