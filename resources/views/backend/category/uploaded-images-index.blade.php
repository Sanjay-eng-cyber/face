@extends('backend.layouts.app')
@section('title', 'Uploaded Images')
@section('cdn')
    <style>
        .page-link {
            min-height: 53px;
            width: 47px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media (max-width: 576px) {
            .page-link {
                min-height: unset;
                width: unset;
                display: flex;
                justify-content: center;
                align-items: center;
            }
              .up-main-box {
            margin-bottom: 7px;
            }
        }

      
    </style>
@endsection
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">

        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <a href="{{ route('backend.category.index') }}" class="top-arrowbtn">
                <img src="{{ asset('backend/assets/img/prearrow.svg') }}" alt="" srcset="" class="img-fluid logo">
            </a>
            
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-6 col-md-12 col-sm-12 iwmp">
                            <legend class="h4 text-clr fw-600 ">
                                Uploaded Images (Total - {{ $totalImages }})
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-0 mb-sm-2 d-flex justify-content-start justify-content-sm-end align-it mt-1  mp-0">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider bdpd">
                                    <li class="breadcrumb-item"><a href="{{ route('backend.category.index') }}">Categories</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Uploaded Images</a>
                                    </li>
                                </ol>
                            </nav>


                        </div>



                    </div>
                    {{-- <div class="row">
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 mt-2 px-xl-0">
                            <form class="form-inline row app_form" action="{{ route('backend.category.index') }}"
                                method="GET">
                                <input class="form-control form-control-sm app_form_input col-md-2 mt-md-0 mt-3"
                                    type="text" placeholder="Name" name="q" value="{{ request('q') ?? '' }}"
                                    minlength="3" maxlength="40">
                                <input type="submit" value="Search"
                                    class="btn btn-success mt-md-0 mt-3 ml-0 ml-lg-4 ml-md-4 ml-sm-4  search_btn  search_btn_size ">
                            </form>
                            @if ($errors->has('q'))
                                <div class="text-danger" role="alert">{{ $errors->first('q') }}
                                </div>
                            @endif
                        </div>
                        <div
                            class="align-items-center col-xl-3 col-lg-4 col-md-12 col-sm-12 d-flex justify-content-end row mb-2">
                            <a href="{{ route('backend.category.create') }}" name="txt"
                                class="btn btn-primary mt-2 ml-3 ">
                                Add Category
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>



            <div class="statbox  box box-shadow ">
                <div class="">
                    <div class="widget-content widget-content-area p-0">

                        <div class="row row-cols-1 row-cols-sm-2  row-cols-lg-2 row-cols-xl-3 mt-4">
                            @forelse($images as $image)

                                <div class="col mb-4">
                                    <div class="up-main-box">
                                        <img src="{{ asset('backend/assets/img/ct/imgclone.svg') }}" alt=""
                                            class="img-fluid h-100">
                                        <div>
                                            <div class="dr-clr fs-13 text-truncate">{{ $image->image_name }}</div>
                                            <div class="dr-clr-light fw-600 pt-2 fs-11">
                                                {{ round($image->file_size / 1024, 2) }} KB

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">

                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle text-white-2" href="#" role="button"
                                                    id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <span class="lightgallery1">
                                                        <a class="dropdown-item"
                                                            href="{{ getGalleryImageUrl($image->image_url) }}">
                                                            {{-- <img src="{{ getPythonImageUrl($image->image_url) }}"
                                                                style="height: 100px;width:150px;object-fit:contain;"
                                                                alt=""> --}}
                                                            View
                                                        </a>
                                                    </span>
                                                    @cmsUserRole('admin')
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.category.image-upload-delete', $image->id) }}">
                                                            Delete
                                                        </a>
                                                    @endcmsUserRole
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div style="position: absolute;left: 50%;transform: translateX(-50%);">
                                    <div class="text-center">
                                        No Records Found
                                    </div>
                                </div>
                            @endforelse


                        </div>


                        <div class="pagination col-lg-12 mt-3">
                            <div class="text-center mx-auto">
                                <ul class="pagination text-center">
                                    {{-- {{ $images->appends(Request::all())->links('pagination::bootstrap-4') }} --}}
                                    {{ $images->onEachSide(0)->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                        </div>

                        {{-- <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">‹</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">›</a></li>
                        </ul> --}}
                        {{--
                        <ul class="pagination">
                            @if ($images->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">‹</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $images->previousPageUrl() }}">‹</a>
                                </li>
                            @endif

                            @php
                                $totalPages = $images->lastPage();
                                $currentPage = $images->currentPage();
                                $range = 2;
                                $start = max(1, $currentPage - $range);
                                $end = min($totalPages, $currentPage + $range);
                                $pages = range($start, $end);
                                rsort($pages);
                            @endphp

                            @foreach ($pages as $page)
                                <li class="page-item {{ $currentPage == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $images->url($page) }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($images->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $images->nextPageUrl() }}">›</a>
                                </li>
                            @else
                                <li class="page-item disabled"><span class="page-link">›</span></li>
                            @endif
                        </ul> --}}



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('plugins/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('plugins/lightgallery/js/lg-zoom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".lightgallery1").each(function() {
                lightGallery(this, {
                    speed: 500,
                    download: false,
                    thumbnail: true,
                });
            });
        });
    </script>
@endsection
