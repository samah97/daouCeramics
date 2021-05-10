<div class="container-fluid main-header sticky">
    <div class="main">
        <div class="menu_text">
            <ul>
                <div class="togle_">
                </div>
                <div id="myNav" class="overlay">
                    {{--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>--}}
                    <div class="overlay-content">
                        @if($showNavbar)
                            @foreach($menuCollections as $menuCollection)
                                <div class="menu-item">
                                   {{-- <a href="{{route('products',['collection'=>$menuCollection->encrypted_id])}}">
                                        {{$menuCollection->title}}
                                    </a>--}}
                                    @if(count($menuCollection->childCollections) > 0)
                                        <div class="dropdown">
                                            <a href="javascript:;">
                                                {{$menuCollection->title}}
                                            </a>
                                            <span class="caret"></span>
                                        </div>
                                    @else
                                        <a href="{{route('products',['collection'=>$menuCollection->encrypted_id])}}">
                                            {{$menuCollection->title}}
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        @endif
{{--                        <div class="menu-item">
                            <div class="dropdown">
                                <a href="index.html">{{__('titles.all_time_favorites')}}
                                    <span class="caret"></span>
                                </a>
                            </div>
                        </div>--}}
{{--
                        <div class="menu-item"> <a href="protect.html">{{__('titles.gift_card')}}</a> </div>
                        <div class="menu-item"> <a href="about.html">{{trans_choice('titles.collection',2)}}</a> </div>
                        <div class="menu-item"> <a href="doctors.html">{{__('titles.colored_ceramics')}}</a> </div>
                        <div class="menu-item"> <a href="news.html">{{__('titles.gift_idea')}}</a> </div>
--}}
                        <div class="roundedimg">
                            <img src="{{asset('assets/images/insta.png')}}">
                        </div>
                    </div>
                </div>
                <span class="navbar-toggler-icon"></span>
                <span onclick="toggleNav()"><img src="{{asset('assets/images/icon_navbar_filter.png')}}" class="toggle_menu"></span>
                <span onclick="toggleNav()"><img src="{{asset('assets/images/icon_navbar_filter.png')}}" class="toggle_menu_1"></span>

{{--
                <span onclick="openNav()"><img src="{{asset('assets/images/toogle-icon1.png')}}" class="toggle_menu_1"></span>
--}}
            </ul>
        </div>
        <div class="menu_text1">
            <ul>
                <div class="togle_">
                </div>
                <div id="myCart" class="overlay" style="width: 0%">
                    <div> <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a></div>
                    <div class="overlay-content1">
                        <div class="menu-item1">
                            <div class="dropdown">
                                <a href="index.html" class="navbtn dropdown-toggle" data-toggle="dropdown">
                                    Your Cart<span class="caret"></span></a>
                            </div>
                        </div>
                        <div class="cartwrapper">
                            <div class="cartimg"><img src="{{asset('assets/images/order_img.jpg')}}"></div>
                            <div class="cartdetails">
                                <div class="cartdetails1">Ceramic Pot</div>
                                <div class="cartdetails2">
                                    <div class="cartamount">€30,50</div>
                                    <div class="product-quantity">
                                        <div class="pro-qty">
                                            <input type="button" value="+" id="inc" onclick="incNumber()"/>
                                            <input class="circletext" type="text" value="1">
                                            <input type="button" value="-" id="dec" onclick="decNumber()"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="boxedBottom">
                        <div class="carttotal">Total: €30,50</div>
                        <a href="checkoutpayment.html"><img class="icons" src="{{asset('assets/images/icon_checkout.png')}}"></a>
                    </div>
                </div>
                <span onclick="toggleCart()"><img src="{{asset('assets/images/icon_navbar_shopping.png')}}" class="toggle_menu"></span>
                <span onclick="toggleCart()"><img src="{{asset('assets/images/icon_navbar_shopping.png')}}" class="toggle_menu_1"></span>
            </ul>
        </div>
        <div class="logo">
            <div class="headbox titlelogo"><a href="{{route('home')}}">DAOU CERAMICS</a></div>
            <div class="headbox icon-right">
{{--                <a href="#" style="display: inline;float: left;width: 30px">
                    <img src="{{asset('assets/images/icon_navbar_shopping.png')}}">
                </a>
                @include('includes.language')--}}
            </div>

        </div>
    </div>
</div>
