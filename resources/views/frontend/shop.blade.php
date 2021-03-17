  @extends('frontend.layouts.master')


    @section('title','Shop Buy')
      
    @section('pagecss')
    <link href="{{asset('frontend/css/listing.css')}}" rel="stylesheet">
    <style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>
    @endsection

    @section('content')

    <main style="margin-bottom: 390px; transform: none;">
      
          <div class="top_banner">

            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)" style="background-color: rgba(0, 0, 0, 0.3);">
              <div class="container">
                <div class="breadcrumbs">
                  <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">Category</a></li>
                    {{-- <li>Page active</li> --}}
                  </ul>
                </div>
                <h1>Shop</h1>
              </div>
            </div>
            <img src="{{asset('frontend/img/bg_cat_shoes.jpg')}}" class="img-fluid" alt="">
          </div>
          
          <div id="stick_here" style="height: 0px;"></div>

          <div class="toolbox elemento_stick">

            <div class="container">

              <ul class="clearfix">

                <li>
                  <div class="sort_select">
                    <select name="sort" id="sort">
                      <option value="popularity" selected="selected">Sort by popularity</option>
                      <option value="rating">Sort by average rating</option>
                      <option value="date">Sort by newness</option>
                      <option value="price">Sort by price: low to high</option>
                      <option value="price-desc">Sort by price: high to
                      </option>
                    </select>
                  </div>
                </li>

                {{-- <li>
                  <a href="#0"><i class="ti-view-grid"></i></a>
                  <a href="listing-row-2-sidebar-right.html"><i class="ti-view-list"></i></a>
                </li> --}}

                <li>
                  <a href="#0" class="open_filters">
                  <i class="ti-filter"></i><span>Filters</span>
                  </a>
                </li>

              </ul>

            </div>

          </div>
          
          <div class="container margin_30" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-lg-9">
                  @if(!empty($product))  

                    <div class="row small-gutters">

                      @foreach($product as $item)
                        <div class="col-6 col-md-4" >

                          <div class="grid_item" style="">
                            @if(empty($item->sale_price == null))
                            <span class="ribbon off">{{$item->sale_price}}</span>
                            @endif
                            <figure>
                              <a href="{{url('shop/'.$item->slug)}}">
                                <img class="img-fluid lazy loaded" style="image-size: contain; height:250px; width:auto;" src="{{$item->product_image ? asset('backend/images/products/'.$item->product_image) : asset('frontend/img/product_placeholder.jpg') }}" data-src="{{ $item->product_image ? asset('backend/images/products/'.$item->product_image) : 'https://via.placeholder.com/200x200?text=Product Image'}}" alt="" data-was-processed="true">
                              </a>
                            </figure>
                            <a href="{{url('shop/'.$item->slug)}}">
                              <h3>{{$item->name}}</h3>
                            </a>
                            <div class="price_box">
                              @if(empty($item->sale_price == null ))
                              <span class="new_price">{{$item->sale_price}}</span>
                              @endif
                              <span class=" {{$item->sale_price ? 'old_price' : 'new_price'}} ">{{$item->regular_price == 0 ? ' ' : '$'}}{{$item->regular_price ? $item->regular_price : ' '}}</span>
                            </div>
                            <ul>
                              <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to favorites">
                                  <i class="ti-heart"></i>
                                  <span>Add to favorites</span>
                                </a>
                              </li>
                              <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to compare">
                                  <i class="ti-control-shuffle"></i>
                                  <span>Add to compare</span>
                                </a>
                              </li>
                              <li>
                                <a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to cart">
                                  <i class="ti-shopping-cart"></i>
                                  <span>Add to cart</span>
                                </a>
                              </li>
                            </ul>
                          </div>

                        </div>
                      @endforeach
                        
                    </div>
  
                  @else
                  <div class="row small-gutters">
                    
                      <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif"><b>Product Not Found</b></h1>
                    
                  </div>

                  @endif

                  <div class="pagination__wrapper">
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

                </div>
              
              <aside class="col-lg-3" id="sidebar_fixed" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
              
              <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; left: 994.5px; top: 0px;">

                <div class="filter_col">
                    
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>

                    <div class="filter_type version_2">
                      <h4><a href="#filter_1" data-toggle="collapse" class="opened">Categories</a></h4>
                      <div class="collapse show" id="filter_1">
                        <ul>
                          @foreach($category as $citem)
                          <li>
                          <label class="container_check">{{$citem->title}} <small>{{$citem->product->count()}}</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    
                    </div>
                    
                    {{-- <div class="filter_type version_2">
                      <h4><a href="#filter_2" data-toggle="collapse" class="opened">Color</a></h4>
                      <div class="collapse show" id="filter_2">
                        <ul>
                          <li>
                          <label class="container_check">Blue <small>06</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                          <li>
                          <label class="container_check">Red <small>12</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                          <li>
                          <label class="container_check">Orange <small>17</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                          <li>
                          <label class="container_check">Black <small>43</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                        </ul>
                      </div>
                    </div> --}}
                    
                    <div class="filter_type version_2">
                      <h4><a href="#filter_3" data-toggle="collapse" class="closed">Brands</a></h4>
                      <div class="collapse" id="filter_3">
                        <ul>
                          @foreach ($brand as $bitem)
                          <li>
                          <label class="container_check">{{$bitem->title}} <small>{{$bitem->product->count()}}</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    
                    {{-- <div class="filter_type version_2">
                      <h4><a href="#filter_4" data-toggle="collapse" class="closed">Price</a></h4>
                      <div class="collapse" id="filter_4">
                        <ul>
                          <li>
                          <label class="container_check">$0 — $50<small>08</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                          <li>
                          <label class="container_check">$50 — $100<small>08</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                          <li>
                          <label class="container_check">$100 — $150<small>05</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                          <li>
                          <label class="container_check">$150 — $200<small>18</small>
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          </label>
                          </li>
                        </ul>
                      </div>
                    </div> --}}
                    
                      {{-- <div class="buttons">
                        <a href="#0" class="btn_1">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
                      </div> --}}
                </div>

                  <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                    <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">

                    <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 315px; height: 1208px;"></div>
                    
                    </div>
                    <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                      <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                      </div>
                    </div>
                  </div>
                  
                </div>
                </aside>
            
            </div>
            
          </div>
      
    </main>


    @endsection



    @section('script')
    <script src="{{asset('frontend/js/sticky_sidebar.min.js')}}"></script>
    <script src="{{asset('frontend/js/specific_listing.js')}}"></script>
    @endsection