@extends('layout.web')

@section('content')
    <div class="btnback col-lg-12">
        <a href="{{route('products')}}" class="btnstyle" ><</a>
    </div>
    <div class="containerimages-details">
        <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-5 slideimage">
                <div class="class1">
                    <div class="mySlides">
                        <img class="img-responsive" src="{{count($productImages) > 0?asset('storage/'.$productImages[0]):''}}" style="width:100%">
                    </div>

                    <a href="#" class="expandimg"><img src="{{asset('assets/images/expand.png')}}" width="30"></a>
                </div>
                @if(count($productImages) > 0)
                <div class="class2">
                    @foreach($productImages as $key=>$image)
                        <div class="box1 one">
                            <img class="demo cursor" onerror="onImageError(this);" src="{{asset('storage/'.$image)}}" style="width:100%" onclick="currentSlide({{++$key}})">
                        </div>
                    @endforeach

{{--                    <div class="box1 two">
                        <img class="demo cursor" src="images/p2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
                    </div>
                    <div class="box1 three">
                        <img class="demo cursor" src="images/p3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                    </div>--}}

                </div>
                @endif
            </div>
            <div class="col-lg-6 detailsorder">
                @if($orderItem !=null)
                <span class="text-danger">{{__('titles.product_exist_cart')}}</span>
                @endif
                <div class="t1">{{$product->title}}</div>
                <div class="t2" id="priceElem" data-price="{{$product->price}}">€ {{$product->price}}</div>
                <form method="POST" action="{{route('add-cart',['id'=>$product->product_id])}}">
                    @csrf
                    <div>
                        <div class="product-quantity">
                            <div class="pro-qty">
                                <input type="button" value="+" id="inc1" onclick="incNumber1()"/>

                                <input id="NumberId" class="circletext" name="quantity" type="text" readonly value="{{$quantity}}" min="1" max="{{$product->quantity}}">
                                <input type="button" value="-" id="dec1" onclick="decNumber1()"/>
                            </div>
                        </div>
                    </div>
                    <div class="addtocartbox"><div class="addtocarttotal">Total:€ <span id="totalPrice">{{$totalPrice}}</span></div>
                        <button type="submit">
                            <img class="icons" src="{{asset('assets/images/icon_navbar_shopping.png')}}">
                        </button>
                    </div>
                </form>
                <div class="description">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
    </div>
    <div class="coloredbtn" >
        <button type="button" >More From This Collection</button>
    </div>
@endsection

@section('scripts')

@endsection
