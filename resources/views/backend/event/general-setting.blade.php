@extends('backend.layouts.app')
@section('title', 'Event Create')
@section('content')

<section>
</section>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-12">
                <h5>General Settings</h5>
                <h6>Logo & Branding</h6>
                <hr>

            </div>
           
        </div>

        <div class="row">
            <div class="col-6">
                <h5>Show the following information on gallery:</h5>

                <div class="form-group">
                    <label for="brandOptions" class="form-label">Brand Heading</label>
                    <div id="brandOptions">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brandOption" id="brandName" value="name" checked>
                            <label class="form-check-label" for="brandName">
                                Brand Name
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brandOption" id="brandLogo" value="logo">
                            <label class="form-check-label" for="brandLogo">
                                Brand Logo
                            </label>
                        </div>
                    </div>
                </div>

                

            </div>



            <div class="col-6">
                <h5>Show your logo on browser bar:</h5>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                </div>

            </div>


        </div>


    </div>
@endsection
@section('js')
   
@endsection
