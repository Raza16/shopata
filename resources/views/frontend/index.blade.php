@extends('frontend.layouts.master')

@section('title','Shop ata Click')
@section('pagecss')
<link rel="stylesheet" href="{{asset('frontend/css/about.css')}}">
@endsection
@section('content')


		<main>

				<div id="carousel-home">
					<div class="owl-carousel owl-theme">
						<div class="owl-slide cover" style="background-image: url('{{asset('frontend/img/banners/sm1.png')}}');">
							<div class="opacity-mask d-block align-items-center" >
								{{-- <div class="container">
									<div class="row justify-content-center justify-content-md-start">
										<div class="col-lg-12 static">
											<div class="slide-text text-center black">
												<h2 class="owl-slide-animated owl-slide-title">Men's HIIT Class Shoe<br>New Collection</h2>
												<p class="owl-slide-animated owl-slide-subtitle">
													High Quality Fabric in Lowest Price
												</p>
												<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
											</div>
										</div>
									</div>
								</div> --}}
							</div>
							<!--/owl-slide-->
						</div>
						<!--/owl-slide-->
						<div class="owl-slide cover" style="background-image: url('{{asset('frontend/img/banners/sm2.png')}}');">
							<div class="opacity-mask d-block align-items-center">
								{{-- <div class="container">
									<div class="row justify-content-center justify-content-md-start">
										<div class="col-lg-6 static">
											<div class="slide-text black">
												<h2 class="owl-slide-animated owl-slide-title">Designed with<br>your heart in mind.</h2>
												<p class="owl-slide-animated owl-slide-subtitle">
													Limited‑time offer
												</p>
												<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
											</div>
										</div>
									</div>
								</div> --}}
							</div>
						</div>
						<!--/owl-slide-->
						<div class="owl-slide cover" style="background-image: url({{asset('frontend/img/banners/sm3.png')}});">
							<div class="opacity-mask d-block align-items-center">
								{{-- <div class="container">
									<div class="row justify-content-center justify-content-md-start">
										<div class="col-lg-12 static">
											<div class="slide-text text-center black">
												<h2 class="owl-slide-animated owl-slide-title">Mens<br>New Collections</h2>
												<p class="owl-slide-animated owl-slide-subtitle">
													High Quality Fabric in Lowest Price
												</p>
												 <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
											</div>
										</div>
									</div>
								</div> --}}
							</div>
							<!--/owl-slide-->
						</div>

					</div>
					<div id="icon_drag_mobile"></div>
				</div>

				<!--/carousel-->


				<div class="container" style="margin-top:30px">
					<div class="row" >

						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="fas fa-truck-loading"></i>
								<h3>Free shipping</h3>
								<p>Contact us for more details</p>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="fas fa-headset"></i>
								<h3>30 Days Return</h3>
								<p>ShopataClick is committed to excellence both with</p>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="fas fa-cart-arrow-down"></i>
								<h3>Safe Shopping</h3>
								<p>Variety of security measures implemented!</p>
							</div>
						</div>

					</div>
				</div>
				<!--/banners_grid -->
				<!--/slider conte -->
				<div class="container himb" style=" background-image: url({{asset('frontend/img/vlb.png')}}); background-size:cover; background-repeat:no-repeat">
					<div class="row">
					<div class="col-6">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('frontend/img/VL1.png')}}" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('frontend/img/VL2.png')}}" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{asset('frontend/img/VL3.png')}}" alt="Third slide">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<div class="col-6" style="margin:auto; padding:auto;" >
						<h1 style="font-size:80px; color:#fff;">VL100</h1>
						<h1>The Ultimate Desktop Solution</h1>
						<p style="font-size:18px; color:#fff;">Packed with the latest PCI certification, the classic and robust D210 can ensure your transaction throughout the day, which is a preferred choice for merchant who requires portability, large battery capacity and affordable.</p>
						<ul style="font-size:18px; color:#000;">
							<li>Desktop POS</li>
								<li>Ethernet, Wi-Fi, and Dial-Up Connectivity</li>
									<li>Large Scale Touch Screen Display</li>
										<li>Signature Capture</li>
						</ul>
						<a href="{{url('shop/valor-vl100-tabletop-terminal')}}" style="color:#fff" class="btn_1 mt-2 mb-4" >GET IT NOW</a>

					</div>

				</div>
			</div>

					<!--/slider conte -->

				<div class="container margin_60_35">
					<div class="main_title">
						<h2>Top Selling</h2>
						<span>Products</span>
						<p>We Provide Best Quality Products</p>
					</div>
					<div class="row small-gutters">
						@foreach($product as $item)

							<div class="col-6 col-md-4 col-xl-3">
									<div class="grid_item">
											<figure>
													@if($item->sale_price)
													<span class="ribbon off">-30%</span>
													@endif
													<a href="{{$item->type =='simple' ? url('shop/'.$item->slug) : url('digital') }}">
															<img class="img-fluid lazy pmv" style="image-size:contain; height:200px; width:auto; margin:auto; padding:auto;"  src="{{$item->product_image ? asset('backend/images/products/'.$item->product_image) : asset('frontend/img/product_placeholder.jpg') }}" data-src="{{$item->product_image ? asset('backend/images/products/'.$item->product_image) : asset('frontend/img/product_placeholder.jpg') }}" alt="">

													</a>
													@if($item->sale_price)
													<div data-countdown="2019/05/15" class="countdown"></div>
													@endif
											</figure>
											<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
											<a href="{{$item->type =='simple' ? url('shop/'.$item->slug) : url('digital') }}">
													<h3>{{$item->name}}</h3>
											</a>
											<div class="price_box">
													@if(!empty($item->sale_price))
													<span class="new_price">$48.00</span>
													@endif
													<span class="{{$item->sale_price ? 'old_price' : 'new_price'}}">${{$item->regular_price}}</span>
											</div>
											<ul>
													<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
													<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
													<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
											</ul>
									</div>
									<!-- /grid_item -->
							</div>


						@endforeach

					</div>
					<!-- /row -->
				</div>
				<!-- /container -->

						<div class="t_banner" >
							<div class="d-flex align-items-center" >
							</div>
							<img src="{{asset('frontend/img/add.png')}}" class="container" alt=" image">
						</div>
				<!-- /featured -->

				{{-- digital product --}}
				<div class="container margin_60_35">
					<div class="main_title">
						<h2>Digital</h2>
						<span>Products</span>
					</div>
					<div class="owl-carousel owl-theme products_carousel">
						@foreach($product_digital as $digital)
						<div class="item">
							<div class="grid_item">
								{{-- <span class="ribbon new">{{$feature->}}</span> --}}
								<figure>
									<a href="{{$digital->type =='simple' || $digital->type =='variable'  ? url('shop/'.$digital->slug) : url('digital/'.$digital->slug) }}">
										<img class="owl-lazy" style="width:auto; height:200px; margin:auto;" src="{{$digital->product_image ? asset('backend/images/products/'.$digital->product_image) : asset('frontend/img/product_placeholder.jpg')}}" data-src="{{$digital->product_image ? asset('backend/images/products/'.$digital->product_image) : asset('frontend/img/product_placeholder.jpg')}}" alt="">
									</a>
								</figure>
								<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
								<a href="{{$digital->type =='simple' || $digital->type =='variable'  ? url('shop/'.$digital->slug) : url('digital/'.$digital->slug) }}">
									<h3>{{$digital->name}}</h3>
								</a>
								<div class="price_box">
									<span class="new_price">{{$digital->regular_price ? '$'.$digital->regular_price : ''}}</span>
								</div>
								<ul>
									<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
									<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
									<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
								</ul>
							</div>
							<!-- /grid_item -->
						</div>
						@endforeach
						<!-- /item -->

						<!-- /item -->
					</div>
					<!-- /products_carousel -->
				</div>
				{{-- digital product --}}
				<div class="container margin_60_35">
					<div class="main_title">
						<h2>Featured</h2>
						<span>Products</span>
						<p>Original & High Quality Products Are Avialable Here</p>
					</div>
					<div class="owl-carousel owl-theme products_carousel">
						@foreach($product_featured as $feature)
						<div class="item">
							<div class="grid_item">
								{{-- <span class="ribbon new">{{$feature->}}</span> --}}
								<figure>
									<a href="{{url('shop/'.$feature->slug)}}">
										<img class="owl-lazy" style="width:auto; height:200px; margin:auto;" src="{{$feature->product_image ? asset('backend/images/products/'.$feature->product_image) : asset('frontend/img/product_placeholder.jpg')}}" data-src="{{$feature->product_image ? asset('backend/images/products/'.$feature->product_image) : asset('frontend/img/product_placeholder.jpg')}}" alt="">
									</a>
								</figure>
								<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
								<a href="{{url('shop/'.$feature->slug)}}">
									<h3>{{$feature->name}}</h3>
								</a>
								<div class="price_box">
									<span class="new_price">${{$feature->regular_price}}</span>
								</div>
								<ul>
									<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
									<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
									<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
								</ul>
							</div>
							<!-- /grid_item -->
						</div>
						@endforeach
						<!-- /item -->

						<!-- /item -->
					</div>
					<!-- /products_carousel -->
				</div>
				<!-- /container -->

				<div class="bg_gray">
					<div class="container margin_30">
						<div id="brands" class="owl-carousel owl-theme ">
							<div class="item">
								<a href="#0"><img src="{{asset('frontend/img/brands/placeholder_brands.png')}}" data-src="{{asset('frontend/img/brands/placeholder_brands.png')}}" alt="" class="owl-lazy"></a>
							</div><!-- /item -->
							<div class="item">
								<a href="#0"><img src="{{asset('frontend/img/brands/placeholder_brands.png')}}" data-src="{{asset('frontend/img/brands/placeholder_brands.png')}}" alt="" class="owl-lazy"></a>
							</div><!-- /item -->
							<div class="item">
								<a href="#0"><img src="{{asset('frontend/img/brands/placeholder_brands.png')}}" data-src="{{asset('frontend/img/brands/placeholder_brands.png')}}" alt="" class="owl-lazy"></a>
							</div><!-- /item -->
							<div class="item">
								<a href="#0"><img src="{{asset('frontend/img/brands/placeholder_brands.png')}}" data-src="{{asset('frontend/img/brands/placeholder_brands.png')}}" alt="" class="owl-lazy"></a>
							</div><!-- /item -->
							<div class="item">
								<a href="#0"><img src="{{asset('frontend/img/brands/placeholder_brands.png')}}" data-src="{{asset('frontend/img/brands/placeholder_brands.png')}}" alt="" class="owl-lazy"></a>
							</div><!-- /item -->
							<div class="item">
								<a href="#0"><img src="{{asset('frontend/img/brands/placeholder_brands.png')}}" data-src="{{asset('frontend/img/brands/placeholder_brands.png')}}" alt="" class="owl-lazy"></a>
							</div><!-- /item -->
						</div><!-- /carousel -->
					</div><!-- /container -->
				</div>
				<!-- /bg_gray -->
				{{-- @if($blog)

					<div class="container margin_60_35">
						<div class="main_title">
							<h2>Latest News</h2>
							<span>Blog</span>
						</div>
						<div class="row">

							@foreach ($blog as $item)

								<div class="col-lg-6">
									<a class="box_news" href="{{url('blog')}}">
										<figure>
											<img src="{{asset('backend/images/blogs/feature_image/'.$item->image)}}" data-src="backend/images/blogs/feature_image/{{$item->image}}" alt="" width="400" height="266" class="lazy">
											<figcaption><strong>{{$item->created_at->format('d')}}</strong>{{$item->created_at->format('M')}}</figcaption>
										</figure>
										<ul>

											<li>{{$item->created_at->format('Y,M,d')}}</li>
										</ul>
										<h4>{{$item->title}}</h4>

									</a>
								</div>


							@endforeach

						</div>
						<!-- /row -->
					</div>
				@endif --}}
		<!-- /container -->
		</main>

@endsection

@section('pop')
	<div id="toTop"></div><!-- Back to top button -->

			<div class="popup_wrapper">
				<div class="popup_content">
					<span class="popup_close">Close</span>
					<a href="{{url('shop')}}">
						<img class="img-fluid" src="{{asset('frontend/img/newsletter.png')}}" alt="" width="500" 	height="500">
					</a>
				</div>
			</div>

@endsection


{{-- @section('phone','phone'.$setting->title) --}}



