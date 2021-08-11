{{--<ul class="navbar-nav ml-auto">--}}
    @php $locale = session()->get('locale'); @endphp
    {{--<li class="nav-item dropdown">--}}
        <a id="navbarDropdown" class="nav-link lang-dropdown dropdown-toggle" href="#" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="">
            @switch($locale)
                @case('en')
                <img src="{{asset('assets/images/lang/en.png')}}">
                @break
                @case('ar')
                <img src="{{asset('assets/images/lang/ar.png')}}">
                @break
                @default
                <img src="{{asset('assets/images/lang/en.png')}}">
            @endswitch
            {{--<span class="caret"></span>--}}
        </a>
        <div class="lang-dropdown-menu dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if($locale != 'en')
            <a class="dropdown-item" href="lang/en"><img src="{{asset('assets/images/lang/en.png')}}"> English</a>
            @endif
            @if($locale != 'ar')
            <a class="dropdown-item" href="lang/ar"><img src="{{asset('assets/images/lang/ar.png')}}">العربية</a>
            @endif
        </div>
    {{--</li>
</ul>--}}
