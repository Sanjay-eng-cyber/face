@extends('backend.layouts.app')
@section('title', 'Frontend User - ' . $frontendUser->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h4">
                                User Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-0 mb-sm-2 d-flex justify-content-start justify-content-sm-end align-it mt-1  mp-0">


                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider bdpd">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">User Details</a>
                                    </li>
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
                                                <p class="label-title">{{ $frontendUser->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Phone</label><br>
                                                <p class="label-title">
                                                    {{ $frontendUser->phone ? $frontendUser->phone : '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Email</label><br>
                                                <p class="label-title">{{ $frontendUser->email }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Profile
                                                    Image</label><br>
                                                <div id="profile_image">
                                                    <a href="{{ asset('storage/images/uploads/' . $frontendUser->image) }}"
                                                        target="blank" style="color: #C7C6CC">View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Matched Images
                                                    Count</label><br>
                                                <p class="label-title">{{ $matchedImagesCount }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Guest Upload
                                                    Count</label><br>
                                                <p class="label-title">{{ $guestUploadsCount }}</p>
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
            lightGallery(document.getElementById('profile_image'), {
                speed: 500,
                download: false,
                thumbnail: true,
            });
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
