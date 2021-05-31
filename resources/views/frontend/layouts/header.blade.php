
<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="{{url('/')}}"><img src="{{asset('frontend/img/logo.png')}}" alt="" width="auto" height="35"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="{{url('/')}}"><img src="{{asset('frontend/img/logo_black.svg')}}" alt="" width="100" height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li >
                                <a href="{{('/')}}">Home</a>
                            </li>
                            <li class="megamenu submenu">
                                <a href="javascript:void(0);" class="show-submenu-mega">Products</a>
                                <div class="menu-wrapper">
                                    <div class="row small-gutters">
                                        <div class="col-lg-3">
                                            <h3><a href="{{url('shop')}}">Shop</a></h3>
                                        </div>
                                        <div class="col-lg-3">
                                            <h3>Top Selling</h3>
                                            <ul>
                                                @foreach ($cat as $item)
                                                <li><a href="{{url('shop/'.$item->slug)}}" data-id="{{$item->slug}}">{{$item->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        {{-- <div class="col-lg-3">
                                            <h3>Featured Product</h3>
                                            <ul>
                                                <li><a href="">iPhone Case</a></li>
                                                <li><a href="">Headphones</a></li>
                                                <li><a href="">Makeup Brushes</a></li>
                                                <li><a href="">iPhone Tempered Glass</a></li>
                                                <li><a href="">Necklace</a></li>
                                                <li><a href="">Nail Stickers</a></li>
                                                <li><a href="">Product Sticky Info</a></li>
                                            </ul>
                                        </div> --}}
                                        {{-- <div class="col-lg-3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
                                            <div class="banner_menu">
                                                <a href="#0">
                                                    <img src="{{asset('frontend/data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==')}}" data-src="{{asset('frontend/img/banner_menu.jpg')}}" width="400" height="550" alt="" class="img-fluid lazy">
                                                </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /menu-wrapper -->
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Company</a>
                                <ul>
                                    <li><a href="{{url('blog')}}">Blogs</a></li>
                                    <li><a href="{{url('help')}}">Help</a></li>
                                    <li><a href="{{url('aboutus')}}">About Us</a></li>
                                    <li><a href="{{url('privacypolicy')}}">Privacy Policy</a></li>
                                    {{-- <li><a href="{{url('leave_review')}}">Leave A Review</a></li> --}}
                                    <li><a href="{{url('privacypolicy')}}">Terms & conditions</a></li>
                                    <li><a href="{{url('store_directory')}}">Store Directory</a></li>
                                    {{-- <li><a href="affiliate-program.html">Become a Supplier</a></li> --}}
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('account')}}">Accounts</a>
                            </li>
                            <li>
                                <a href="{{url('contactus')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <!--/main-menu -->

                </nav>

                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right igm">
                    <a class="phone_top " href="#"><img src="{{asset('frontend/img/app.png')}}" width="200px" height="auto"> </a>
                </div>

            </div>

            <!-- /row -->

        </div>

    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">

                    <nav class="categories">
                        <ul class="clearfix">

                            <li>
                                <span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Categories
                                    </a>
                                </span>

                                <div id="menu">

                                    <ul style="overflow-y:auto;overflow-x:hidden">

                                        @foreach ($category as $item)

                                            <li {{$item->products->count() != 0 ? '' : 'hidden'}}>

                                                <span><a href="{{url('shop/'.$item->slug)}}">{{$item->title }}</a></span>

                                                @if ($item->subcategory->count() !=0 )

                                                    <ul>

                                                        @if(count($item->subcategory))
                                                            @include('frontend.layouts.multicategory',['subcategories' => $item->subcategory])
                                                        @endif

                                                    </ul>

                                                @endif

                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </li>

                        </ul>

                    </nav>

                </div>

                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">

                    @include('frontend.layouts.search')

                </div>

                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        {{-- <li>
                            <div class="dropdown dropdown-cart">
                                <a href="cart.html" class="cart_bt"><strong>2</strong></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <a href="product-detail-2.html">
                                                <figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                <strong><span>1x Armor Air x Fear</span>$90.00</strong>
                                            </a>
                                            <a href="#0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                        <li>
                                            <a href="product-detail-2.html">
                                                <figure><img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                <strong><span>1x Armor Okwahn II</span>$110.00</strong>
                                            </a>
                                            <a href="0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                    </ul>
                                    <div class="total_drop">
                                        <div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
                                        <a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li> --}}
                        <li>
                            <a href="#0" class="wishlist"><span>Wishlist</span></a>
                        </li>
                        <li>
                            <div class="dropdown dropdown-access">
                                <a href="{{url('account')}}" class="access_link"><span>Account</span></a>
                                <div class="dropdown-menu">
                                    <a href="{{url('account')}}" class="btn_1">Sign In or Sign Up</a>
                                    <ul>
                                        <li>
                                            <a href="{{url('track_order')}}"><i class="ti-truck"></i>Track your Order</a>
                                        </li>
                                        <li>
                                            <a href="{{url('account')}}"><i class="ti-user"></i>My Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{url('help')}}"><i class="ti-help-alt"></i>Help and Faq</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
    
        @include('frontend.layouts.mobile_search')
        <!-- /search_mobile -->
    </div>

    <!-- /main_nav -->
</header>

{{-- @push('script')
    <script>
            $(document).ready(function(){
                $(".cat-id").click(function(){
                    var data_id=$(this).attr('data-id');
                    alert(data_id);
                    // location.href="";
                });
            })
    </script>
@endpush --}}


{{-- <script>
    alert('hello')
</script> --}}
