@extends('backend.layouts.app')
@section('title', 'Edit Event')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Edit Event
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">
                                            Edit Event</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-xl-12 col-md-10">
                <div class="row m-0">
                    <div class="col-md-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.event.update', $event->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Name*</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="250" required name="name"
                                        value="{{ old('name') ?? $event->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Cover Image</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput"
                                        name="cover_image">
                                    <div id="lightgallery_one" class="text-end">
                                        <a href="{{ asset('storage/images/events/' . $event->cover_image) }}">View</a>
                                    </div>
                                    @if ($errors->has('cover_image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('cover_image') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Watermark Image</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput"
                                        name="watermark_image">
                                    <div id="lightgallery_two" class="text-end">
                                        <a
                                            href="{{ asset('storage/images/events/watermark_image/' . $event->watermark_image) }}">View</a>
                                    </div>
                                    @if ($errors->has('watermark_image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('watermark_image') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">Start Date*</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput" required
                                        name="start_date"
                                        value="{{ old('start_date') ?? dd_format($event->start_date, 'Y-m-d') }}">
                                    @if ($errors->has('start_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('start_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="formGroupExampleInput" class="">End Date*</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput" required
                                        name="end_date"
                                        value="{{ old('end_date') ?? dd_format($event->end_date, 'Y-m-d') }}">
                                    @if ($errors->has('end_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('end_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="descriptions">Description</label>
                                    <textarea id="team-about" class="team-about" name="descriptions" minlength="3" maxlength="20000">{{ old('descriptions') ?? $event->descriptions }}</textarea>
                                    @if ($errors->has('descriptions'))
                                        <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Download Size :</label><br>
                                    @if (old('download_size'))
                                        <input type="radio" id="original" name="download_size" value="original"
                                            @if (old('download_size') == 'original') {{ 'checked' }} @endif required>
                                        <label for="original">Original</label>
                                        <input type="radio" id="1600" name="download_size" value="1600"
                                            @if (old('download_size') == '1600') {{ 'checked' }} @endif required>
                                        <label for="1600">1600 px</label>
                                    @else
                                        <input type="radio" id="original" name="download_size" value="original"
                                            @if ($event->download_size == 'original') {{ 'checked' }} @endif required>
                                        <label for="original">Original</label>
                                        <input type="radio" id="1600" name="download_size" value="1600"
                                            @if ($event->download_size == '1600') {{ 'checked' }} @endif required>
                                        <label for="1600">1600 px</label>
                                    @endif

                                    @if ($errors->has('download_size'))
                                        <div class="text-danger" role="alert">{{ $errors->first('download_size') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Sharing :</label><br>
                                    @if (old('sharing'))
                                        <input type="radio" id="sharingYes" name="sharing" value="1"
                                            @if (old('sharing') == '1') {{ 'checked' }} @endif required>
                                        <label for="sharingYes">Yes</label>
                                        <input type="radio" id="sharingNo" name="sharing" value="0"
                                            @if (old('sharing') == '0') {{ 'checked' }} @endif required>
                                        <label for="sharingNo">No</label>
                                    @else
                                        <input type="radio" id="sharingYes" name="sharing" value="1"
                                            @if ($event->sharing == '1') {{ 'checked' }} @endif required>
                                        <label for="sharingYes">Yes</label>
                                        <input type="radio" id="sharingNo" name="sharing" value="0"
                                            @if ($event->sharing == '0') {{ 'checked' }} @endif required>
                                        <label for="sharingNo">No</label>
                                    @endif

                                    @if ($errors->has('sharing'))
                                        <div class="text-danger" role="alert">{{ $errors->first('sharing') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Visibility :</label><br>
                                    @if (old('visibility'))
                                        <input type="radio" id="visibilityYes" name="visibility" value="1"
                                            @if (old('visibility') == '1') {{ 'checked' }} @endif required>
                                        <label for="visibilityYes">Yes</label>
                                        <input type="radio" id="visibilityNo" name="visibility" value="0"
                                            @if (old('visibility') == '0') {{ 'checked' }} @endif required>
                                        <label for="visibilityNo">No</label>
                                    @else
                                        <input type="radio" id="visibilityYes" name="visibility" value="1"
                                            @if ($event->visibility == '1') {{ 'checked' }} @endif required>
                                        <label for="visibilityYes">Yes</label>
                                        <input type="radio" id="visibilityNo" name="visibility" value="0"
                                            @if ($event->visibility == '0') {{ 'checked' }} @endif required>
                                        <label for="visibilityNo">No</label>
                                    @endif

                                    @if ($errors->has('visibility'))
                                        <div class="text-danger" role="alert">{{ $errors->first('visibility') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Single Image Download :</label><br>
                                    @if (old('single_image_download'))
                                        <input type="radio" id="single_image_downloadYes" name="single_image_download"
                                            value="1" @if (old('single_image_download') == '1') {{ 'checked' }} @endif
                                            required>
                                        <label for="single_image_downloadYes">Yes</label>
                                        <input type="radio" id="single_image_downloadNo" name="single_image_download"
                                            value="0" @if (old('single_image_download') == '0') {{ 'checked' }} @endif
                                            required>
                                        <label for="single_image_downloadNo">No</label>
                                    @else
                                        <input type="radio" id="single_image_downloadYes" name="single_image_download"
                                            value="1" @if ($event->single_image_download == '1') {{ 'checked' }} @endif
                                            required>
                                        <label for="single_image_downloadYes">Yes</label>
                                        <input type="radio" id="single_image_downloadNo" name="single_image_download"
                                            value="0" @if ($event->single_image_download == '0') {{ 'checked' }} @endif
                                            required>
                                        <label for="single_image_downloadNo">No</label>
                                    @endif

                                    @if ($errors->has('single_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('single_image_download') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Bulk Image Download :</label><br>

                                    @if (old('bulk_image_download'))
                                        <input type="radio" id="bulk_image_downloadYes" name="bulk_image_download"
                                            value="1" @if (old('bulk_image_download') == '1') {{ 'checked' }} @endif
                                            required>
                                        <label for="bulk_image_downloadYes">Yes</label>
                                        <input type="radio" id="bulk_image_downloadNo" name="bulk_image_download"
                                            value="0" @if (old('bulk_image_download') == '0') {{ 'checked' }} @endif
                                            required>
                                        <label for="bulk_image_downloadNo">No</label>
                                    @else
                                        <input type="radio" id="bulk_image_downloadYes" name="bulk_image_download"
                                            value="1" @if ($event->bulk_image_download == '1') {{ 'checked' }} @endif
                                            required>
                                        <label for="bulk_image_downloadYes">Yes</label>
                                        <input type="radio" id="bulk_image_downloadNo" name="bulk_image_download"
                                            value="0" @if ($event->bulk_image_download == '0') {{ 'checked' }} @endif
                                            required>
                                        <label for="bulk_image_downloadNo">No</label>
                                    @endif

                                    @if ($errors->has('bulk_image_download'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('bulk_image_download') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Email Registration :</label><br>

                                    @if (old('bulk_image_download'))
                                        <input type="radio" id="email_registrationYes" name="email_registration"
                                            value="1" @if (old('email_registration') == '1') {{ 'checked' }} @endif>
                                        <label for="email_registrationYes">Yes</label>
                                        <input type="radio" id="email_registrationNo" name="email_registration"
                                            value="0" @if (old('email_registration') == '0') {{ 'checked' }} @endif>
                                        <label for="email_registrationNo">No</label>
                                    @else
                                        <input type="radio" id="email_registrationYes" name="email_registration"
                                            value="1" @if ($event->email_registration == '1') {{ 'checked' }} @endif>
                                        <label for="email_registrationYes">Yes</label>
                                        <input type="radio" id="email_registrationNo" name="email_registration"
                                            value="0" @if ($event->email_registration == '0') {{ 'checked' }} @endif>
                                        <label for="email_registrationNo">No</label>
                                    @endif

                                    @if ($errors->has('email_registration'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('email_registration') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Social Sharing Buttons :</label><br>

                                    @if (old('social_sharing_buttons'))
                                        <input type="radio" id="social_sharing_buttonsYes"
                                            name="social_sharing_buttons" value="1"
                                            @if (old('social_sharing_buttons') == '1') {{ 'checked' }} @endif>
                                        <label for="social_sharing_buttonsYes">Yes</label>
                                        <input type="radio" id="social_sharing_buttonsNo" name="social_sharing_buttons"
                                            value="0" @if (old('social_sharing_buttons') == '0') {{ 'checked' }} @endif>
                                        <label for="social_sharing_buttonsNo">No</label>
                                    @else
                                        <input type="radio" id="social_sharing_buttonsYes"
                                            name="social_sharing_buttons" value="1"
                                            @if ($event->social_sharing_buttons == '1') {{ 'checked' }} @endif>
                                        <label for="social_sharing_buttonsYes">Yes</label>
                                        <input type="radio" id="social_sharing_buttonsNo" name="social_sharing_buttons"
                                            value="0" @if ($event->social_sharing_buttons == '0') {{ 'checked' }} @endif>
                                        <label for="social_sharing_buttonsNo">No</label>
                                    @endif

                                    @if ($errors->has('social_sharing_buttons'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('social_sharing_buttons') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Print Store :</label><br>

                                    @if (old('print_store'))
                                        <input type="radio" id="print_storeYes" name="print_store" value="1"
                                            @if (old('print_store') == '1') {{ 'checked' }} @endif>
                                        <label for="print_storeYes">Yes</label>
                                        <input type="radio" id="print_storeNo" name="print_store" value="0"
                                            @if (old('print_store') == '0') {{ 'checked' }} @endif>
                                        <label for="print_storeNo">No</label>
                                    @else
                                        <input type="radio" id="print_storeYes" name="print_store" value="1"
                                            @if ($event->print_store == '1') {{ 'checked' }} @endif>
                                        <label for="print_storeYes">Yes</label>
                                        <input type="radio" id="print_storeNo" name="print_store" value="0"
                                            @if ($event->print_store == '0') {{ 'checked' }} @endif>
                                        <label for="print_storeNo">No</label>
                                    @endif

                                    @if ($errors->has('print_store'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('print_store') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Mobile Field :</label><br>

                                    @if (old('mobile_field'))
                                        <input type="radio" id="mobile_fieldYes" name="mobile_field" value="1"
                                            @if (old('mobile_field') == '1') {{ 'checked' }} @endif>
                                        <label for="mobile_fieldYes">Yes</label>
                                        <input type="radio" id="mobile_fieldNo" name="mobile_field" value="0"
                                            @if (old('mobile_field') == '0') {{ 'checked' }} @endif>
                                        <label for="mobile_fieldNo">No</label>
                                    @else
                                        <input type="radio" id="mobile_fieldYes" name="mobile_field" value="1"
                                            @if ($event->mobile_field == '1') {{ 'checked' }} @endif>
                                        <label for="mobile_fieldYes">Yes</label>
                                        <input type="radio" id="mobile_fieldNo" name="mobile_field" value="0"
                                            @if ($event->mobile_field == '0') {{ 'checked' }} @endif>
                                        <label for="mobile_fieldNo">No</label>
                                    @endif

                                    @if ($errors->has('mobile_field'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('mobile_field') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Guest Upload :</label><br>

                                    @if (old('guest_upload'))
                                        <input type="radio" id="guest_uploadYes" name="guest_upload" value="1"
                                            @if (old('guest_upload') == '1') {{ 'checked' }} @endif>
                                        <label for="guest_uploadYes">Yes</label>
                                        <input type="radio" id="guest_uploadNo" name="guest_upload" value="0"
                                            @if (old('guest_upload') == '0') {{ 'checked' }} @endif>
                                        <label for="guest_uploadNo">No</label>
                                    @else
                                        <input type="radio" id="guest_uploadYes" name="guest_upload" value="1"
                                            @if ($event->guest_upload == '1') {{ 'checked' }} @endif>
                                        <label for="guest_uploadYes">Yes</label>
                                        <input type="radio" id="guest_uploadNo" name="guest_upload" value="0"
                                            @if ($event->guest_upload == '0') {{ 'checked' }} @endif>
                                        <label for="guest_uploadNo">No</label>
                                    @endif

                                    @if ($errors->has('guest_upload'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('guest_upload') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Password Protection :</label><br>

                                    @if (old('password_protection'))
                                        <input type="radio" id="password_protectionYes" name="password_protection"
                                            value="1" @if (old('password_protection') == '1') {{ 'checked' }} @endif>
                                        <label for="password_protectionYes">Yes</label>
                                        <input type="radio" id="password_protectionNo" name="password_protection"
                                            value="0" @if (old('password_protection') == '0') {{ 'checked' }} @endif>
                                        <label for="password_protectionNo">No</label>
                                    @else
                                        <input type="radio" id="password_protectionYes" name="password_protection"
                                            value="1" @if ($event->password_protection == '1') {{ 'checked' }} @endif>
                                        <label for="password_protectionYes">Yes</label>
                                        <input type="radio" id="password_protectionNo" name="password_protection"
                                            value="0" @if ($event->password_protection == '0') {{ 'checked' }} @endif>
                                        <label for="password_protectionNo">No</label>
                                    @endif

                                    @if ($errors->has('password_protection'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('password_protection') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Password :</label><br>
                                    <input type="password" id="password" name="password" class="form-control"
                                        value="{{ old('password') }}" minlength="8" maxlength="16">
                                    @if ($errors->has('password'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Image Share :</label><br>

                                    @if (old('image_share'))
                                        <input type="radio" id="image_shareYes" name="image_share" value="1"
                                            @if (old('image_share') == '1') {{ 'checked' }} @endif>
                                        <label for="image_shareYes">Yes</label>
                                        <input type="radio" id="image_shareNo" name="image_share" value="0"
                                            @if (old('image_share') == '0') {{ 'checked' }} @endif>
                                        <label for="image_shareNo">No</label>
                                    @else
                                        <input type="radio" id="image_shareYes" name="image_share" value="1"
                                            @if ($event->share_image == '1') {{ 'checked' }} @endif>
                                        <label for="image_shareYes">Yes</label>
                                        <input type="radio" id="image_shareNo" name="image_share" value="0"
                                            @if ($event->share_image == '0') {{ 'checked' }} @endif>
                                        <label for="image_shareNo">No</label>
                                    @endif

                                    @if ($errors->has('image_share'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('image_share') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Watermark :</label><br>

                                    @if (old('watermark'))
                                        <input type="radio" id="watermarkYes" name="watermark" value="1"
                                            @if (old('watermark') == '1') {{ 'checked' }} @endif>
                                        <label for="watermarkYes">Yes</label>
                                        <input type="radio" id="watermarkNo" name="watermark" value="0"
                                            @if (old('watermark') == '0') {{ 'checked' }} @endif>
                                        <label for="watermarkNo">No</label>
                                    @else
                                        <input type="radio" id="watermarkYes" name="watermark" value="1"
                                            @if ($event->watermark == '1') {{ 'checked' }} @endif>
                                        <label for="watermarkYes">Yes</label>
                                        <input type="radio" id="watermarkNo" name="watermark" value="0"
                                            @if ($event->watermark == '0') {{ 'checked' }} @endif>
                                        <label for="watermarkNo">No</label>
                                    @endif

                                    @if ($errors->has('watermark'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('watermark') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Rounded Corners :</label><br>
                                    @if (old('rounded_corner'))
                                        <input type="radio" id="rounded_cornerYes" name="rounded_corner"
                                            value="1" @if (old('rounded_corner')) {{ 'checked' }} @endif>
                                        <label for="rounded_cornerYes">Yes</label>
                                        <input type="radio" id="rounded_cornerNo" name="rounded_corner" value="0"
                                            @if (old('rounded_corner')) {{ 'checked' }} @endif>
                                        <label for="rounded_cornerNo">No</label>
                                    @else
                                        <input type="radio" id="rounded_cornerYes" name="rounded_corner"
                                            value="1" @if ($event->rounded_corner == '1') {{ 'checked' }} @endif>
                                        <label for="rounded_cornerYes">Yes</label>
                                        <input type="radio" id="rounded_cornerNo" name="rounded_corner" value="0"
                                            @if ($event->rounded_corner == '0') {{ 'checked' }} @endif>
                                        <label for="rounded_cornerNo">No</label>
                                    @endif

                                    @if ($errors->has('rounded_corner'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('rounded_corner') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Grid Spacing :</label><br>
                                    <select class="form-control" name="grid_spacing">
                                        <option value="">Select Any</option>
                                        @if (old('grid_spacing'))
                                            <option value="small" {{ old('grid_spacing') == 'small' ? 'selected' : '' }}>
                                                Small</option>
                                            <option value="regular"
                                                {{ old('grid_spacing') == 'regular' ? 'selected' : '' }}>
                                                Regular</option>
                                            <option value="large" {{ old('grid_spacing') == 'large' ? 'selected' : '' }}>
                                                Large</option>
                                        @else
                                            <option value="small"
                                                {{ $event->grid_spacing == 'small' ? 'selected' : '' }}>
                                                Small</option>
                                            <option value="regular"
                                                {{ $event->grid_spacing == 'regular' ? 'selected' : '' }}>
                                                Regular</option>
                                            <option value="large"
                                                {{ $event->grid_spacing == 'large' ? 'selected' : '' }}>
                                                Large</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('grid_spacing'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('grid_spacing') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Grid Layout :</label><br>
                                    <select class="form-control" name="grid_layout">
                                        <option value="">Select Any</option>
                                        @if (old('grid_layout'))
                                            <option value="vertical"
                                                {{ old('grid_layout') == 'vertical' ? 'selected' : '' }}>
                                                Vertical</option>
                                            <option value="horizontal"
                                                {{ old('grid_layout') == 'horizontal' ? 'selected' : '' }}>
                                                Horizontal</option>
                                        @else
                                            <option value="vertical"
                                                {{ $event->grid_layout == 'vertical' ? 'selected' : '' }}>
                                                Vertical</option>
                                            <option value="horizontal"
                                                {{ $event->grid_layout == 'horizontal' ? 'selected' : '' }}>
                                                Horizontal</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('grid_layout'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('grid_layout') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Thumbnails :</label><br>
                                    <select class="form-control" name="thumbnails">
                                        <option value="">Select Any</option>
                                        @if (old('thumbnails'))
                                            <option value="small" {{ old('thumbnails') == 'small' ? 'selected' : '' }}>
                                                Small</option>
                                            <option value="regular"
                                                {{ old('thumbnails') == 'regular' ? 'selected' : '' }}>
                                                Regular</option>
                                            <option value="large" {{ old('thumbnails') == 'large' ? 'selected' : '' }}>
                                                Large</option>
                                        @else
                                            <option value="small" {{ $event->thumbnails == 'small' ? 'selected' : '' }}>
                                                Small</option>
                                            <option value="regular"
                                                {{ $event->thumbnails == 'regular' ? 'selected' : '' }}>
                                                Regular</option>
                                            <option value="large" {{ $event->thumbnails == 'large' ? 'selected' : '' }}>
                                                Large</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('thumbnails'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('thumbnails') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-6 col-12 mb-3">
                                    <label for="descriptions">Preiview Theme For Viewers :</label><br>
                                    <select class="form-control" name="preview_theme_for_viewers">
                                        <option value="">Select Any</option>
                                        @if (old('preview_theme_for_viewers'))
                                            <option value="light mode"
                                                {{ old('preview_theme_for_viewers') == 'light mode' ? 'selected' : '' }}>
                                                Light Mode</option>
                                            <option value="dark mode"
                                                {{ old('preview_theme_for_viewers') == 'dark mode' ? 'selected' : '' }}>
                                                Dark Mode</option>
                                        @else
                                            <option value="light mode"
                                                {{ $event->preview_theme_for_viewers == 'light mode' ? 'selected' : '' }}>
                                                Light Mode</option>
                                            <option value="dark mode"
                                                {{ $event->preview_theme_for_viewers == 'dark mode' ? 'selected' : '' }}>
                                                Dark Mode</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('preview_theme_for_viewers'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('preview_theme_for_viewers') }}
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
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    <link type="text/css" rel="stylesheet"
        href="{{ asset('custom/plugins/lightgallery/css/lightgallery.min.css') }}" />
    <script src="{{ asset('custom/plugins/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('custom/plugins/lightgallery/js/lg-zoom.js') }}"></script>
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

        // function getValues() {
        //     $('#sub').html('')

        //     if ($('#sel1').val()) {

        //         $.ajax({
        //             url: '/category/get/subcategory/' + $('#sel1').val(),
        //             method: "GET",
        //             success: function(data) {
        //                 if (data.data == '') {
        //                     $('#sub').append(`<option value=''>No data</option>`)
        //                 } else {
        //                     $('#sub').append(`<option value=''>Select If Required</option>`)
        //                     $.each(data.data, function(id, value) {
        //                         $('#sub').append(`<option value="${value.id}">${value.name}</option>`)
        //                     })
        //                 }
        //             },
        //             error: function() {
        //                 Snackbar.show({
        //                     text: "Internal Error",
        //                     pos: 'top-right',
        //                     actionTextColor: '#fff',
        //                     backgroundColor: '#e7515a'
        //                 });
        //             }
        //         })
        //     }
        // }
        // $(".tagging").select2({
        //     tags: true,
        //     placeholder: "Select / Enter Tags",
        // });
        $(document).ready(function() {
            lightGallery(document.getElementById('lightgallery_one'), {
                download: false,
            });
            lightGallery(document.getElementById('lightgallery_two'), {
                download: false,
            });
        });
    </script>
@endsection
