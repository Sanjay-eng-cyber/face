@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row layout-top-spacing m-0 pa-padding-remove">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <legend class="h4">
                                Dashboard
                            </legend>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 px-4 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow temp-index">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="28c76f "
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.9254 2.32988H17.5543V1.32132C17.5543 0.867468 17.1905 0.489258 16.754 0.489258C16.3174 0.489258 15.9536 0.867468 15.9536 1.32132V2.32988H8.07154V1.32132C8.07154 0.867468 7.70775 0.489258 7.27121 0.489258C6.83466 0.489258 6.47087 0.867468 6.47087 1.32132V2.32988H3.0755C1.6446 2.32988 0.480469 3.54016 0.480469 5.02778V20.8118C0.480469 22.2994 1.6446 23.5097 3.0755 23.5097H20.9254C22.3563 23.5097 23.5205 22.2994 23.5205 20.8118V5.00257C23.5205 3.54016 22.3563 2.32988 20.9254 2.32988ZM21.9198 20.7866C21.9198 21.3413 21.4832 21.7951 20.9254 21.7951H3.0755C2.54194 21.7951 2.08114 21.3413 2.08114 20.7866V10.0958H21.8955V20.7866H21.9198ZM21.9198 8.40646H2.08114V5.00257C2.08114 4.44786 2.51769 3.99401 3.0755 3.99401H6.44662V5.00257C6.44662 5.45642 6.81041 5.83463 7.24695 5.83463C7.6835 5.83463 8.04729 5.45642 8.04729 5.00257V3.99401H15.9294V5.00257C15.9294 5.45642 16.2932 5.83463 16.7297 5.83463C17.1663 5.83463 17.5301 5.45642 17.5301 5.00257V3.99401H20.9012C21.4347 3.99401 21.8955 4.44786 21.8955 5.00257V8.40646H21.9198Z"
                                                fill="#28c76f " />
                                            <path
                                                d="M9.84065 16.8482C9.93665 16.9216 9.96065 17.0686 9.93665 17.1665L9.64865 18.8318C9.57665 19.2237 9.98465 19.5421 10.3446 19.3461L11.7846 18.587C11.8806 18.538 12.0246 18.538 12.1206 18.587L13.5846 19.3706C13.9446 19.5665 14.3526 19.2482 14.2806 18.8563L14.0166 17.2155C13.9926 17.0931 14.0406 16.9706 14.1126 16.8972L15.3126 15.7216C15.6006 15.4278 15.4326 14.938 15.0486 14.889L13.4406 14.6441C13.3206 14.6196 13.2246 14.5461 13.1766 14.4482L12.4326 12.9298C12.2646 12.5625 11.7606 12.5625 11.5686 12.9298L10.8486 14.4237C10.8006 14.5216 10.7046 14.6196 10.5846 14.6196L8.92865 14.8645C8.54465 14.9135 8.37665 15.4033 8.66465 15.6972L9.84065 16.8482Z"
                                                fill="#28c76f " />
                                        </svg>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1">{{ $totalEvents }}</h2>
                                <p class="card-text">Total Events</p>
                                <br>
                            </div>
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
