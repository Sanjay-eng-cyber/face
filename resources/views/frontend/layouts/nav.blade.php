<div style="position: relative;">
    <img src="{{asset('frontend/images/index/index-new/tpzigzag.svg')}}" alt="" class="img-fluid tpzigzag-img" srcset="" >
    <img src="{{asset('frontend/images/index/index-new/halfarrowt.svg')}}" alt="" class="img-fluid halfarrowt-img" srcset="" >
    <img src="{{ asset('frontend/images/index/index-new/blurhero.svg') }}" alt="Blurred background hero image"
    class="img-fluid blurhero-img">

    <img src="{{ asset('frontend/images/basic-event-one/navsmimg.svg') }}" alt="Blurred background hero image"
    class="img-fluid navsmimg">

    <img src="{{asset('frontend/images/index/index-new/navcircle.svg')}}" alt="" srcset="" class="img-fluid navcircle-img">

    <div class="container-fluid position-relative" style="z-index:9999;">
        <div class="custom-ctnrfluid " id="mainNavbar" >
            <div class="container pall0 position-relative" style="z-index:999;">
            <nav class="navbar navbar-expand-lg text-white  " style="">
                <div class="container-fluid insidenavcont position-relative pall0">
                <a class="navbar-brand fs-43px fs-30px fw-900 fs-20px" href="{{route('index')}}" >
                    <span class="text-white">Pic</span><span class=" darkpink">scan</span>
                </a>
                <div class="navbar-toggler-parent">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav navbar-nav-blw1400 me-auto mb-2 mb-lg-0 pt-20px" >
                        <li class="nav-item home-left">
                            <a href="{{ route('index') }}" class="nav-link {{ URL::current() == route('index') ? 'active' : '' }}" aria-current="page" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Contact us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="#">Pricing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="#">Blog</a>
                        </li>
                        {{-- @guest
                        <a href="{{route('frontend.login')}}" class="btn btn-login  mb-0 fw-500">
                            Log in
                        </a>
                        @endguest --}}

                        {{-- @auth
                        <a href="{{route('frontend.logout')}}" class="btn btn-login  mb-0 fw-500">
                            LogOut
                        </a>
                        @endauth --}}
                    </ul>

                </div>
                </div>
            </nav>
            </div>
        </div>
    </div>

</div>




{{-- <div class="position-relative isolation">
    <img src="{{ asset('frontend/images/index/heromirro-ptn.svg') }}" alt="" srcset="" class="img-fluid heromirro-ptn">

    <div class="container-fluid position-relative" >
        <a class="navbar-brand " href="{{url('/')}}" style="position: absolute">
            <img src="{{ asset('frontend/images/index/mainlogo.png') }}" alt="" srcset=""
                class="img-fluid" style="width: 164px">
        </a>

        <nav class="navbar navbar-expand-lg" style="display: flex;justify-content: flex-end;">

                <button class="navbar-toggler position-relative bg-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                    <div class="navbar-wrapper" >
                        <div class="nav-main">
                            <ul class="navbar-nav">
                                <li class="nav-item navleftp">
                                     <a class="nav-link first active " aria-current="page" href="#" style="color: white">Home</a>
                                     <span class="active-link1 pl-custom-3"><img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon">
                                    <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon-2"></span>
                                </li>
                                <li class="nav-item navleftp">
                                    <a class="nav-link second" href="#" style="color: white">About us</a>
                                    <span class="active-link2 d-none pl-custom-4">  <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon">
                                        <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon-2"></span>
                                </li>
                                <li class="nav-item navleftp">
                                    <a class="nav-link third" href="#" style="color: white">Contact us</a>
                                    <span class="active-link3 d-none pl-custom-5">  <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon">
                                        <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon-2"></span>
                                </li>

                                <li class="nav-item navleftp">
                                    <a class="nav-link four" href="#" style="color: white">Pricing</a>
                                    <span class="active-link4  d-none pl-custom-3">  <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon">
                                        <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon-2"></span>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link five" href="#" style="color: white">Blog</a>
                                    <span class="active-link5  d-none pl-custom-2">  <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon">
                                        <img src="{{asset('frontend/images/index/nav-img.png')}}" alt="" class="moon-2"></span>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
        </nav>
    </div>
</div> --}}
