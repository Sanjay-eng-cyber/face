@extends('frontend.layouts.app')
@section('title')
@section('cdn')
    <style>
        .halfarrowt-img {
            display: none;
        }

        .blurhero-img {
            display: none;
        }
    </style>
@endsection
@section('content')
    <section>
        <div style="position: relative">
            <img src="{{ asset('frontend/images/index/smallarrow.svg') }}" alt="" srcset=""
                class="img-fluid smallarrow">
            <img src="{{ asset('frontend/images/index/index-new/leftarrow.svg') }}"
                alt="Full hero image of the website's main section" class="img-fluid full-img3">
            {{-- <img src="{{asset('frontend/images/index/index-new/blurhero.svg')}}" alt="Blurred background hero image" class="img-fluid blurhero-img-login"> --}}
            {{-- <img src="{{asset('frontend/images/index/index-new/plainplate2.svg')}}" alt="Plain plate design element for the hero section" class="img-fluid plainplate-img3"> --}}
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">

            <div class="container overflow-hide">
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main">
                    <div class="col-12">
                        <div class="event-detailsbg-fouter">
                            <div class="event-detailsbg-souter">

                                <div class="event-detailsbg">
                                    <div class="row pb-5">
                                        <div class="col-12 col-lg-5 col-xl-4">
                                            <img src="{{ asset('storage/images/events/' . $event->cover_image) }}"
                                                alt="" srcset=""
                                                class="img-fluid rounded-2 w-blg-100 pb-4 pb-lg-0">
                                        </div>
                                        <div class="col-12 col-lg-7 col-xl-8">
                                            <div class="d-flex align-items gap-4">
                                                <div class="lightcolor h4 mb-0">Event Name</div>
                                                <div class="dppink fw-600 h4 mb-0">{{ $event->name }}</div>
                                            </div>

                                            <div class="d-flex align-items pt-3 gap-4">
                                                <div class="lightcolor h4 mb-0">Event Date</div>
                                                <div class="dppink fw-600 h4 mb-0">
                                                    {{ dd_format($event->start_date, 'd-m-Y') }} to
                                                    {{ dd_format($event->end_date, 'd-m-Y') }}</div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                                        @forelse ($categories as  $category)
                                            <div class="col pb-4">
                                                <div>
                                                    <img src="{{ asset('storage/images/categories/' . $category->thumbnail_image) }}"
                                                        alt="" srcset="" class="img-fluid rounded-3">
                                                    <div class="text-white h5 mb-0 fw-400 pt-3 pb-3">
                                                        {{ $category->name }}
                                                    </div>
                                                    <a href="{{ route('frontend.gallery.index', [$event->id, $category->id]) }}"
                                                        class="btn btn-login btn-event">
                                                        View images
                                                    </a>
                                                </div>
                                            </div>

                                        @empty
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-b10">
                                                <p class="text-center mb-0">No Category Found</p>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="row ">
                                        <div class="col-xl-12 col-lg-12">
                                            <nav aria-label="Blog Pagination">
                                                <ul class="pagination text-center m-b30 m-t40">
                                                    <li class="page-item">
                                                        {{ $categories->onEachSide(1)->links('pagination::bootstrap-4') }}
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
