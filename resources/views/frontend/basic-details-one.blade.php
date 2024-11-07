@extends('frontend.layouts.app')
@section('title')
@section('cdn')
<style>
    footer{
      margin-top: 80px
    }
    .custom-ctnrfluid {
      background-image: unset;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      backdrop-filter: unset;
      display: flex;
      align-items: center;
      min-height: 106px;
      margin-top: 14px;
      /* position: fixed;
      width: 98%;
      left: 50%;
      transform: translate(-50%); */
    }
    .halfarrowt-img{
      display: none;
    }

</style>
@endsection
@section('content')
    <section>
        <div style="position: relative">

           
            <img src="{{ asset('frontend/images/index/index-new/blurhero.svg') }}" alt="Blurred background hero image"
                class="img-fluid blurhero-img-login">
            <img src="{{ asset('frontend/images/index/index-new/plainplate2.svg') }}"
                alt="Plain plate design element for the hero section" class="img-fluid plainplate-img2">
            <img src="{{ asset('frontend/images/index/index-new/smalllarrow.svg') }}"
                alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">

            <div class="container overflow-hide">
                <div class="row d-flex justify-content-center pt-35px">
                  <div class="col-5 col-xl-6 col-xxl-5">
                    <div class="row">
                        <div class="col-12">
                            
                          <div class="basic-event-one-main" >
                            <div class="basic-event-one-main-insider" >
                                <div>
                                    <img src="{{ asset('frontend/images/basic-event-one/ex-one.png') }}" alt="" class="img-fluid ex-one-img" >
                                </div>
                                <div>
                                    <div class="eventanddatespit ">
                                        <div class="h5 fw-600 mb-0 text-white">Business event</div>
                                        <div class="text-white fw-300 fs-14" >10/09/2024 to 14/09/2024</div>
                                    </div>
                                    <div class="text-white pt-3 fs-14" >
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
