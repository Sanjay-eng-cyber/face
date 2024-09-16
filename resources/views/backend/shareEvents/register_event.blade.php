@extends('backend.layouts.app')
@section('title', 'Register For' . ' ' . $event->name)
@section('content')
    <div class="layo ut-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Register For {{ $event->name }}
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Register For {{ $event->name }}</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-xl-12">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="#" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-12 row">

                                <div class="container" id="emailOption">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-12 col-sm-12 mt-2">
                                            <div class="mb-3">
                                                <label for="first_name" class="">First Name</label>
                                            </div>
                                            <input type="text" class="form-control" required name="first_name"
                                                placeholder="Enter First Name">
                                            @if ($errors->has('first_name'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('first_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-xl-6 col-md-12 col-sm-12 mt-2">
                                            <div class="mb-3">
                                                <label for="last_name" class="">Last Name</label>
                                            </div>
                                            <input type="text" class="form-control" required name="last_name"
                                                placeholder="Enter Last Name">
                                            @if ($errors->has('last_name'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('last_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-xl-6 col-md-12 col-sm-12 mt-2">
                                            <div class="mb-3">
                                                <label for="email" class="">Email</label>
                                            </div>
                                            <input type="email" class="form-control" required name="email"
                                                placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-xl-6 col-md-12 col-sm-12 mt-2">
                                            <div class="mb-3">
                                                <label for="phone" class="">Phone</label>
                                            </div>
                                            <input type="text" class="form-control" required name="phone"
                                                placeholder="Enter Phone">
                                            @if ($errors->has('phone'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('phone') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-3">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')


@endsection
