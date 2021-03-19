@extends('frontend.layouts.master')

@section('title','Digital | '.$product->name)
  
  @section('pagescss')
    <link href="{{asset('frontend/css/product_page.css')}}" rel="stylesheet">
  @endsection

@section('content')
<main class="bg_gray">
  <div class="container margin_30">
      <div class="page_header">
          <div class="breadcrumbs">
              <ul>
                  <li><a href="{{url('/')}}">Home</a></li>
                  <li><a href="#">Category</a></li>
                  <li><a href="#">{{$product->category_id ? $product->category->title : "Uncategories"}}</a></li>
                  <li style="text-transform: uppercase">{{$product->type}}</li>
                  <li>{{$product->name}}</li>
              </ul>
          </div>
          <h1>{{$product->name}}</h1>
      </div>
      <!-- /page_header -->
      <div class="row justify-content-center">
          <div class="col-lg-8">
              <div class="owl-carousel owl-theme prod_pics magnific-gallery">
                  <div class="item">
                      <a href="{{$product->product_image ? asset('backend/images/products/'.$product->product_image) : asset('frontend/img/product_placeholder.jpg')}}" data-effect="mfp-zoom-in"><img src="{{$product->product_image ? asset('backend/images/products/'.$product->product_image) : asset('frontend/img/product_placeholder.jpg')}}" alt=""></a>
                  </div>

                  <!-- /item -->
              </div>
              <!-- /carousel -->
          </div>
      </div>
      <!-- /row -->
  </div>
  <!-- /container -->
  
  <div class="bg_white">
      <div class="container margin_60_35">
          <div class="row justify-content-between">
              <div class="col-lg-6">
                  <div class="prod_info version_2">
                      <span class="rating">
                        <i class="icon-star voted"></i>
                        <i class="icon-star voted"></i>
                        <i class="icon-star voted"></i>
                        <i class="icon-star voted"></i>
                        <i class="icon-star"></i><em>4 reviews</em>
                      </span>
                      <p>
                        <small>{{$product->product_code ? 'SKU:'.$product->product_code : ''}}</small>
                        <br>
                        {!! $product->short_description !!}
                  </div>
              </div>
              {{-- <div class="col-lg-5">
                  <div class="prod_options version_2">
                      <div class="row">
                          <label class="col-xl-7 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                          <div class="col-xl-5 col-lg-5 col-md-6 col-6">
                              <div class="numbers-row">
                                  <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                  <div class="inc button_inc">+</div>
                                  <div class="dec button_inc">-</div>
                              </div>
                          </div>
                      </div>
                      <div class="row mt-3">
                          <div class="col-lg-7 col-md-6">
                              <div class="price_main"><span class="new_price">$148.00</span><span class="percentage">-20%</span> <span class="old_price">$160.00</span></div>
                          </div>
                          <div class="col-lg-5 col-md-6">
                              <div class="btn_add_to_cart"><a href="#0" class="btn_1">Add to Cart</a></div>
                          </div>
                      </div>
                  </div>
              </div> --}}
          </div>
          <!-- /row -->
      </div>
  </div>
  <!-- /bg_white -->

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
                            <div class="row">
                                @foreach($product_documents as $document)
                                <div class="col-4">
                                    <div class="col-lg-4 col-md-6">
                                    <div class="download"><a href="{{url('shop/download/'.$document->id)}}" class="btn_1">Download</a></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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

  <div class="bg_white">
      <div class="container margin_60_35">
          <div class="main_title">
              <h2>Related</h2>
              <span>Products</span>
         
          </div>
          <div class="owl-carousel owl-theme products_carousel">
            @foreach($product_related as $p_related)
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon new">{{$p_related->category_id ? $p_related->category->title : "Uncategories"}}</span>
                        <figure>
                            <a href="{{$p_related->type =='simple' || $p_related->type =='variable' ? url('shop/'.$p_related->slug) : url('digital/'.$p_related->slug) }}">
                        <img class="owl-lazy" src="{{asset('backend/images/products/'.$p_related->product_image)}}" style="height:200px; width:auto; margin:auto;" data-src="{{asset('backend/images/products/'.$p_related->product_image)}}" alt="">
                            </a>
                        </figure>
                        <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                        <a href="{{$p_related->type =='simple' || $p_related->type =='variable' ? url('shop/'.$p_related->slug) : url('digital/'.$p_related->slug) }}">
                            <h3>{{$p_related->name}}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">{{$p_related->regular_price ? '$'.$p_related->regular_price : ''}}</span>
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
  </div>
  <!-- /bg_white -->

</main>
@endsection

