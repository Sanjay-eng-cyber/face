@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<style>
    footer{
      margin-top: 80px
    }
    .custom-ctnrfluid.sticky-nav{
        margin-top: 0px
    }
    .custom-ctnrfluid {
        margin-top: 8px;
    }
    .halfarrowt-img{
      display: none;
    } 
    .blurhero-img {
            display: none;
        }

        @media (max-width: 992px) {
          
        }
        @media (max-width: 576px) {
            .custom-ctnrfluid {
                margin-top: 0px;
               
            }
          
          
        }
</style>
@endsection
@section('content')
    <section>
        <div class="position-relative">
            {{-- <div class="demo-height-bdpt"></div> --}}

           
            {{-- <img src="{{ asset('frontend/images/index/index-new/blurhero.svg') }}" alt="Blurred background hero image"
                class="img-fluid blurhero-bdptwo" style="backdrop-filter: blur(30px);"> --}}
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img-new">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2-new">
            <img src="{{asset('frontend/images/gallery/bigarrow.svg')}}" alt="" srcset="" class="img-fluid bigarrow-img-bdpt d-none d-sm-block" style="z-index: -99">
            
            <div class="container-fluid ">

                <div class="basic-details-trbg">

                    <div class="container overflow-hide">
                        <div class="row  pt-35px">
                        
                            <div class="col-12">
                                    <div class="grid-outer">
                                        <div class="basic-event-one-main h-100">
                                            <div class="basic-event-one-main-insider user-detailsinfo" >
                                                <div>
                                                    <div class="fw-600 text-white pb-2 uptoptext" >Uploaded Photo</div>
                                                    <img src="{{ asset('frontend/images/basic-event-one/textimg.png') }}" alt="" class="img-fluid ex-one-img w-100 rounded-3">
                                                </div>
                                                <div class="details-box-one">
                                                   
                                                        <div class="d-flex gap-1">
                                                            <div class="text-white fw-600 h5 mb-0 name-head">Name:</div>
                                                            <div class="text-white fw-600 h5 mb-0 name-title">joe alberto</div>
                                                        </div>

                                                        <div class="d-flex gap-1 box-one-nummain" >
                                                            <div class="text-white fw-600 h5 mb-0 number-head">Number:</div>
                                                            <div class="text-white fw-600 h5 mb-0 number-title">12312312312</div>
                                                        </div>

                                                        <div class="d-flex gap-1">
                                                            <div class="text-white fw-600 h5 mb-0 email-head"> Email ID: </div>
                                                            <div class="text-white fw-600 h5 mb-0 email-title">joe@gmail.com</div>
                                                        </div>
                                                                                                                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="sgl-divider d-lg-block"></div>
                                    
                                        <div class="basic-event-one-main h-100" >
                                            <div class="basic-event-one-main-insider" >
                                                <div>
                                                    <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}" alt="" class="img-fluid ex-one-img w-100 rounded-3" >
                                                </div>
                                                <div>
                                                    <div class="eventanddatespit ">
                                                        <div class="h5 fw-600 mb-0 text-white bx-twoeventname">Business event</div>
                                                        <div class="text-white fw-300 fs-14 fssm-8px" >10/09/2024 to 14/09/2024</div>
                                                    </div>
                                                    <div class="text-white pt-2 pt-xl-3 fs-14 box-twobtpra">
                                                        Picscan is the world's only end-to-end AI-powered image post-production solution.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        
                        </div>

                        <div class="row pt-3 pb-3 pt-sm-5 pb-sm-4">
                            <div class="fw-600 h4 mb-0 text-white text-center">Matched photos </div>
                        </div>

                        <div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4" id="gallery">
                            <div class="col pb-4 pb-sm-4" data-index="1">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="2">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="3">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="4">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>


                            <div class="col pb-4" data-index="5">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="6">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>
                            <div class="col pb-4" data-index="7">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>
                            <div class="col pb-4" data-index="8">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="9">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="10">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>


                            <div class="col pb-4" data-index="11">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="12">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="13">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="14">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>

                            <div class="col pb-4" data-index="15">
                                <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="" srcset="" class="gallery-img img-fluid rounded-3">
                            </div>



                        </div>

                        <div class="d-flex justify-content-center">
                            <button id="toggleButton" class="btn pink-btn showmshol mt-3">Show More</button>
                        </div>
    
                    </div>

                </div>

            </div>
            
        </div>
    </section>
@endsection
@section('js')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const galleryItems = document.querySelectorAll("#gallery .col");
        const toggleButton = document.getElementById("toggleButton");
        const maxVisible = 12; 
        galleryItems.forEach((item, index) => {
            if (index >= maxVisible) item.style.display = "none";
        });

        toggleButton.addEventListener("click", function() {
            const isExpanded = toggleButton.innerText === "Show Less";
            galleryItems.forEach((item, index) => {
                item.style.display = isExpanded || index < maxVisible ? "block" : "none";
            });
            toggleButton.innerText = isExpanded ? "Show More" : "Show Less";
        });
    });
</script>

@endsection
