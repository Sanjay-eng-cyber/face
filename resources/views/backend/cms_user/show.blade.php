@extends('backend.layouts.app')
@section('title', 'Cms User - ' . $cmsUser->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h4">
                                Cms User Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2">
                      

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Cms
                                            User Details</a>
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
                                                <p class="label-title">{{ $cmsUser->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Role</label><br>
                                                <p class="label-title">{{ $cmsUser->role }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Email</label><br>
                                                <p class="label-title">{{ $cmsUser->email }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Phone
                                                    No.</label><br>
                                                <p class="label-title">{{ $cmsUser->phone ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Portfolio
                                                    Website</label><br>
                                                <p class="label-title">{{ $cmsUser->portfolio_website ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Custom Domain
                                                    Name</label><br>
                                                <p class="label-title">{{ $cmsUser->custom_domain_name ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Vimeo Url
                                                </label><br>
                                                <p class="label-title">{{ $cmsUser->vimeo_url ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Linkedin Url
                                                </label><br>
                                                <p class="label-title">{{ $cmsUser->linkedin_url ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Facebook Url
                                                </label><br>
                                                <p class="label-title">{{ $cmsUser->facebook_url ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Youtube Url
                                                </label><br>
                                                <p class="label-title">{{ $cmsUser->youtube_url ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Instagram Url
                                                </label><br>
                                                <p class="label-title">{{ $cmsUser->instagram_url ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Twitter Url
                                                </label><br>
                                                <p class="label-title">{{ $cmsUser->twitter_url ?? '---' }}</p>
                                            </div>
                                        </div>
                                        @if ($cmsUser->max_events)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">{{ $cmsUser->max_events == 1 ? 'Plan 1' : 'Plan 2' }}</label><br>
                                                    <p class="label-title">Max Events : {{ $cmsUser->max_events }}</p>
                                                    <p class="label-title">Max Image Size : {{ $cmsUser->max_image_size }}
                                                    </p>
                                                    <p class="label-title">Max Image Count :
                                                        {{ $cmsUser->max_images_count }}</p>
                                                    <p class="label-title">Max Face Search :
                                                        {{ $cmsUser->max_face_search }}</p>
                                                    <p class="label-title">Max Storage Limit :
                                                        {{ $cmsUser->max_storage_limit }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Bio</label><br>
                                                <p class="label-title">{!! $cmsUser->bio ?? '---' !!}</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        {{-- <h4>Statistics</h4> --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Uploaded
                                                    Images Count</label><br>
                                                {{-- <p class="label-title">{{ ucfirst($event->download_size) }}</p> --}}
                                                <p class="text-white badge badge-primary">
                                                    {{ $galleryImagesCount ?? '----' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Events
                                                    Count</label><br>
                                                {{-- <p class="label-title">{{ ucfirst($event->download_size) }}</p> --}}
                                                <p class="text-white badge badge-primary">
                                                    {{ $eventsCount ?? '----' }}</p>
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
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
