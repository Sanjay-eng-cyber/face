@extends('backend.layouts.app')
@section('title', 'Events')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">

        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <a href="javascript:void(0);" class="sidebarCollapse arrow-main-btn d-none d-lg-block" data-placement="bottom" style="width:33px;" >
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="32" height="32" rx="15" fill="#D9D9D9"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8431 16.7111L17.5001 22.3681L18.9141 20.9541L13.9641 16.0041L18.9141 11.0541L17.5001 9.64014L11.8431 15.2971C11.6556 15.4847 11.5503 15.739 11.5503 16.0041C11.5503 16.2693 11.6556 16.5236 11.8431 16.7111Z" fill="black"/>
                </svg>    
            </a>

            <div class="statbox widget box box-shadow mt-3 mb-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <legend class="h2 text-clr fw-600">
                                Events
                            </legend>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Events</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>




                    </div>
                    <div class="row">
                        <div class="col-lg-9 mt-2 px-xl-0">
                            <form class="form-inline row app_form" action="{{ route('backend.event.index') }}"
                                method="GET">
                                <input class="form-control form-control-sm app_form_input col-md-4 mt-md-0 mt-3"
                                    type="text" placeholder="Name" name="q" value="{{ request('q') ?? '' }}"
                                    minlength="3" maxlength="40">
                                <input type="submit" value="Search"
                                    class="btn btn-success mt-md-0 mt-3 ml-0 ml-lg-4 ml-md-4 ml-sm-4  search_btn  search_btn_size ">
                            </form>
                            <div class="mt-2">
                                @if ($errors->has('q'))
                                    <div class="text-danger" role="alert">{{ $errors->first('q') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        @cmsUserRole('admin')
                            <div class="align-items-center col-lg-3 d-flex justify-content-end row mb-2">
                                <a href="{{ route('backend.event.create') }}" name="txt" class="btn btn-primary mt-2 ml-3 ">
                                    Add Event
                                </a>
                            </div>
                        @endcmsUserRole
                    </div>
                </div>
            </div>


            <div class="statbox widget box box-shadow temp-index p-0 mt-3 mt-lg-4">
                <div class="">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Name</th>
                                        {{-- <th>Image</th> --}}
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $event)
                                        <tr>
                                            <td class="text-white-2">{{ tableRowSrNo($loop->index, $events) }}</td>
                                            <td class="text-white-2">{{ $event->name }}</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle text-white-2" href="#" role="button"
                                                        id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.event.show', $event->id) }}">View</a>
                                                        @cmsUserRole('admin')
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.frotend-user.index', $event->id) }}">View
                                                                Users</a>
                                                                <a class="dropdown-item"
                                                                href="{{ route('backend.category.index') . '?e=' . $event->slug }}">View
                                                                Categories</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.event.edit', $event->id) }}">Edit</a>
                                                            {{-- <a class="dropdown-item"
                                                                    href="{{ route('backend.event.gallery', $event->id) }}">Add
                                                                    Gallery</a> --}}
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.event.delete', $event->id) }}"
                                                                onclick="return confirm('Are you sure you want delete this event?');">Delete</a>
                                                        @endcmsUserRole
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-md-center">
                                            <td colspan="3">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination col-lg-12 mt-3">
                            <div class=" text-center mx-auto">
                                <ul class="pagination text-center">
                                    {{ $events->appends(Request::all())->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('js')

@endsection
