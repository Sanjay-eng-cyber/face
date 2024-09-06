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
                                    <label for="date" class="">Date</label>
                                    <input type="date" class="form-control" id="date" required name="date"
                                        value="{{ old('date') ?? $event->date }}">
                                    @if ($errors->has('date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('date') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="link_visibility" class="">Link Visibility</label><br>

                                    {{-- <label for="yes" class="">Yes</label>
                                    <input type="radio" id="yes" name="link_visibility" value="1"
                                        {{ $event->link_visibility == 1 ? 'checked' : '' }} required><br>

                                    <label for="no" class="">No</label>
                                    <input type="radio" id="no" name="link_visibility" value="0"
                                        {{ $event->link_visibility == 0 ? 'checked' : '' }} required> --}}
                                    <div class="radio-container">
                                        <input type="radio" id="yes" name="link_visibility" value="1"
                                            {{ $event->link_visibility == 1 ? 'checked' : '' }} required>
                                        <label for="yes">Yes</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="no" name="link_visibility" value="0"
                                            {{ $event->link_visibility == 0 ? 'checked' : '' }} required>
                                        <label for="no">No</label>
                                    </div>
                                    @if ($errors->has('link_visibility'))
                                        <div class="text-danger" role="alert">{{ $errors->first('link_visibility') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 mt-2">
                                    <label for="descriptions">Description</label>
                                    <textarea id="team-about" class="form-control team-about" name="descriptions" minlength="3" maxlength="20000" required>{{ old('descriptions') ?? $event->descriptions }}</textarea>
                                    @if ($errors->has('descriptions'))
                                        <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}</div>
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
