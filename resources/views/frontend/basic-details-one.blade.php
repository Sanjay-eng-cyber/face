@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<style>
    footer{
      margin-top: 80px
    }
    .halfarrowt-img{
      display: none;
    }
 
   .blurhero-img{
            border-radius: 34px;
        }
   @media screen and (max-width: 768px) {
   
    .smalllarrow-img2{
      display: none;
    }
    
   .blurhero-img{
            border-radius: 15px;
            margin-top: 0px;
            top: 7px
        }
        .custom-ctnrfluid{
          margin-top: 7px;
        border-radius: 15px;

      }
   }


</style>
@endsection
@section('content')
    <section>
        <div class="position-relative">
          <div class="pobdh"></div>
           
            {{-- <img src="{{ asset('frontend/images/index/index-new/blurhero.svg') }}" alt="Blurred background hero image"
                class="img-fluid blurhero-img-login"> --}}
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">
            <img src="{{asset('frontend/images/gallery/bigarrow.svg')}}" alt="" srcset="" class="img-fluid bigarrow-img-bdptnew d-none d-sm-block" style="z-index: -99">
            <img src="{{asset('frontend/images/basic-event-one/bigarrow.svg')}}" alt="" srcset="" class="img-fluid bigarrow-img-bdptnew d-block d-sm-none bigarrowsm" style="z-index: -99">
                
            <div class="container overflow-hide">
                <div class="row d-flex justify-content-center pt-35px position-relative">
                  <img src="{{asset('frontend/images/basic-event-one/smboxblur.svg')}}" alt="" srcset="" class="img-fluid d-block d-sm-none smboxblurbox ">
                  <div class="col-12 col-lg-10 col-xl-9 col-xxl-8 position-relative z-99">
                    <div class="row">


                        <div class="col-12 ">
                    
                       
                          <div class="basic-event-one-main-bdt">

                            <div class="basic-event-one-main-insider-bdt" >
                                <div>
                                    <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}" alt="" class="img-fluid ex-one-img w-100" >
                                </div>
                                <div>
                                    <div class="eventanddatespit-bdt ">
                                        <div class="h5 fw-600 mb-0 text-white bdt-eventname">Business event</div>
                                        <div class="text-white fw-300 fs-14 bdt-date" >10/09/2024 to 14/09/2024</div>
                                    </div>
                                    <div class="text-white pt-2 pt-md-3 fs-14 bdt-date-longpara" >
                                        Picscan is the world's only end-to-end AI-powered image post-production solution.
                                    </div>
                                </div>
                            </div>
                          </div>
                   
                      

                        </div>


                    </div>
                  </div>
                </div>

                <div class="row ptpb-55px">
                  <div class="col-12">
                    <div class="pin-container">                    
                        <div class="pin-title">Enter Your Pin Number</div>
                          <form action="" method="post">
                            <div class="d-flex justify-content-center basic-input-main">
                              <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
                              <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
                              <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
                              <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
                              <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
                              <input type="text" maxlength="1" class="pin-input" placeholder="0"/>
                            </div>
                            <button type="submit" class="submit-btn">Submit</button>
                          </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
<script>
  const pinInputs = document.querySelectorAll('.pin-input');

  pinInputs.forEach((input, index) => {
    input.addEventListener('input', (e) => {
      if (e.target.value.length === 1 && index < pinInputs.length - 1) {
        pinInputs[index + 1].focus();
      }
    });

    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
        pinInputs[index - 1].focus();
      }
    });
  });
</script>

@endsection
