@extends('admin.layouts.master')


@section('title','Product Add')

  @section('pageheadlinks')
  <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <style>
    .select2-container--default .select2-selection--single .select2-selection__rendered{
      color: #444;
      line-height: 18px;
      margin-top: -9px;
      margin-left: -20px
    }
  </style>

  @endsection

@section('content')
<div class="row">
    <div class="col-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Product Add</h3>
                <form class="forms-sample" action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group">
                            <label for="productname"><h5>Product Name</h5></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{old('name')}}" autofocus>
                            @error('name')
                                <p style="font-size:20px"><small class="text-danger">{{ $errors->first('name') }}</small></p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug"><h5>slug</h5></label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{old('slug')}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="slug"><h5>Product code</h5></label>
                            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="product code" value="{{old('product_code')}}">
                        </div>

                        <div class="form-group" >
                            <label for="long_description"><h5>Descripton</h5></label>
                            <textarea type="text" class="form-control" id="description" rows="10" name="long_description" >{{old('long_description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="short_description"><h5>Short Descripton</h5></label>
                            <textarea type="text" class="form-control" id="short_description" name="short_description">{{old('short_description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="document">Document Attach</label>
                            <input type="file" multiple="multiple" name="document[]" class="form-control document_name" id="document">
                        </div>
                                                                              {{-- seo tab --}}
                        <div class="form-group">
                            <div class="card" style="background-color: #f7f7f0">
                            <div class="card-header bg-primary" role="tab" id="heading-13">
                                <h6 class="mb-0">
                                <a data-toggle="collapse" href="#seo-13" aria-expanded="false" aria-controls="collapse-13" class="collapsed" style="text-decoration: none;color: #FFFFFF;">
                                    SEO
                                </a>
                                </h6>
                            </div>
                            <div id="seo-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5" style="">
                                <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                    <label for="metatitle">meta title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{old('meta_title')}}"/>
                                    @error('meta_title')
                                    <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                                    @enderror
                                    </div>

                                    <div class="form-group col-12">
                                    <label for="metadescription">meta Descripton</label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description">{{old('meta_description')}}</textarea>
                                    @error('meta_description')
                                    <p><small class="text-danger">{{ $errors->first('meta_description') }}</small></p>
                                    @enderror
                                    </div>

                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                                                                             {{-- seo tab end--}}

                                                          {{-- prdouct variation product data--}}

                        <div class="form-group">
                            <div class="card" style="background-color: #f7f7f0">

                                    <div class="card-header bg-primary" role="tab" id="heading-13">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" href="#genral-13" aria-expanded="false" aria-controls="collapse-13" class="collapsed" style="text-decoration: none;color: #FFFFFF;">
                                            General
                                            </a>
                                        </h6>
                                    </div>

                                <div id="genral-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5" style="">
                                    <div class="card-body">
                                        <div class="row">


                                            <div class="form-group col-6">
                                                <label for="quantity">Product Type</label>
                                                <select name="product_type" id="product_type" class="form-control">
                                                    <option value="simple" selected>Simple</option>
                                                    <option value="digital">Digital Product</option>
                                                    <option value="variable">Variable</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="regular_price">Regular Price</label>
                                                <input type="number" class="form-control" id="regular_price" name="regular_price" placeholder="$0.00" value="{{old('regular_price')}}">
                                                @error('regular_price')
                                                <p><small class="text-danger">{{ $errors->first('regular_price') }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="regular_price">Sale Price</label>
                                                <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="$0.00" value="{{old('sale_price')}}">
                                                @error('sale_price')
                                                <p><small class="text-danger">{{ $errors->first('sale_price') }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{old('quantity')}}">
                                                @error('quantity')
                                                <p><small class="text-danger">{{ $errors->first('quantity') }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="quantity">Stock</label>
                                                <select name="stock" id="stock" class="form-control">
                                                    <option value="instock">In stock</option>
                                                    <option value="outstock" selected >Out of stock</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="item_weight">Item Weight</label>
                                                <input type="text" class="form-control" id="item_weight" name="item_weight" placeholder="0.00 kg" value="{{old('item_weight')}}">
                                                @error('item_weight')
                                                <p><small class="text-danger">{{ $errors->first('item_weight') }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="item_dimension">Item Dimension</label>
                                                <input type="text" class="form-control" id="item_dimension" name="item_dimension" placeholder=" " value="{{old('item_dimension')}}">
                                                @error('item_dimension')
                                                <p><small class="text-danger">{{ $errors->first('item_dimension') }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6 ">
                                                <label for="tax_status">Tax status</label>
                                                <input type="text" class="form-control" id="tax_status" name="tax_status" placeholder=" " value="{{old('tax_status')}}">
                                                @error('tax_status')
                                                <p><small class="text-danger">{{ $errors->first('tax_status') }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="tax_class">Tax Class</label>
                                                <input type="text" class="form-control" id="tax_class" name="tax_class" placeholder=" " value="{{old('tax_class')}}">
                                                @error('tax_class')
                                                <p><small class="text-danger">{{ $errors->first('tax_class') }}</small></p>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                                                          {{-- product variation end --}}
                        {{-- <div class="form-group">
                            <div class="card" style="background-color: #f7f7f0">

                                    <div class="card-header bg-primary" role="tab" id="heading-13">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" href="#variation" aria-expanded="false" aria-controls="collapse-13" class="collapsed" style="text-decoration: none;color: #FFFFFF;">
                                            Variations
                                            </a>
                                        </h6>
                                    </div>

                                <div id="variation" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5" style="">
                                    <div class="card-body">
                                        <div class="row">


                                            <div class="form-group col-6">
                                                <label for="variation">Variation</label>
                                                <select name="variation" id="variation" class="form-control">

                                                    <option value="" selected>--- Custom Variations ---</option>

                                                    @foreach ($variation as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-6" id="variation-option">
                                                <label for="variation">Variation Option</label>
                                                <select name="variation" id="variation-option" class="form-control">

                                                    <option value="" selected>--- Custom Variations ---</option>

                                                    @foreach ($variation as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

            </div>
        </div>
    </div>


    <div class="col-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

                                  {{-- Publish or Draft --}}
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                              <option value="publish" selected class="form-group">Publish</option>
                              <option value="draft" class="form-group">Draft</option>
                            </select>
                          </div>

                              {{-- product image --}}
                          <div class="form-group">
                            <label>Product Image</label>
                            <div style="width:200px; border:1px solid #d9dee4;">
                                <img style="max-width:200px;max-height:200px;display:block;" class="for-image" src="https://via.placeholder.com/200x200?text=Product Image"/>
                                <button type="button" style="background:#d9dee4; border-radius:0px;width:200px;cursor:pointer;font-size:12px;font-weight:600;" class="upload-button btn btn-default"><i style="font-size:14px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>
                                <input style="display:none;" class="file-upload" type="file" name="image" accept="image/*"/>
                            </div>
                            @error('profile_image')
                                <p><small class="text-danger">{{ $errors->first('profile_image') }}</small></p>
                            @enderror
                          </div>
                            {{-- product image end --}}
                              {{-- product brand --}}

                            <div class="form-group">
                              <label class="col-8 col-form-label">Brands</label>
                              <div class="col-sm-9">
                                <select class="form-control select2" name="brand_id">
                                  <option value="" selected>Uncategories</option>
                                  @foreach ($brand as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                              {{-- product brand end --}}

                             {{-- product categories --}}
                            <div class="form-group">
                              <label class="col-8 col-form-label">Categories</label>
                              <div class="col-sm-9">
                                <select class="form-control select2" name="category_id">
                                  <option value="" selected >Uncategories</option>
                                  @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                  @endforeach

                                </select>
                              </div>

                            </div>
                              {{-- product category end --}}


                              {{-- product grallery image --}}
                              <div class="form-group">

                                <label>Product Grallery</label>

                                <div class="user-image mb-3 text-center">
                                  <div class="imgPreview"> </div>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="gallery_image[]" class="custom-file-input" id="images" multiple="multiple">
                                    <label class="custom-file-label" for="images">Choose image</label>
                                </div>
                                    {{-- <input  class="file-upload" type="file" multiple name="gallery_image[]" accept="image/*"/> --}}

                                @error('gallery_image')
                                    <p><small class="text-danger">{{ $errors->first('gallery_image') }}</small></p>
                                @enderror

                              </div>
                              {{-- product grallery image end--}}


        </div>
      </div>
    </div>

  <div class="col-12 form-group">
    <button type="submit" name="submit" class="col-12 btn btn-primary mr-2">Submit</button>
  </div>
   </form>

</div>


@endsection

@section('script')

    <script>
    $(".select2").select2();
    </script>

    <script>
      $('#category').select2({
        selectOnClose: true
      });
    </script>

    <script>
      $('#brand').select2({
        selectOnClose: true
      });
    </script>




{{-- slug --}}
  <script>
    $("#name").keyup(function(){
      var str = $(this).val();
      var trims = $.trim(str)
      var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
      $("#slug").val(slug.toLowerCase());
    });
  </script>

{{-- image div --}}
  <script>
      // image show in div
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.for-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
           $(".file-upload").click();
        });


    });
  </script>
{{-- multi image --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="80px" height="80px">')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#images').on('change', function() {
        multiImgPreview(this, 'div.imgPreview');
    });
    });
</script>
{{-- add custome product attribute --}}
  <script>

    CKEDITOR.replace( 'description', {

    });


    CKEDITOR.replace( 'short_description', {

    });

  </script>

  {{-- ////////////////variation option get /////////////////////////////// --}}

  {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}

  {{-- <script>

      $(document).ready(function () {

        $("#variation").change(function(){

                // alert('hello');
            var id  =  $('#variation option:selected').val();
            var url =  "{{url('admin/variation-get')}}/"+id;

            // alert(url);

            $.ajax({
                url:url,
                type:'GET',
                datatype:'json',
                data:{
                _token : id
                },
                success:function(response){
                    // alert(response.success);
                    var res= response.success;

                    $("#variation-option").append("<label>Variation Option</label>"+
                                                "<select name='variation' class='form-control'>"+
                                                "@foreach ($variation_option as $item)"+
                                                    "<option>{{$item->name}}</option>"+
                                                "@endforeach"+
                                                "</select>");



                    // console.log(res);
                },
                error:function(){
                    alert("error");
                }
            });


        });

      });
  </script> --}}

  {{-- ////////////////variation option get /////////////////////////////// --}}


      {{-- //editor --}}
      <script src="{{asset('backend/js/editorDemo.js')}}"></script>
      <script src="{{asset('backend/js/todolist.js')}}"></script>
      <script src="{{asset('backend/js/select2.js')}}"></script>
      {{-- ///////modal --}}
      <script src="{{asset('backend/js/modal-demo.js')}}"></script>
      <script src="{{asset('backend/js/dropify.js')}}"></script>
      <script src="{{asset('backend/js/dropzone.js')}}"></script>
      <script src="{{asset('backend/js/jquery-file-upload.js')}}"></script>


@endsection
