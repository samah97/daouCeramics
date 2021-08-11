<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_section_2">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <h2 class="useful_text">DAOU POTTERY</h2>
                    <div class="footer_text1">
                        <a href="#">{{__('titles.contact')}}</a>
                    </div> </div>
                <div class="col-lg-4 col-sm-6">
                    <h2 class="useful_text">{{__('titles.information')}}</h2>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="#">{{__('titles.about')}}</a></li>
                            <li><a href="#">{{__('titles.policy_faq')}}</a></li>
                            <li><a href="#">Instagram</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <h2 class="useful_text">{{__('titles.newsletter')}}</h2>
                    <div class="footer_text2">
                        {{__('titles.join_newsletter')}}
                    </div>
                    <form method="POST" action="{{ route('newsletter') }}">
                        {{ csrf_field() }}


                        <div class="groupfooter icon-section-3"><a href="#"><i class="fa fa-envelope" ></i></a></div>
                        <div class="groupfooter">
                            <input type="email" name="email" placeholder="{{__('titles.input_email')}}" size="30">
                        </div>

                        <div class="groupfooter"> <button class="btn-section-4">{{__('titles.submit')}}</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer section end -->
