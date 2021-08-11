<!DOCTYPE html >
<html class="wide wow-animation" dir="{{app()->getLocale() == 'ar'?'rtl':'ltr'}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href=" {{asset('images/favicon.ico')}}" type="image/x-icon"/>
    <title>{{config('app.name','Daou Ceramics')}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Responsive-->
    {{--<link rel="stylesheet" href="css/responsive.css">--}}
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('assets/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    {{--<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">--}}
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    {{--<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{asset('assets/css/main_styles.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    @if(session()->get('locale') == 'ar')
        <link rel="stylesheet" href="{{asset('assets/css/style_ar.css')}}">
    @endif
    <!--Plugin CSS-->
    {{--<link rel="stylesheet" href="{{asset('css/app.css')}}"/>--}}

    {{--<script src="{{asset('js/app.js')}}"></script>--}}

    @yield('styles')
</head>
<body>

    <div id="app">
        <p id="ASSETS_PATH" path="{{asset('')}}" class="d-none"></p>
        <p id="APP_URL" val="{{config('app.url')}}" class="d-none"></p>
        <p id="xdebugPort" val="{{$xdebugPort}}" class="d-none"></p>

        @include('includes.loader')
        @include('sweetalert::alert')
        <div class="header_section">
            @include('includes.navbar')
        </div>
{{--        <p id="API_URL" url="{{config('api.url')}}" class="d-none"></p>
        <p id="MAPS_API_KEY" key="{{config('api.maps_api_key')}}" class="d-none"></p>
        <p id="ASSETS_PATH" path="{{asset('')}}" class="d-none"></p>
        <p id="PROPERTIES_IMAGES_URL" path="{{\Illuminate\Support\Facades\Storage::url( \App\V1\ParametersValues::PROPERTIES_IMAGES_URL)}}" class="d-none"></p>
        <p id="date_format" data-format="{{config('custom-config.date_format_js')}}" class="d-none"></p>
        @auth('web')
            <p class="d-none" id="uu" value="{{ encrypt(auth('web')->id())}}"></p>
        @endauth--}}

            {{--<div class="content">--}}
                @yield('content')
            {{--</div>--}}

        @include('includes.footer')

    </div>



{{--        @include('includes.footer')
        <div class="templates d-none">
            @yield('templates')
        </div>--}}


{{--<script src="{{asset('assets/plugins/jquery.matchHeight.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/slick/slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/fancybox-master/dist/jquery.fancybox.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/common.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/ajax.js')}}"></script>
<script src="{{asset('assets/js/3dproperties.js')}}"></script>--}}
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- javascript -->
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
@yield('scripts')

</body>
</html>
