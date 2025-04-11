@extends('backend.layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0 ">

        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing pb-0">

            <div class="statbox widget box box-shadow mt-0 mt-sm-3 mb-1 my-custom-section">
                <div class="widget-header p-smm-0">
                    <div class="row justify-content-between align-items-center mb-0 pb18">
                        <div class="col-md-4 col-sm-12 p-smm-0">
                            <legend class="h2 text-clr fw-600 ">
                                Categories
                            </legend>
                        </div>

                        <div class="col-md-8  col-sm-12  d-flex align-items-center justify-content-md-end mp-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider pbz ptpb" style="line-height: 1;">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Categories</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="cutome-topgrid m-0">

                        @cmsUserRole('admin')
                            <div class="p-0 odr-2">
                                <a href="{{ route('backend.category.create') }}" name="txt"
                                    class="btn btn-primary  maz mto mwh  add-cggbtn">
                                    Add Category
                                </a>
                            </div>
                        @endcmsUserRole

                        <form class="form-inline  h-100 form-csw" action="{{ route('backend.category.index') }}"
                            method="GET">
                            <input
                                class="form-control form-control-sm  col-sm-7 col-md-8 col-lg-6 col-xxl-4  maz cswoffi csipb"
                                type="text" placeholder="Enter Your Category Name" name="q"
                                value="{{ request('q') ?? '' }}" minlength="3" maxlength="40">
                            <input type="submit" value="Search"
                                class="btn searchbtn  cstml coem  search_btn  search_btn_size maz"
                                style="white-space:nowrap">
                        </form>
                        <div class="mt-0 mt-sm-2">
                            @if ($errors->has('q'))
                                <div class="text-danger" role="alert">{{ $errors->first('q') }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow temp-index mt-3 mt-lg-4 p-0">
                <div class="">
                    <div class="widget-content widget-content-area mpv">
                        <div class="table-responsive min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th style="white-space: nowrap">Sr no.</th>
                                        <th style="white-space: nowrap">Category Name</th>
                                        @cmsUserRole('admin')
                                            <th style="white-space: nowrap"></th>
                                        @endcmsUserRole
                                        <th style="white-space: nowrap">Event Name</th>
                                        {{-- <th>Image</th> --}}
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td class="text-center">{{ tableRowSrNo($loop->index, $categories) }}</td>
                                            <td>{{ $category->name }}</td>
                                            @cmsUserRole('admin')
                                                <td> <a href="{{ route('backend.category.upload-image-index', $category->id) }}"
                                                        name="txt" class="btn btn-primary  maz mto mwh  add-cggbtn " style="white-space: nowrap">
                                                        Upload Images
                                                    </a></td>
                                            @endcmsUserRole
                                            <td>{{ $category->event->name }}</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle text-white-2" href="#" role="button"
                                                        id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg width="46" height="1" viewBox="0 0 46 1" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 0.5H45.5" stroke="white" stroke-dasharray="8 8" />
                                                        </svg>

                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.category.show', $category->id) }}">View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.category.upload-image-show', $category->id) }}">View
                                                            Uploaded Images</a>
                                                        @cmsUserRole('admin')
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.category.edit', $category->id) }}">Edit</a>
                                                            {{-- <a class="dropdown-item"
                                                                href="{{ route('backend.category.upload-image-index', $category->id) }}">Upload
                                                                Images</a> --}}
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.category.delete', $category->id) }}"
                                                                onclick="return confirm('Are you sure you want delete this Category?');">Delete</a>
                                                        @endcmsUserRole
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-md-center">
                                            <td colspan="4">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="pagination col-lg-12 mt-3">
                            <div class=" text-center mx-auto">
                                <ul class="pagination text-center">
                                    {{ $categories->onEachSide(0)->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
