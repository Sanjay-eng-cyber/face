@extends('backend.layouts.app')
@section('title', 'Events')
@section('content')
    <div class="row layout-top-spacing m-0 pa-padding-remove">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <legend class="h4">
                                Events
                            </legend>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 px-4 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Events</a></li>
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
                        <div
                            class="align-items-center col-lg-3 d-flex justify-content-end row mb-2">
                            <a href="{{ route('backend.event.create') }}" name="txt" class="btn btn-primary mt-2 ml-3 ">
                                Add Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow temp-index">
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
                                            <td>{{ tableRowSrNo($loop->index, $events) }}</td>
                                            <td>{{ $event->name }}</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
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
                                                        <a class="dropdown-item"
                                                            href="{{ route('share.event', $event->id) }}">Share Event</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.event.edit', $event->id) }}">Edit</a>
                                                        {{-- <a class="dropdown-item"
                                                            href="{{ route('backend.event.gallery', $event->id) }}">Add
                                                            Gallery</a> --}}
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.event.delete', $event->id) }}"
                                                            onclick="return confirm('Are you sure you want delete this event?');">Delete</a>
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
