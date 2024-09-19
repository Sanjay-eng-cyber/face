@extends('frontend.layouts.app')
@section('title')

@section('content')

    <section>
     
    </section>



@endsection
@section('js')
    <script>
        $('.heroslider').slick({
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@endsection
