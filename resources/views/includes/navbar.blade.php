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
                                            <a href="javascript:;" data-toggle="dropdown">
                                                {{$menuCollection->title}}
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu menu-item">
                                                @foreach($menuCollection->childCollections as $childCollection)
                                                    <li><a href="{{route('products',['collection'=>$childCollection->encrypted_id])}}">{{$childCollection->title}}</a> </li>
                                                @endforeach

                                            </ul>
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
                @if($showCart)
                <div id="myCart" class="overlay" style="width: 0%">
                    <div> <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a></div>
                    <div class="overlay-content1">
                        <div class="menu-item1">
                            <p class="cartHeader">{{__('titles.your_cart')}}</p>
{{--                            <div class="dropdown">
                                <a href="index.html" class="navbtn dropdown-toggle" data-toggle="dropdown">
                                    Your Cart<span class="caret"></span></a>
                            </div>--}}
                        </div>

                            @if(count($cartItems) > 0)
                                {{--{{$total = 0}}--}}
                            @foreach($cartItems as $cartItem)
                                    {{--{{$total += $cartItem->price}}--}}
                             <div class="cartwrapper">
                            <div class="cartimg"><img onerror="onImageError(this);" src="{{asset('storage/'.$cartItem->product->thumbnail)}}"></div>
                            <div class="cartdetails">
                                <div class="cartdetails1">{{$cartItem->product->title}}</div>
                                <div class="cartdetails2 cart-item-{{$cartItem->product_id}}">
                                    <div class="cartamount">€{{$cartItem->price}}</div>
                                    <div class="product-quantity">
                                        <div class="pro-qty">
                                            <input type="button" value="+" id="inc" onclick="updateCartItems({{$cartItem->product_id}},'i')"/>
                                            <input class="circletext" type="text" value="{{$cartItem->quantity}}">
                                            <input type="button" value="-" id="dec" onclick="updateCartItems({{$cartItem->product_id}},'d')"/>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:deleteCartItem({{$cartItem->product_id}})" class="cartItemDelete">×</a>
                            </div>
                            </div>
                            @endforeach
                            @endif
                            <div class="empty-cart @if(count($cartItems) > 0) d-none @endif" >
                                <p>{{__('titles.cart_empty')}}</p>
                                <button class="btn-shopping">
                                    <a href="{{route('products')}}">{{__('titles.continue_shopping')}}</a>
                                </button>
                            </div>
                    </div>
                    @if(count($cartItems) > 0)
                    <div class="boxedBottom box-total">
                        <div class="carttotal">Total: $ <span >{{$cartItems->sum('total_price')}}</span></div>
                        <a href="{{route('payment')}}"><img class="icons" src="{{asset('assets/images/icon_checkout.png')}}"></a>
                    </div>
                    @endif
                </div>
                <span onclick="toggleCart()"><img src="{{asset('assets/images/icon_navbar_shopping.png')}}" class="toggle_menu cartImg"></span>
                <span onclick="toggleCart()"><img src="{{asset('assets/images/icon_navbar_shopping.png')}}" class="toggle_menu_1"></span>
                @endif

                @include('includes.language')
            </ul>
        </div>
        <div class="logo">
            <div class="headbox titlelogo"><a href="{{route('home')}}">DAOU POTTERY</a></div>
            <div class="headbox icon-right">
{{--                <a href="#" style="display: inline;float: left;width: 30px">
                    <img src="{{asset('assets/images/icon_navbar_shopping.png')}}">
                </a>
                @include('includes.language')--}}
            </div>

        </div>
    </div>
</div>
