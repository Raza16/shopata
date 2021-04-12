@extends('frontend.layouts.master')


  @section('title','Shop | '.$product->name)

  @section('pagecss')
  <link href="{{asset('frontend/css/product_page.css')}}" rel="stylesheet">

  @endsection


  @section('content')

  <main>
    <div class="container margin_30">
      @if(empty($product->sale_price == null ))
        <div class="countdown_inner">-20% This offer ends in <div data-countdown="2019/05/15" class="countdown"></div>
        </div>
      @endif

        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                          {{-- @foreach($product as $image) --}}
                            <div style="background-image: url('{{$product->product_image ? asset('backend/images/products/'.$product->product_image) : asset('frontend/img/product_placeholder.jpg')}}'); background-size: contain;
                                margin: auto; background-repeat: no-repeat;" class="item-box"></div>

                          @foreach($product_grallery as $image)
                            <div style="background-image: url('{{asset('backend/images/product_gallery/'.$image->image)}}');background-size: contain;margin: auto;background-repeat: no-repeat;" class="item-box"></div>
                            @endforeach

                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <div style="background-image: url('{{asset('backend/images/products/'.$product->product_image)}}');" class="item active"></div>

                          @foreach($product_grallery as $image)
                           <div style="background-image: url('{{asset('backend/images/product_gallery/'.$image->image)}}');" class="item"></div>
                          @endforeach

                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>{{$product->category_id ? $product->category->title : "Uncategories"}}</li>
                        <li>{{$product->name }}</li>
                        <li style="text-transform: uppercase">{{$product->type }}</li>
                    </ul>
                </div>
                <!-- /page_header -->
                <div class="prod_info">
                    <h1>{{$product->name}}</h1>
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
                    <p>

                      <small>{{$product->product_code ? 'SKU:'.$product->product_code : ''}}</small><br>
                      <small style="text-transform: uppercase">{{$product->stock}}</small><br>
                      {!! $product->short_description !!}

                    </p>

                    <div class="prod_options">
                        {{-- attributes --}}
                        {{-- <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
                                <ul>
                                    <li><a href="#0" class="color color_1 active"></a></li>
                                    <li><a href="#0" class="color color_2"></a></li>
                                    <li><a href="#0" class="color color_3"></a></li>
                                    <li><a href="#0" class="color color_4"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-toggle="modal" data-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="custom-select-form">
                                    <select class="wide">
                                        <option value="" selected>Small (S)</option>
                                        <option value="">M</option>
                                        <option value=" ">L</option>
                                        <option value=" ">XL</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main">
                              @if(empty($product->sale_price == null ))
                              <span class="new_price">{{$product->sale_price}}</span><span class="percentage">%</span>
                              @endif
                              <span class="{{$product->sale_price ? 'old_price' : 'new_price'}}">${{$product->regular_price}}</span></div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_add_to_cart"><a href="#0" class="btn_1">Add to Cart</a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Reviews</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                Description
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    {!! $product->long_description !!}
                                    {{-- {!! Str::limit($product->long_description, 700, '') !!} --}}
                                    {{-- @if (strlen($product->long_description) > 700)
                                        <span id="dots">.....</span>
                                        <span id="more"></span>
                                        <br>
                                    @endif --}}

                                    {{-- <button onclick="myFunction()" id="myBtn" class="btn btn-primary">Read more</button>    --}}
                                </div>



                                @if(!empty($product->weight))
                                    <div class="col-lg-5">
                                        <h3>Specifications</h3>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-striped">
                                                <tbody>
                                                    <tr>
                                                    @if(!empty($product->weight))
                                                        <td><strong>Weight</strong></td>
                                                        <td>{{$product->weight ? $product->weight : ' '}}</td>
                                                    @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /table-responsive -->
                                    </div>
                                @endif

                            </div>

                            @if($product_documents)
                                    @foreach($product_documents as $document)

                                        <div class="download">
                                            <a href="{{url('shop/download/'.$document->id)}}" class="btn_1">{{Str::limit($document->document, 20)}}</a>
                                        </div>

                                        <br>

                                    @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Reviews
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 54 minutes ago</em>
                                        </div>
                                        <h4>"Commpletely satisfied"</h4>
                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>4.0/5.0</em></span>
                                            <em>Published 1 day ago</em>
                                        </div>
                                        <h4>"Always the best"</h4>
                                        <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
                                            <em>Published 3 days ago</em>
                                        </div>
                                        <h4>"Outstanding"</h4>
                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 4 days ago</em>
                                        </div>
                                        <h4>"Excellent"</h4>
                                        <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <p class="text-right"><a href="{{url('leave/'.$product->slug)}}" class="btn_1">Leave a review</a></p>
                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Related</h2>
            <span>Products</span>
            {{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> --}}
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach($product_related as $p_related)
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon new">{{$product->category_id ? $product->category->title : "Uncategories"}}</span>
                        <figure>
                            <a href="{{url('shop/'.$p_related->slug)}}">
                        <img class="owl-lazy" src="{{asset('backend/images/products/'.$p_related->product_image)}}" style="height:200px; width:auto; margin:auto;" data-src="{{asset('backend/images/products/'.$p_related->product_image)}}" alt="">
                            </a>
                        </figure>
                        <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                        <a href="{{url('shop/'.$p_related->slug)}}">
                            <h3>{{$p_related->name}}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">${{$p_related->regular_price}}</span>
                        </div>
                        <ul>
                            <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
                            </li>
                            <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a>
                            </li>
                            <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
            @endforeach

        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

    <div class="feat">
    <div class="container">
      <ul>
        <li>
          <div class="box">
            <i class="ti-gift"></i>
            <div class="justify-content-center">
              <h3>Free Shipping</h3>
              <p>For all oders over $99</p>
            </div>
          </div>
        </li>
        <li>
          <div class="box">
            <i class="ti-wallet"></i>
            <div class="justify-content-center">
              <h3>Secure Payment</h3>
              <p>100% secure payment</p>
            </div>
          </div>
        </li>
        <li>
          <div class="box">
            <i class="ti-headphone-alt"></i>
            <div class="justify-content-center">
              <h3>24/7 Support</h3>
              <p>Online top support</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!--/feat-->

</main>

  @endsection

@section('pop')
<div id="toTop"></div><!-- Back to top button -->

    <div class="top_panel">
        <div class="container header_panel">
            <a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
            <label>1 product added to cart</label>
        </div>
        <!-- /header_panel -->
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="item_panel">
                            <figure>
                                <img src="{{asset('backend/images/products/'.$product->product_image)}}" data-src="{{asset('backend/images/products/'.$product->product_image)}}" class="lazy" alt="">
                            </figure>
                            <h4>{{$product->name}}</h4>

                            <div class="price_panel">
                                <span class="{{$product->sale_price ? 'new_price' : ''}}">{{$product->sale_price ? '$'.$product->sale_price : ' '}}</span>
                                {{-- <span class="percentage">-20%</span>  --}}
                                <span class="{{$product->sale_price ? 'old_price' : 'new_price'}}">${{$product->regular_price}}</span></div>
                            </div>
                    </div>
                    <div class="col-md-5 btn_panel">
                        <a href="#" class="btn_1 outline">View cart</a> <a href="#" class="btn_1">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /item -->
        {{-- <div class="container related">
            <h4>Who bought this product also bought</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="item_panel">
                        <a href="#0">
                            <figure>
                                <img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/2.jpg" alt="" class="lazy">
                            </figure>
                        </a>
                        <a href="#0">
                            <h5>Armor Okwahn II</h5>
                        </a>
                        <div class="price_panel"><span class="new_price">$90.00</span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item_panel">
                        <a href="#0">
                            <figure>
                                <img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/3.jpg" alt="" class="lazy">
                            </figure>
                        </a>
                        <a href="#0">
                            <h5>Armor Air Wildwood ACG</h5>
                        </a>
                        <div class="price_panel"><span class="new_price">$75.00</span><span class="percentage">-20%</span> <span class="old_price">$155.00</span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item_panel">
                        <a href="#0">
                            <figure>
                                <img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/4.jpg" alt="" class="lazy">
                            </figure>
                        </a>
                        <a href="#0">
                            <h5>Armor ACG React Terra</h5>
                        </a>
                        <div class="price_panel"><span class="new_price">$110.00</span></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /related -->
    </div>

@endsection

  @section('script')

  {{-- <script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";

            }
    }
  </script> --}}

  <script src="{{asset('frontend/js/carousel_with_thumbs.js')}}"></script>


  @endsection
