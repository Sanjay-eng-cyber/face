@extends('backend.layouts.app')
@section('title', 'Event - ' . $category->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h2 text-clr fw-600">
                                Category Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2">
                            
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Category Details</a>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
 
            <div class="info statbox widget box box-shadow mt-3 mt-lg-4">
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
                                                <p class="label-title">{{ $category->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Event</label><br>
                                                <p class="label-title">{{ $category->event->name }}</p>
                                            </div>
                                        </div>
                                        @if ($category->cover_image)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Cover
                                                        Image</label><br>
                                                    <div id="lightgallery">
                                                        <a href="{{ asset('storage/images/categories/' . $category->cover_image) }}"
                                                            target="_blank"  class="text-white-2">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Sharing</label><br>
                                                @if ($category->sharing)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                    {{-- @elseif ($category->status == '')
                                                    <label
                                                        class="text-white badge badge-warning">{{ $category->status }}</label>
                                                @elseif ($category->status == '')
                                                    <label
                                                        class="text-white badge badge-success">{{ $category->status }}</label> --}}
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Visibility</label><br>
                                                @if ($category->visibility)
                                                    <label class="text-white badge badge-primary">Yes</label>
                                                @else
                                                    <label class="text-white badge badge-secondary">No</label>
                                                @endif
                                            </div>
                                        </div>
                                        @cmsUserRole('admin')
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Category
                                                        Url</label><br>
                                                    @if (session('shared_url'))
                                                        <p class="label-title">
                                                            <a target="_blank"
                                                                href="{{ session('shared_url') }}">{{ session('shared_url') }}</a>
                                                            <i class="far fa-clone cursor-pointer"
                                                                onclick="copyToClipboard('{{ session('shared_url') }}')"></i>
                                                        </p>
                                                    @else
                                                        <form method="Post"
                                                            action="{{ route('backend.category.url', $category->id) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Generate Category
                                                                Url</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endcmsUserRole
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
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}">
    </script>
    <script src="{{ asset('js/lg-zoom.min.js') }}"></script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            lightGallery(document.getElementById('lightgallery'), {
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
