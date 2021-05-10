{{--<!DOCTYPE html>
<html lang="en">
<head>


    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Convid</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- css custom-->
    <!--<link rel="stylesheet" href="css/custom.css">-->
    <!-- bootstrap css -->
    --}}{{--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">--}}{{--
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- style css -->
--}}{{--    <link rel="stylesheet" type="text/css" href="css/styl/e.css">--}}{{--
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Responsive-->
    --}}{{--<link rel="stylesheet" href="css/responsive.css">--}}{{--
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('assets/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    --}}{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">--}}{{--

    <!-- carousel dots-->
    --}}{{--<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">--}}{{--
</head>--}}
<!--header section start -->
@extends('layout.web')
<!-- header section end -->
<!-- banner section start -->
@section('content')
<div class="banner_section layout_padding">
    <div id="my_slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @for($i=0;$i<count($bannerImages);$i++)
                <li data-target="#my_slider" data-slide-to="{{$i}}" @if($i==0)class="active"@endif></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            <!-- 1st slider -->
            @foreach($bannerImages as $image)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img src="{{asset('storage/'.$image)}}">
                </div>
            @endforeach

        <!-- 2nd slider -->
            {{--                <div class="carousel-item">

                                <img src="{{asset('assets/images/img_p1.jpg')}}">


                            </div>
                            <!-- 3rd slider -->
                            <div class="carousel-item">

                                <img src="{{asset('assets/images/img_p1.jpg')}}">


                            </div>--}}

        </div>
        <!-- arrows -->
        <!--
        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
           <i class="fa fa-angle-left"></i>
           </a>
           <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
           <i class="fa fa-angle-right"></i>
           </a>-->
        <!-- button -->
        <div>  <button class="btn" onclick="window.location.href='{{route('products')}}'">{{__('titles.to_newest_collection')}}</button></div>


    </div>
</div>
<!-- banner section end -->
<!-- protect section start -->
<div class="section-2 row">
    <div class="col-lg-4 col-sm-6 padding-0">
        <img src="{{asset('assets/images/img4.jpg')}}">
    </div>
    <div class="col-lg-8 col-sm-6 box padding-0">
        <div class="text_box">
            <div>SUMMER IS UPON US!  </div>
            <div>STAY COOL WITH OUR VAST COLLECTION OF PITCHERS  </div>
        </div>
        <div class="btn_box">
            <button>TO OUR PITCHERS</button>
        </div>

    </div>
</div>
<!-- protect section end -->
<!-- about section start -->


<!-- doctor section end -->
<!-- news section start -->
<div class="section-3 layout_padding">
    <div class="container">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($collections as $collection)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="image-section-3" >
                            <div class="round_img">
                                <img src="{{asset('storage/'.$collection->thumbnail)}}" class="rounded-circle">
                                <div class="text-section-3">
                                    {{$collection->title}}
                                </div>
                            </div>
{{--                            <div class="round_img"><img src="{{asset('assets/images/img4.jpg')}}" class="rounded-circle">
                                <div class="text-section-3">
                                    COLOR LOVERS
                                </div>
                            </div>--}}
                        </div>
                    </div>
                @endforeach

                {{--<div class="carousel-item ">
                    <div class="image-section-3" >
                        <div class="round_img"> <img src="{{asset('assets/images/img4.jpg')}}" class="rounded-circle">
                            <div class="text-section-3">
                                ALL TIME FAVORITES
                            </div>
                        </div>
                        <div class="round_img"><img src="{{asset('assets/images/img4.jpg')}}" class="rounded-circle">
                            <div class="text-section-3">
                                COLOR LOVERS
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>



            <a id="carouselnext" class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- news section end -->
@endsection

<!-- Javascript files-->
@section('scripts')

<script>
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $(".zoom").hover(function(){

            $(this).addClass('transition');
        }, function(){

            $(this).removeClass('transition');
        });
    });
</script>
<script>
    function openNav() {
        document.getElementById("myNav").style.width = "20%";
    }
    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }
</script>

@endsection
