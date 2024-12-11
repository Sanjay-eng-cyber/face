@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<style>
    footer{
      margin-top: 25px
    }
    .navsmimg{
        display: none
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
                                            <div class="basic-event-one-main-insider-half user-detailsinfo" >
                                                <div>
                                                    <div class="fw-600 text-white pb-2 uptoptext" >Uploaded Photo</div>
                                                    <img src="{{ asset('frontend/images/basic-event-one/textimg.png') }}" alt="" class="img-fluid w-100 rounded-3">
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
                                            <div class="basic-event-one-main-insider-full" >
                                                <div>
                                                    <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}" alt="" class="img-fluid ex-one-img-new w-100 rounded-3" >
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

                        <div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4" id="gallery-mainscn">
                            <div class="col pb-4" data-index="1">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 1">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 1" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="2">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 2">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 2" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="3">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 3">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 3" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="4">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 4">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 4" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="5">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 5">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 5" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="6">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 6">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 6" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="7">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 7">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 7" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="8">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 8">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 8" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="9">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 9">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 9" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="10">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 10">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 10" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="11">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 11">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 11" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="12">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 12">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 12" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="13">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 13">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 13" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="14">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 14">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 14" class="gallery-img img-fluid rounded-3">
                                </a>
                            </div>
                        
                            <div class="col pb-4" data-index="15">
                                <a href="{{asset('frontend/images/basic-event-one/testgallery.png')}}" data-fancybox="gallery" data-caption="Image 15">
                                    <img src="{{asset('frontend/images/basic-event-one/testgallery.png')}}" alt="Image 15" class="gallery-img img-fluid rounded-3">
                                </a>
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
    $('[data-fancybox="gallery"]').fancybox({
      buttons: [
        "slideShow",
        "download",
        "thumbs",
        "zoom",
        "fullScreen",
        "share",  // Make sure "share" is included
        "close"
      ],
      loop: false,
      protect: true,
      afterLoad: function (instance, current) {
        // This function will be triggered after each image is loaded
        var customShareHTML = `
          <div class="fancybox-share-content">
            <h1>Share</h1>
            <p><a class="fancybox-share__button fancybox-share__button--fb" href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(current.src)}" target="_blank">Facebook</a></p>
            <p><a class="fancybox-share__button fancybox-share__button--tw" href="https://twitter.com/intent/tweet?url=${encodeURIComponent(current.src)}&text=${encodeURIComponent(current.opts.caption)}" target="_blank">Twitter</a></p>
            <p><a class="fancybox-share__button fancybox-share__button--pt" href="https://www.pinterest.com/pin/create/button/?url=${encodeURIComponent(current.src)}&description=${encodeURIComponent(current.opts.caption)}" target="_blank">Pinterest</a></p>
            <p><input class="fancybox-share__input" type="text" value="${current.src}" onclick="this.select()"></p>
          </div>
        `;
    
        // Replace the default share content with custom content
        $(".fancybox-share").html(customShareHTML);
      }
    });
    
  </script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const galleryItems = document.querySelectorAll("#gallery-mainscn .col");
    const toggleButton = document.getElementById("toggleButton");
    let maxVisible = 12; // Default max visible items

    function updateVisibility() {
        const isSmallScreen = window.innerWidth <= 576;
        maxVisible = isSmallScreen ? 4 : 12; // Show 4 items on small screens
        const isExpanded = toggleButton.getAttribute("data-expanded") === "true";

        galleryItems.forEach((item, index) => {
            item.style.display = isExpanded || index < maxVisible ? "block" : "none";
        });

        toggleButton.style.display = galleryItems.length > maxVisible ? "inline-block" : "none";
        toggleButton.innerText = isExpanded ? "Show Less" : "Show More";
    }

    toggleButton.addEventListener("click", function () {
        const isExpanded = toggleButton.getAttribute("data-expanded") === "true";
        toggleButton.setAttribute("data-expanded", !isExpanded);

        galleryItems.forEach((item, index) => {
            item.style.display = !isExpanded || index < maxVisible ? "block" : "none";
        });

        toggleButton.innerText = !isExpanded ? "Show Less" : "Show More";
    });

    window.addEventListener("resize", updateVisibility);
    updateVisibility(); // Initial check
});


</script>

@endsection
