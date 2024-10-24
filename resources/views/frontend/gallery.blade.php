@extends('frontend.layouts.app')
@section('title')
@section('content')
    <section>
        <div style="position: relative">
         
            <img src="{{asset('frontend/images/index/index-new/leftarrow.svg')}}" alt="Full hero image of the website's main section" class="img-fluid full-img3">
            {{-- <img src="{{asset('frontend/images/index/index-new/blurhero.svg')}}" alt="Blurred background hero image" class="img-fluid blurhero-img-login"> --}}
            <img src="{{asset('frontend/images/index/index-new/plainplate2.svg')}}" alt="Plain plate design element for the hero section" class="img-fluid plainplate-img3">
            <img src="{{asset('frontend/images/index/index-new/smalllarrow.svg')}}" alt="Small left arrow icon for navigation" class="img-fluid smalllarrow-img2">
            
            <div class="container overflow-hide">
                <div class="row d-flex align-items-center justify-content-center hero-mh hero-main" >
               
                    <div style="background:linear-gradient(148.82deg, #045959 9.59%, rgba(123, 69, 139, 0) 59.44%);padding:1px;border-radius:45px">
                        
                        <div style="background: #040404;border-radius:45px">
                            <div class="event-detailsbg">
                                <div class="row pb-5 d-flex justify-content-center">
                                     <div class="col-10">
                                        <div class="row">
                                            <div class="col-4">
                                               
                                                <div style="border-radius:10px;border: 1.9px dashed #3AB4B4;height:100%; display:flex;flex-direction: column;align-items: center;justify-content: center;">
                                                    <div style="width:140px;height:140px;box-shadow: 0px 4px 4px 0px #00000040;background-color:#222E4B;border-radius:50%;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    ">
                                                        <img src="{{asset('frontend/images/gallery/faceimg.png')}}" alt="" srcset="">
                                                    </div>
                                                    <div style="margin-top:17px;width: 140px;background-color:white;color:#434445;padding:10px 15px;font-size:14px;font-weight:600;border-radius:22px">
                                                        Scan Your Face
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="upload-section ">
                                                    <div class="icon pb-4">
                                                       <img src="{{asset('frontend/images/gallery/uploadicon.svg')}}" alt="" srcset="" class="img-fluid">
                                                    </div>
                                                    <!-- Dropzone Form -->
                                                    <form action="/file-upload" class="dropzone" id="my-dropzone">
                                                        <div class="dz-message">
                                                            <button type="button" class="mb-3">Browse File</button>
                                                            <div>
                                                               <div class="h5 mb-0" style="color:#D0D0D0;"> Choose a file or drag & drop it here.</div>
                                                               <div style="font-size:10px;font-weight:600;color: #B4B4B5;">JPEG, PNG, PDF, and MP4 formats, up to 50 MB.</div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
        
                                            </div>

                                        </div>
                                     </div>
                                </div>
                                
                                <div class="row pt-3 pb-4">
                                    <div class="col-12">
                                        <div style="border-radius:15px;font-size:24px;font-weight:600;text-align:center;border: 1px solid #3AB4B4;background-color:#0E0D0D;border: 1px solid #3AB4B4;color:white;padding:21px">
                                            Your photos
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-4">
                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/1.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                           
                                        </div>
                                    </div>
                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/2.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                           
                                        </div>
                                    </div>

                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/3.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                            
                                        </div>
                                    </div>

                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/4.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                           
                                        </div>
                                    </div>


                                    <div class="col pb-4">
                                        <div>
                                            <img src="{{asset('frontend/images/eventdetails/5.png')}}" alt="" srcset="" class="img-fluid rounded-3">
                                           
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


<script>
       // Disable auto Discover for all elements:
       Dropzone.autoDiscover = false;

// Create Dropzone instance
const myDropzone = new Dropzone("#my-dropzone", {
    maxFilesize: 50, // MB
    acceptedFiles: ".jpeg,.jpg,.png,.pdf,.mp4",
    uploadMultiple: false,
    dictDefaultMessage: "",
    clickable: ".dropzone .dz-message button", // Allow clicking button to open file dialog
    init: function () {
        this.on("addedfile", function(file) {
            console.log("File added:", file);
        });
        this.on("success", function(file, response) {
            console.log("File uploaded successfully:", response);
        });
    }
});
</script>
@endsection 