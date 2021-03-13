@extends('frontend.layouts.master')


@section('title','Blog | '.$blog->title)
    @section('pagecss')
    <link href="{{asset('frontend/css/blog.css')}}" rel="stylesheet">
    @endsection
  @section('content')
  <main class="bg_gray" style="margin-bottom: 390px;">
		<div class="container margin_30">
			{{-- <div class="page_header">
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Category</a></li>
						<li>Page active</li>
					</ul>
				</div>
			</div> --}}
			<!-- /page_header -->
			<div class="row">
				<div class="col-lg-9">
					<div class="singlepost">
						<figure><img alt="" class="img-fluid" src="{{asset('backend/images/blogs/feature_image/'.$blog->image) }}"></figure>
						<h1>{{$blog->title}}</h1>
						<div class="postmeta">
							<ul>
								{{-- <li><a href="#"><i class="ti-folder"></i> Category</a></li> --}}
								<li><i class="ti-calendar"></i>{{$blog->created_at->format('M d,Y')}}</li>
								<li><a href="#"><i class="ti-user"></i>Shop ata Click</a></li>
								{{-- <li><a href="#"><i class="ti-comment"></i> (14) Comments</a></li> --}}
							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
							{!! ($blog->description) !!}
						</div>
						<!-- /post -->
					</div>
					<!-- /single-post -->

					<div id="comments">
						<h5>Comments</h5>
						<ul>
							<li>
								<div class="avatar">
									<a href="#"><img src="{{('frontend/img/avatar1.jpg')}}" alt="">
									</a>
								</div>
								<div class="comment_right clearfix">
									<div class="comment_info">
										By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
									</div>
									<p>
										Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
									</p>
								</div>
								<ul class="replied-to">
									<li>
										<div class="avatar">
											<a href="#"><img src="{{('frontend/img/avatar2.jpg')}}" alt="">
											</a>
										</div>
										<div class="comment_right clearfix">
											<div class="comment_info">
												By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
											</div>
											<p>
												Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
											</p>
											<p>
												Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
											</p>
										</div>
										<ul class="replied-to">
											<li>
												<div class="avatar">
													<a href="#"><img src="{{('frontend/img/avatar2.jpg')}}" alt="">
													</a>
												</div>
												<div class="comment_right clearfix">
													<div class="comment_info">
														By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
													</div>
													<p>
														Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
													</p>
													<p>
														Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
													</p>
												</div>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<div class="avatar">
									<a href="#"><img src="{{('frontend/img/avatar3.jpg')}}" alt="">
									</a>
								</div>

								<div class="comment_right clearfix">
									<div class="comment_info">
										By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
									</div>
									<p>
										Cursus tellus quis magna porta adipiscin
									</p>
								</div>
							</li>
						</ul>
					</div>

					<hr>

					<h5>Leave a comment</h5>
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<input type="text" name="name" id="name2" class="form-control" placeholder="Name">
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<input type="text" name="email" id="email2" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<input type="text" name="email" id="website3" class="form-control" placeholder="Website">
							</div>
						</div>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Comment"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
					</div>
					
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget search_blog">
						<div class="form-group">
							<input type="text" name="search" id="blog_search" class="form-control" placeholder="Search..">
							<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
						</div>
					</div>
					<div id="blog_list"></div>
						{{ csrf_field() }}
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Latest Post</h4>
						</div>
						<ul class="comments-list">
							@foreach($latest as $item)
							<li>
								<div class="alignleft">
									<a href="{{url('blog/'.$item->slug)}}"><img src="{{asset('backend/images/blogs/feature_image/'.$item->image)}}" alt=""></a>
								</div>
								<small>{{$item->created_at->format('M,d,Y')}}</small>
								<h3><a href="{{url('blog/'.$item->slug)}}" title="">{{$item->title}}</a></h3>
							</li>
							@endforeach
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Categories</h4>
						</div>
						<ul class="cats">
							@foreach ($latest	 as $item)
							<li>
								<a href="#">
										{{$item->category->title ?? ''}}
								</a>
							</li> 
							@endforeach    
							
						</ul>
					</div>
					<!-- /widget -->
					{{-- <div class="widget">
						<div class="widget-title">
							<h4>Popular Tags</h4>
						</div>
						<div class="tags">
							<a href="#">Food</a>
							<a href="#">Bars</a>
							<a href="#">Cooktails</a>
							<a href="#">Shops</a>
							<a href="#">Best Offers</a>
							<a href="#">Transports</a>
							<a href="#">Restaurants</a>
						</div>
					</div> --}}
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>

  @endsection

	@section('script')
	<script>

				$(document).ready(function(){
					$("#blog_search").keyup(function(){
							var query =$(this).val();
							console.log(query);
					});
				
				});


	</script>
	@endsection