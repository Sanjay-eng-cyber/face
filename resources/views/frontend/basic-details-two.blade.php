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
                <div class="row  pt-35px">
                  <div class="col-6 col-xl-6 col-xxl-5">
                    
                            
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

                <div class="row">
                    <div class="col-6 col-xl-6 col-xxl-5">
                        <form action="{{ route('frontend.login.submit') }}" method="post" class="login-form pt-4">
                            @csrf
                            <div class="dblwhitecolor h4 mb-0 fw-600 pb-2">Details</div>
                            
                            <div class="pb-3">
                                <label for="name" class="fw-600 frtwhitcolor pb-2">Name</label>
                                <input type="text" name="name" minlength="8" maxlength="30" required
                                    class="form-control sin-input">
                            </div>
                            {{-- @if ($errors->has('name'))
                                <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('name') }}
                                </div>
                            @endif --}}

                            <div class="pb-3">
                                <label for="email" class="fw-600 frtwhitcolor pb-2">Email ID*</label>
                                <input type="email" name="email" minlength="8" maxlength="30" required
                                    class="form-control sin-input">
                            </div>
                            {{-- @if ($errors->has('email'))
                                <div class="text-danger text-left mx-3" role="alert">{{ $errors->first('email') }}
                                </div>
                            @endif --}}
                            <div class="pb-3">
                                <label for="num" class="fw-600 frtwhitcolor pb-2">Number</label>
                                <input type="text" id="num" name="num" minlength="6" maxlength="6" required class="form-control sin-input">
                                {{--                                 
                                @if ($errors->has('num'))
                                    <div class="text-danger text-left mt-2" role="alert">{{ $errors->first('num') }}</div>
                                @endif --}}
                            </div>
                            
                          
                            <div>
                                {{-- <a href="http://" class="btn btn-login withsignin" style="font-size: 20px">
                                    Sign In
                                </a> --}}
                             

                                <button type="submit" class="submit-btn-bept">Submit</button>

                            </div>

                          


                        </form>

                    </div>
                    <div class="col-6 col-xl-6 col-xxl-7">
                        <div style="    display: grid;grid-template-columns: 48.5% 48.5%;grid-gap: 22px;">
                            <div class="scan-face-box">
                                <div class="scan-face-box-insider" >
                                    <img src="{{asset('frontend/images/gallery/faceimg.png')}}" alt="" srcset="">
                                </div>
                                <div class="scan-textbox" >
                                    Scan Your Face
                                </div>
                            </div>

                            <div class="upload-section ">
                                <div class="icon pb-4">
                                <img src="{{asset('frontend/images/gallery/uploadicon.svg')}}" alt="" srcset="" class="img-fluid">
                                </div>
                                <!-- Dropzone Form -->
                                <form action="/file-upload" class="dropzone" id="my-dropzone">
                                    <div class="dz-message">
                                        <button type="button" class="mb-3">Browse File</button>
                                        <div>
                                        <div class="h5 mb-0 lwccolor"> Choose a file or drag & drop it here.</div>
                                        <div class="fs-10 fw-600 newwcolor">JPEG, PNG, PDF, and MP4 formats, up to 50 MB.</div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
