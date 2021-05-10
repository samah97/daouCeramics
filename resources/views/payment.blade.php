@extends('layout.web')
@section('content')
    <div class="container">
        <!-- <a target="_blank" href="https://www.youtube.com/watch?v=WW6fEuheuas"><h1 class="text-center">Step Progress Bar (Video)</h1></a> -->
        <div class="btn_progress">
            <div class="row"><div class="col-lg-2"><button id="previousBtn"><</button></div>
                <div class="col-lg-10" id="stepProgressBar">
                    <div class="step">

                        <div class="bullet bulletstep1">1</div>
                        <div class="showcomplete completestep1 ">✔</div>
                        <p class="step-text">{{__('titles.address')}}</p>
                    </div>
                    <div class="step">


                        <div class="bullet bulletstep2">2</div>
                        <div class="showcomplete completestep2 ">✔</div>
                        <p class="step-text">{{__('titles.delivery')}}</p>

                    </div>
                    <div class="step">


                        <div class="bullet bulletstep3">3</div>
                        <div class="showcomplete completestep3">✔</div>
                        <p class="step-text">{{__('titles.payment')}}</p>
                    </div>
                    <div class="step">


                        <div class="bullet bulletstep4">4</div>
                        <div class="showcomplete completestep4 ">✔</div>
                        <p class="step-text">{{__('titles.done')}}</p>
                    </div>
                </div></div>
        </div>
        @isset($message)
        <div class="row">
            <div class="col-12">
                <p>{{$message}}</p>
            </div>
        </div>
        @endisset
        <div id="main">
            <p id="content"  class="text-center"></p>
            <form id="paymentForm" method="post" action="{{route('payment-submit')}}">
                {{ csrf_field() }}
                <div id="stepOneContent" class="orderlist-container" >

                    <div class="row">
                        <div class="col-lg-7 col-sm-6">
                            <div class="orderspacing">
                                <h4>{{__('titles.address_recipient')}}</h4>

                                <div class="twocols1">
                                    <div class="col-lg-6 firstbox">
                                        <input type="text" name="first_name" class="boxes" placeholder="{{__('titles.first_name')}}" >
                                        @error('first_name')
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 secondbox">
                                        <input type="text" name="last_name" class="boxes" placeholder="{{__('titles.last_name')}}">
                                        @error('last_name')
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                <div  class="col-lg-12 onebox">
                                    <input type="text" name="company" class="boxes" placeholder="{{__('titles.company')}}">
                                    @error('company')
                                    <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    </p>
                                    @enderror
                                </div>

                                <div class="twocols1">
                                    <div class="col-lg-6 firstbox">
                                        <input type="text" name="street" class="boxes" placeholder="{{__('titles.street_name_number')}}">
                                        @error('street')
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 secondbox">
                                        <input type="text" name="postal_code" class="boxes" placeholder="{{__('titles.postal_code')}}">
                                        @error('postal_code')
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="twocols1">
                                    <div class="col-lg-6 firstbox">
                                        <input type="text" name="city" class="boxes" placeholder="{{__('titles.city')}}">
                                        @error('city')
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 secondbox">
                                        <input type="text" class="boxes" placeholder="{{__('titles.country')}}">
                                        @error('country')
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                <div  class="col-lg-12 onebox">
                                    <input type="email" name="email_address" class="boxes" placeholder="{{__('titles.email_address')}}">
                                    @error('email_address')
                                    <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    </p>
                                    @enderror
                                </div>


                            </div>
                            <div class="btnwrapper"><button class="stepbtn1" type="button" onclick="nextstepsfunc(1)">{{__('titles.proceed')}}</button></div>
                        </div>
                        <div class="col-lg-5 col-sm-6 ">
                            <div class="ordercontainer">
                                <div class="orderdetails"><h4>{{__('titles.your_order')}}</h4>

                                    <div class="orderdesc">

                                        <div class="orderwrapper"><img src="{{asset('assets/images/order_img.jpg')}}"></div>
                                        <div class="orderwrapper">
                                            <div class="orderwrapperdetails1">1x Ceramic Pot</div>
                                            <div class="orderwrapperdetails2">€30,50</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="ordertotal1">
                                    <div class="ordertotaldetails">{{__('titles.total')}}: €30,50</div>
                                    <button class="orderEditbtn pull-right" type="button">{{__('titles.edit_order')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="stepTwoContent" class="orderlist-container" >

                    <div class="row">
                        <div class="col-lg-7 col-sm-6 spacing boxstep2">
                            <h4>{{__('titles.delivery')}}</h4>


                            <div class="orderinfo">

                                <div class="infoDetails">

                                    <div class="row">
                                        <div class="col-lg-1 main text-left">{{__('titles.address')}}:</div>
                                        <div class="col-lg-8"><input type="text" class="textnoborder" placeholder="xxxxxxxxstr.56xxxxxBerlin" ></div>
                                        <div class="col-lg-1 pull-right">
                                            <button type="button" class="editbtn-infoDetails orderinfo textnoborder" id="editbtnaddress" >{{__('titles.edit')}}</button></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-1 main text-left">Contact:</div>
                                        <div class="col-lg-8"><input type="text" class="textnoborder" placeholder="xxxx@gmail.com" ></div>
                                        <div class="col-lg-1 pull-right">
                                            <button type="button" class="editbtn-infocontact orderinfo textnoborder" id="editbtnaddress" >{{__('titles.edit')}}</button></div></div></div>
                            </div>



                            <div class="form-check-inline">
                                <div> <label class="form-check-label" for="radio1">
                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>
                                    </label>
                                    <img src="{{asset('assets/images/icon_dhl.jpg')}}" class="dhl"></div>
                                <div class="dhlprice">€8,00</div>
                            </div>

                            <div class="btnwrapper"><button class="stepbtn1" type="button" onclick="nextstepsfunc(2)">{{__('titles.proceed')}}</button></div>
                        </div>

                        <div class="col-lg-5 col-sm-6 spacing">
                            <div class="ordercontainer">
                                <div class="orderdetails"><h4>{{__('titles.your_order')}}</h4>

                                    <div class="orderdesc">

                                        <div class="orderwrapper"><img src="{{asset('assets/images/order_img.jpg')}}"></div>
                                        <div class="orderwrapper">
                                            <div class="orderwrapperdetails1">1x Ceramic Pot</div>
                                            <div class="orderwrapperdetails2">€30,50</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="Shipping">
                                    <div class="Shippingdetails">{{__('titles.shipping')}} €8,00 </div>

                                </div>
                                <div class="ordertotal">
                                    <div class="ordertotaldetails">{{__('titles.total')}}: €30,50</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="stepThreeContent" class="orderlist-container" >

                    <div class="row">
                        <div class="col-lg-7 col-sm-6 spacing boxstep3">
                            <h4>Payment Method</h4>


                            <div class="Paymentinfo">

                                <div class="PaymentinfoDetails">

                                    <div class="row">
                                        <div class="form-check-inlinePayment">
                                            <label class="form-check-label" for="Visa">
                                                <input type="radio" class="form-check-input" id="Visa" name="optradio" value="option1" checked>
                                            </label>
                                            <img src="{{asset('assets/images/visa.jpg')}}" class="Visa">
                                        </div>
                                        <div class="cardinfo">
                                            <div class="row">
                                                <div class="col-lg-12 cardinfobox"><div class="cardinfotitle">{{__('titles.name_on_card')}}</div><input class="txtbox" type="text"></div>
                                                <div class="col-lg-12 cardinfobox"><div class="cardinfotitle">{{__('titles.card_number')}}</div><input class="txtbox" type="text"></div>
                                                <div class="cardnb cardinfobox twocols">
                                                        <div class="col-lg-6 cardinfobox"><div  class="cardinfotitle">{{__('titles.expire_date')}}</div><input type="text"></div>

                                                        <div class="col-lg-6 cardinfobox"><div  class="cardinfotitle">{{__('titles.security_code')}}</div><input type="text"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div></div>
                            <div class="paypalchkbox">
                                <div class="form-check-inlinePay">
                                    <label class="form-check-label" for="paypal">
                                        <input type="radio" class="form-check-input" id="paypal" name="optradio" value="option1" >
                                    </label>
                                    <img src="{{asset('assets/images/paypal.jpg')}}" class="paypal">
                                </div>	</div>





                        </div>
                        <div class="col-lg-5 col-sm-6 spacing">
                            <div class="ordercontainer">
                                <div class="orderdetails"><h4>{{__('titles.your_order')}}</h4>

                                    <div class="orderdesc">

                                        <div class="orderwrapper"><img src="{{asset('assets/images/order_img.jpg')}}"></div>
                                        <div class="orderwrapper">
                                            <div class="orderwrapperdetails1">1x Ceramic Pot</div>
                                            <div class="orderwrapperdetails2">€30,50</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="Shipping">
                                    <div class="Shippingdetails">{{__('titles.shipping')}}: €8,00 </div>

                                </div>
                                <div class="ordertotal">
                                    <div class="ordertotaldetails">{{__('titles.total')}}: €30,50</div>

                                </div>
                            </div>
                            <div class="voucherbox">
                                <div class="row">
                                    <div class="txtvoucher" >{{__('titles.got_voucher')}}</div>
                                    <div class="twocols voucherwrapper">
                                        <input type="text" class="col-lg-7 col-md-5 col-sm-10 voucher">
                                        <button class="col-lg-4 col-md-5 col-sm-10 voucher" id="submitvoucher" >{{__('titles.submit')}}</button></div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="btnwrapper"><button class="stepbtn1" type="submit" onclick="submitForm()">{{__('titles.buy')}}</button></div>

                        </div>
                    </div>

                </div>

                <div id="stepFourContent" class="orderlist-container" >
                    <div class="stepfourbox">Your order is confirmed. Thank You</div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/payment.js')}}"></script>
@endsection
