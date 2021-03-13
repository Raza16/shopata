@extends('frontend.layouts.master')


@section('title','Blogs')

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
      <h1>ShopataClick Blog &amp; News</h1>
    </div> --}}
    <!-- /page_header -->
    <div class="row">
      <div class="col-lg-9">
        <div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
          <div class="form-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
            <button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
          </div>
        </div>
        <!-- /widget -->
        <div class="row">
          @foreach($blog as $item)
          <div class="col-md-6">
            <article class="blog">
              <figure>
                <a href="{{url('blog/'.$item->slug)}}"><img src="{{asset('backend/images/blogs/feature_image/'.$item->image)}}" alt="">
                  <div class="preview"><span>Read more</span></div>
                </a>
              </figure>
              <div class="post_info">
                <small>{{$item->created_at->format('M d,Y')}}</small>
                <h2><a href="{{url('blog')}}">{{$item->title}}</a></h2>
                {{-- <p>{!! Str::limit($item->description, 300, '...') !!}</p> --}}
                <ul>
                  <li>
                    <div class="thumb"><img src="{{asset('backend/images/logo.svg')}}" alt=""></div> Shop ata Click
                  </li>
                  <li><i class="ti-comment"></i>20</li>
                </ul>
              </div>
            </article>
            <!-- /article -->
          </div>
          @endforeach
          <!-- /col -->
          {{-- <div class="col-md-6">
            <article class="blog">
              <figure>
                <a href="{{url('single_blog')}}"><img src="{{asset('frontend/img/blog-2.jpg')}}" alt="">
                  <div class="preview"><span>Read more</span></div>
                </a>
              </figure>
              <div class="post_info">
                <small>Category - 20 Nov. 2017</small>
                <h2><a href="{{url('single_blog')}}">At usu sale dolorum offendit</a></h2>
                <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                <ul>
                  <li>
                    <div class="thumb"><img src="{{asset('frontend/img/avatar.jpg')}}" alt=""></div> Admin
                  </li>
                  <li><i class="ti-comment"></i>20</li>
                </ul>
              </div>
            </article>
            <!-- /article -->
          </div>
          <!-- /col -->
          <div class="col-md-6">
            <article class="blog">
              <figure>
                <a href="{{url('single_blog')}}"><img src="{{asset('frontend/img/blog-3.jpg')}}" alt="">
                  <div class="preview"><span>Read more</span></div>
                </a>
              </figure>
              <div class="post_info">
                <small>Category - 20 Nov. 2017</small>
                <h2><a href="{{url('single_blog')}}">Iusto nominavi petentium in</a></h2>
                <p>Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.</p>
                <ul>
                  <li>
                    <div class="thumb"><img src="{{asset('frontend/img/avatar.jpg')}}" alt=""></div> Admin
                  </li>
                  <li><i class="ti-comment"></i>20</li>
                </ul>
              </div>
            </article>
            <!-- /article -->
          </div> --}}
          <!-- /col -->
        
          <!-- /col -->
       
          <!-- /col -->
         
          <!-- /col -->
        </div>
        <!-- /row -->

        <div class="pagination__wrapper no_border add_bottom_30">
          <ul class="pagination">
            <li><a href="#0" class="prev" title="previous page">❮</a></li>
            <li>
              <a href="#0" class="active">1</a>
            </li>
            <li>
              <a href="#0">2</a>
            </li>
            <li>
              <a href="#0">3</a>
            </li>
            <li>
              <a href="#0">4</a>
            </li>
            <li><a href="#0" class="next" title="next page">❯</a></li>
          </ul>
        </div>
        <!-- /pagination -->

      </div>
      <!-- /col -->

      <aside class="col-lg-3">
        <div class="widget search_blog d-none d-sm-none d-md-none d-lg-block">
          <div class="form-group">
            <input type="text" name="search" id="search_blog" class="form-control" placeholder="Search..">
            <button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
          </div>
        </div>
        <!-- /widget -->
        <div class="widget">
          <div class="widget-title">
            <h4>Latest Post</h4>
          </div>
          <ul class="comments-list">
            @foreach ($latest as $item)
            <li>
              <div class="alignleft">
                <a href="{{url('blog/'.$item->slug)}}"><img src="{{asset('backend/images/blogs/feature_image/'.$item->image)}}" alt=""></a>
              </div>
              <small>{{$item->created_at}}</small>
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
            @foreach ($blog as $item)
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