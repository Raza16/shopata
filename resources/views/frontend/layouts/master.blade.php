<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		@yield('meta')
    <meta name="author" content="Ansonika">
    <title>@yield('title')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('frontend/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('frontend/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('frontend/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('frontend/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- BASE CSS -->
    <link href="{{asset('frontend/css/bootstrap.custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{asset('frontend/css/home_1.css')}}" rel="stylesheet">

		{{-- pages css --}}
		@yield('pagecss')
    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">


</head>

<body>

	<div id="page">

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
													<h3>New Arrivals</h3>
													<ul>
														<li><a href="{{url('shop')}}">Shop</a></li>
														{{-- @if(count($cat)>0)
														@foreach ($cat as $ca)
														<li><a href="">{{$ca->title}}</a></li>
														@endforeach

														@endif --}}
														{{-- <li><a href="">Makeup Brushes</a></li>
														<li><a href="">iPhone Tempered Glass</a></li>
														<li><a href="">Necklace</a></li>
														<li><a href="">Nail Stickers</a></li>
														<li><a href="">Product Sticky Info</a></li> --}}
													</ul>
												</div>
												<div class="col-lg-3">
													<h3>Top Selling</h3>
													{{-- <ul>
														<li><a href="">iPhone Case</a></li>
														<li><a href="">Headphones</a></li>
														<li><a href="">Makeup Brushes</a></li>
														<li><a href="">iPhone Tempered Glass</a></li>
														<li><a href="">Necklace</a></li>
														<li><a href="">Nail Stickers</a></li>
														<li><a href="">Product Sticky Info</a></li>
													</ul> --}}
												</div>
												<div class="col-lg-3">
													<h3>Featured Product</h3>
													{{-- <ul>
														<li><a href="">iPhone Case</a></li>
														<li><a href="">Headphones</a></li>
														<li><a href="">Makeup Brushes</a></li>
														<li><a href="">iPhone Tempered Glass</a></li>
														<li><a href="">Necklace</a></li>
														<li><a href="">Nail Stickers</a></li>
														<li><a href="">Product Sticky Info</a></li>
													</ul> --}}
												</div>
												<div class="col-lg-3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
													<div class="banner_menu">
														<a href="#0">
															<img src="{{asset('frontend/data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==')}}" data-src="{{asset('frontend/img/banner_menu.jpg')}}" width="400" height="550" alt="" class="img-fluid lazy">
														</a>
													</div>
												</div>
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
									<li><span>
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

											<ul>

                                                <li ><span><a href="#">Atm</a></span>
                                                    <ul>
                                                        <li><a href=""> Ma</a></li>
                                                        <li><a>Am</a></li>
                                                    </ul>


												{{-- @foreach ($cat as $item)
                                                    <li {{$item->products->count() != 0 ? '' : 'hidden'}} ><span><a href="#">{{$item->title}}</a></span>
                                                        @if(count($item->subcategory))
                                                            @include('frontend.layouts.multicategory',['subcategories' => $item->subcategory])
                                                        @endif
                                                    </li>
												@endforeach --}}

											</ul>

										</div>

									</li>

								</ul>

							</nav>
						</div>
						<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
							<div class="custom-search-input">
								<input type="text" placeholder="Search over 10.000 products">
								<button type="submit"><i class="header-icon_search_custom"></i></button>
							</div>
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
												{{-- <li>
													<a href="account.html"><i class="ti-package"></i>My Orders</a>
												</li> --}}
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
				<div class="search_mob_wp">
					<input type="text" class="form-control" placeholder="Search over 10.000 products">
					<input type="submit" class="btn_1 full-width" value="Search">
				</div>
				<!-- /search_mobile -->
			</div>
			<!-- /main_nav -->
		</header>
		<!-- /header -->


    @yield('content')


	<!-- /main -->

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
									<li><a href="#" {{$ca->products->count() != 0 ? '' : 'hidden'}}>{{$ca->title}}</a></li>
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
							<li><i class="ti-home"></i>182 Bay Ridge Avenue <br>
              					Brooklyn, New York 11209
							</li>
							<li><i class="ti-headphone-alt"></i>718-412-1413</li>
							<li><i class="ti-email"></i><a href="#0">support@shopataclick.com </a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
						    <div class="form-group">
						        <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
						        <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
						    </div>
						</div>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
								<li><a href="#0"><img src="{{asset('/data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==')}}" data-src="{{asset('frontend/img/twitter_icon.svg')}}" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="{{asset('data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==')}}" data-src="{{asset('frontend/img/facebook_icon.svg')}}" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('frontend/img/instagram_icon.svg')}}" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="{{asset('data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==')}}" data-src="{{asset('frontend/img/youtube_icon.svg')}}" alt="" class="lazy"></a></li>
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
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li>
						<li><img src="{{asset('data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==')}}" data-src="{{asset('frontend/img/cards_all.svg')}}" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><a href="{{url('privacypolicy')}}">Terms and conditions</a></li>
						<li><a href="{{url('privacypolicy')}}">Privacy Policy</a></li>
						<li><a href="{{url('/')}}"><span>© 2020 ShopataClick</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<div id="toTop" class="visible"></div>

	<!-- page -->

    @yield('pop')
	<!-- /Newsletter Popup -->

	<!-- COMMON SCRIPTS -->
    <script src="{{asset('frontend/js/common_scripts.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>

	<!-- SPECIFIC SCRIPTS -->
	<script src="{{asset('frontend/js/carousel-home.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.cookiebar.js')}}"></script>
	<script>
		$(document).ready(function() {
			'use strict';
			$.cookieBar({
				fixed: true
			});
		});
	</script>
	 @yield('script')
<div id="mm-blocker" class="mm-slideout"></div>


</body>
</html>
