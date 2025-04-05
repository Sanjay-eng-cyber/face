@extends('backend.layouts.app')
@section('title', 'Frontend Users')
@section('content')
  
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing pb-0">
        
            <a href="{{ route('backend.event.index') }}" class="top-arrowbtn">
                <img src="{{ asset('backend/assets/img/prearrow.svg') }}" alt="" srcset="" class="img-fluid logo">
            </a>

            <div class="statbox widget box box-shadow  mb-1 my-custom-section p-0">
                <div class="widget-header p-smm-0">
                    <div class="row widget justify-content-between align-items-center mb-0">
                        <div class="col-md-4 col-sm-12 p-smm-0">
                            <legend class="h2 text-clr fw-600 ">
                                Frontend Users
                            </legend>
                        </div>

                        <div class="col-md-8  col-sm-12  d-flex align-items-center justify-content-md-end mp-0 my-0 my-md-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-divider pbz " style="line-height: 1;">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Frontend Users</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
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
                                        <th style="white-space: nowrap">Sr no.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($frontendUsers as $frontendUser)
                                        <tr>
                                            <td class="text-white-2">{{ tableRowSrNo($loop->index, $frontendUsers) }}</td>
                                            <td class="text-white-2">{{ $frontendUser->name }}</td>
                                            <td class="text-white-2">{{ $frontendUser->phone }}</td>
                                            <td class="text-white-2">{{ $frontendUser->email }}</td>
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
                                                        @cmsUserRole('admin')
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.frotend-user.show', ['event_id' => $event->id, 'frontend_user_id' => $frontendUser->id]) }}">View</a>
                                                        @endcmsUserRole
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-md-center">
                                            <td colspan="5">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="pagination col-lg-12 mt-3">
                            <div class=" text-center mx-auto">
                                <ul class="pagination text-center">
                                    {{ $frontendUsers->onEachSide(0)->links('pagination::bootstrap-4') }}
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
