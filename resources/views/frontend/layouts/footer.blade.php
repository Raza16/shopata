
<footer class="revealed">

    <div class="container">

        <div class="row">

            <div class="col-lg-3 col-md-6">

                <h3 data-target="#collapse_1">Quick Links</h3>

                <div class="collapse dont-collapse-sm links" id="collapse_1">

                    <ul>

                        <li><a href="{{url('aboutus')}}">About us</a></li>
                        <li><a href="{{url('help')}}">Faq</a></li>
                        <li><a href="{{url('help')}}">Help</a></li>
                        <li><a href="{{url('account')}}">My account</a></li>
                        <li><a href="{{url('blog')}}">Blog</a></li>
                        <li><a href="{{url('contactus')}}">Contacts</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <h3 data-target="#collapse_2">Categories</h3>

                <div class="collapse dont-collapse-sm links" id="collapse_2">

                    <ul>

                        @if(count($cat)>0)
                            @foreach($cat as $ca)
                                <li><a href="{{url('shop/'.$ca->slug)}}">{{$ca->title}}</a></li>
                            @endforeach
                        @else

                        @endif

                    </ul>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                    <h3 data-target="#collapse_3">Contacts</h3>

                <div class="collapse dont-collapse-sm contacts" id="collapse_3">

                    <ul>

                        <li>
                            <a href="https://www.google.com/maps/place/182+Bay+Ridge+Ave,+Brooklyn,+NY+11209,+USA/@40.6366657,-74.0316613,  17z/data=!3m1!4b1!4m5!3m4!1s0x89c245562322e1d9:0x1524741d7a6a87b5!8m2!3d40.6366616!4d-74.0294726" target="_blank">
                                <i class="ti-home"></i>
                                182 Bay Ridge Avenue <br>
                                Brooklyn, New York 11209
                            </a>
                        </li>

                        <li><a href="tel:+718-412-1413"><i class="ti-headphone-alt"></i>718-412-1413</a></li>

                        <li><a href="mailto:support@shopataclick.com"><i class="ti-email"></i>support@shopataclick.com</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                    <h3 data-target="#collapse_4">Keep in touch</h3>

                <div class="collapse dont-collapse-sm" id="collapse_4">

                    <div id="newsletter">

                        <div class="form-group">

                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">

                            <button type="button" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>

                        </div>

                    </div>

                    <div class="follow_us">

                        <h5>Follow Us</h5>

                        <ul>
                            <li><a href="#0"><img src="{{asset('frontend/img/twitter_icon.svg')}}"  alt="" class="lazy"></a></li>
                            <li><a href="#0"><img src="{{asset('frontend/img/facebook_icon.svg')}}" alt="" class="lazy"></a></li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <!-- /row-->

        <hr>

        <div class="row add_bottom_25">

            <div class="col-lg-6">

                <ul class="footer-selector clearfix">

                    <li>
                        <div class="styled-select lang-selector">

                            <select>

                                <option value="English" selected>English</option>

                            </select>

                        </div>

                    </li>

                    <li>
                        <div class="styled-select currency-selector">
                            <select>
                                <option value="US Dollars" selected>US Dollars</option>
                            </select>
                        </div>
                    </li>

                    <li><img src="{{asset('frontend/img/cards_all.svg')}}"  alt="" width="198" height="30" class="lazy"></li>

                </ul>

            </div>

            <div class="col-lg-6">

                <ul class="additional_links">
                    <li><a href="{{url('privacypolicy')}}">Terms and conditions</a></li>
                    <li><a href="{{url('privacypolicy')}}">Privacy Policy</a></li>
                    <li><a href="{{url('/')}}"><span>© 2021 ShopataClick</span></a></li>
                </ul>

            </div>

        </div>

    </div>

</footer>
