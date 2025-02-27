@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <a href="javascript:void(0);" class="sidebarCollapse arrow-main-btn d-none d-lg-block" data-placement="bottom" style="width:33px;" >
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="32" height="32" rx="15" fill="#D9D9D9"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8431 16.7111L17.5001 22.3681L18.9141 20.9541L13.9641 16.0041L18.9141 11.0541L17.5001 9.64014L11.8431 15.2971C11.6556 15.4847 11.5503 15.739 11.5503 16.0041C11.5503 16.2693 11.6556 16.5236 11.8431 16.7111Z" fill="black"/>
                </svg>    
            </a>
            {{-- new --}}
            
                    {{-- <div class="statbox widget box box-shadow mt-3 mb-1">
                        <div class="widget-header">
                            <div class="row justify-content-between align-items-center mt-2 px-3">
                                <div class="col-12 col-sm-6">
                                    <legend class="text-clr h2 fw-600">
                                        Dashboard
                                    </legend>
                                </div>
                                <div class="col-12 col-md-6  d-flex justify-content-end align-it ">
                                   

                                    
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-divider">
                                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                <a href="javascript:void(0);">Dashboard</a>
                                            </li>
                                        </ol>
                                    </nav>

                                </div>
                            </div>
                     
                        </div>
                    </div> --}}
           
            
                    <div class="statbox  box box-shadow">
                        <div class="widget-content widget-content-area p-0">
                            <div class="row layout-top-spacing p-0">
                                    <div class="col-xl-6 col-md-6 col-sm-12 col-12 mb-4 dsa-box-main">
                                        <div class="widget widget-one_hybrid widget-referral d-flex flex-column justify-content-center dsa-box" style="--main-color:#060405;--main-border:#0F041A;--ds-hrborder:#955BCD">
                                            <div class="widget-heading mb-0 p-0">

                                                <div class="w-title justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center" style="gap:16px">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3333 6.6665H4.66667V7.99984H11.3333V6.6665ZM14 1.99984H12V0.666504H10.6667V1.99984H5.33333V0.666504H4V1.99984H2V13.9998H14V1.99984ZM12.6667 12.6665H3.33333V5.33317H12.6667V12.6665ZM9.33333 9.33317H4.66667V10.6665H9.33333V9.33317Z" fill="#BA71FF"/>
                                                            </svg>
                                                            
                                                        <h6 class="text-center text-b mb-0" style="--text-blue:#BA71FF">Total Events</h6>
                                                    </div>
                                                    <div class="d-flex">
                                                        
                                                        <div class="">
                                                            <div class="w-value  text-b tens" style="--text-blue:#BA71FF">
                                                                {{ str_pad($totalEvents, 2, '0', STR_PAD_LEFT) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                                    <a href="{{ route('backend.event.index') }}"
                                                        class="btn box-shadow-none mx-auto w-100 d-flex justify-content-between align-items-center view-eventbtn" style="transform:unset">
                                                        <div class="text-white fw-500">
                                                            View events    
                                                        </div>         
                                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 33px;height:33px">
                                                            <path d="M20.7712 19.0526L20.7255 12.2398L13.9125 12.2501C13.8415 12.2407 13.7693 12.2468 13.7008 12.2678C13.6323 12.2888 13.5692 12.3243 13.5156 12.3718C13.462 12.4194 13.4193 12.4779 13.3903 12.5434C13.3613 12.6089 13.3467 12.6798 13.3475 12.7514C13.3483 12.8231 13.3645 12.8937 13.395 12.9585C13.4254 13.0233 13.4695 13.0808 13.5241 13.1272C13.5787 13.1735 13.6427 13.2075 13.7116 13.227C13.7805 13.2465 13.8529 13.2509 13.9236 13.24L19.029 13.2402L12.2934 20.0314C12.2 20.1256 12.1478 20.253 12.1484 20.3856C12.1489 20.5182 12.2021 20.6451 12.2963 20.7385C12.3904 20.8319 12.5178 20.8841 12.6504 20.8835C12.783 20.883 12.91 20.8298 13.0034 20.7356L19.739 13.9444L19.7812 19.0496C19.7822 19.1823 19.8359 19.3091 19.9304 19.4022C20.0249 19.4953 20.1526 19.5471 20.2853 19.546C20.418 19.545 20.5448 19.4914 20.6379 19.3968C20.731 19.3023 20.7827 19.1746 20.7817 19.042L20.7712 19.0526Z" fill="white"/>
                                                            </svg>
                                                                                                       
                                                    </a>
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-12 col-12 mb-4 dsa-box-main">
                                        <div class="widget widget-one_hybrid widget-referral d-flex flex-column justify-content-center dsa-box" style="--main-color:#060405;--main-border:#160E05;--ds-hrborder:#9F7444">
                                            <div class="widget-heading mb-0 p-0">

                                                <div class="w-title justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center" style="gap:16px">
                                                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 31px;height:31px">
                                                            <rect x="0.5" width="32" height="32" rx="8" fill="#0B0A0A"/>
                                                            <path d="M16.5 9.3335L12.8333 15.3335H20.1667L16.5 9.3335ZM16.5 11.8935L17.7867 14.0002H15.2067L16.5 11.8935ZM20.1667 16.6668C18.5067 16.6668 17.1667 18.0068 17.1667 19.6668C17.1667 21.3268 18.5067 22.6668 20.1667 22.6668C21.8267 22.6668 23.1667 21.3268 23.1667 19.6668C23.1667 18.0068 21.8267 16.6668 20.1667 16.6668ZM20.1667 21.3335C19.7246 21.3335 19.3007 21.1579 18.9882 20.8453C18.6756 20.5328 18.5 20.1089 18.5 19.6668C18.5 19.2248 18.6756 18.8009 18.9882 18.4883C19.3007 18.1758 19.7246 18.0002 20.1667 18.0002C20.6087 18.0002 21.0326 18.1758 21.3452 18.4883C21.6577 18.8009 21.8333 19.2248 21.8333 19.6668C21.8333 20.1089 21.6577 20.5328 21.3452 20.8453C21.0326 21.1579 20.6087 21.3335 20.1667 21.3335ZM10.5 22.3335H15.8333V17.0002H10.5V22.3335ZM11.8333 18.3335H14.5V21.0002H11.8333V18.3335Z" fill="#FFB96A"/>
                                                            </svg>
                                                            
                                                            
                                                        <h6 class="text-center text-b mb-0 " style="--text-blue:#FFB96A">Event Categories</h6>
                                                    </div>
                                                    <div class="d-flex">
                                                    
                                                        <div class="">
                                                            <div class="w-value  text-b tens" style="--text-blue:#FFB96A">
                                                                {{ str_pad($totalCategories , 2, '0', STR_PAD_LEFT) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                                    <a href="{{ route('backend.event.index') }}"
                                                        class="btn box-shadow-none mx-auto w-100 d-flex align-items-center justify-content-between view-eventbtn" style="transform:unset">
                                                        <div class="text-white fw-500">
                                                            View categories
                                                        </div>         
                                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 33px;height:33px">
                                                            <path d="M20.7712 19.0526L20.7255 12.2398L13.9125 12.2501C13.8415 12.2407 13.7693 12.2468 13.7008 12.2678C13.6323 12.2888 13.5692 12.3243 13.5156 12.3718C13.462 12.4194 13.4193 12.4779 13.3903 12.5434C13.3613 12.6089 13.3467 12.6798 13.3475 12.7514C13.3483 12.8231 13.3645 12.8937 13.395 12.9585C13.4254 13.0233 13.4695 13.0808 13.5241 13.1272C13.5787 13.1735 13.6427 13.2075 13.7116 13.227C13.7805 13.2465 13.8529 13.2509 13.9236 13.24L19.029 13.2402L12.2934 20.0314C12.2 20.1256 12.1478 20.253 12.1484 20.3856C12.1489 20.5182 12.2021 20.6451 12.2963 20.7385C12.3904 20.8319 12.5178 20.8841 12.6504 20.8835C12.783 20.883 12.91 20.8298 13.0034 20.7356L19.739 13.9444L19.7812 19.0496C19.7822 19.1823 19.8359 19.3091 19.9304 19.4022C20.0249 19.4953 20.1526 19.5471 20.2853 19.546C20.418 19.545 20.5448 19.4914 20.6379 19.3968C20.731 19.3023 20.7827 19.1746 20.7817 19.042L20.7712 19.0526Z" fill="white"/>
                                                            </svg>
                                                                                                       
                                                    </a>
                                               
                                            </div>
                                        </div>
                                    </div>


                                 
                                 
                                    

                                   

                                    

                                @cmsUserRole('super-admin')

                                <div class="col-xl-6 col-md-6 col-sm-12 col-12 mb-4">
                                    <div class="widget widget-one_hybrid widget-referral d-flex flex-column justify-content-center">
                                        <div class="widget-heading mb-0 p-0">

                                            <div class="w-title justify-content-between align-items-center">
                                                <h4 class="text-center text-white-2">Total Cms Users</h4>
                                                <div class="d-flex">
                                                    <div class="w-icon">
                                                        <i class="far fa-chart-bar big-font-icon"> </i>
                                                    </div>
                                                    <div class="">
                                                        <p class="w-value text-white-2">
                                                            {{ $totalCmsUsers }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <a href="{{ route('backend.cms-user.index') }}"
                                                class="btn btn-outline-primary mx-auto">
                                                    <small><i class="far fa-edit"> </i></small> Manage
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                @endcmsUserRole
                            </div>
                        </div>
                    </div>
               
        </div>
    </div>
@endsection
<style>
    .widget {
        padding: 20 px !important;
    }
</style>
@section('js')
@endsection
