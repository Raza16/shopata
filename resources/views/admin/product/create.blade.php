@extends('admin.layouts.master')


@section('title','Product Add')

  @section('pageheadlinks')
  <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>

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
                <form class="forms-sample" action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data" id="productadd">
                    @csrf

                    <div class="form-group">
                        <label for="productname"><h5>Product Name</h5></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{old('name')}}">
                        @error('title')
                        <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug"><h5>slug</h5></label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{old('slug')}}" readonly>
                        @error('slug')
                          <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="slug"><h5>Product code</h5></label>
                      <input type="text" class="form-control" id="product_code" name="product_code" placeholder="product code" value="{{old('product_code')}}">
                    </div>

                    <div class="form-group" >
                      <label for="description"><h5>Descripton</h5></label>
                      <textarea type="text" class="form-control" id="description" rows="10" name="long_description" >{{old('long_description')}}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="shortdescription"><h5>Short Descripton</h5></label>
                      <textarea type="text" class="form-control" id="short_description" name="short_description">{{old('short_description')}}</textarea>
                    </div>

                    {{-- <div class="form-group">
                      <table>
                        <tbody>
                          @foreach ($product_documents as $document)
                            <tr>
                              <td>
                                  <input type="text" value="{{$document->document}}" name="document[]" readonly class="form-control">
                              </td>
                              <td>
                                  <button type="button" class="deletedocument deletedoc btn-sm btn-default form-control" data-id="{{url('admin/product/documentdelete/'.$document->id)}}" ><i style="color:red;" class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                              @endforeach
                        </tbody>
                      </table>
                    </div> --}}

                    <div class="form-group">
                      <table>
                        <tbody  class="new_document">

                        </tbody>
                      </table>
                    </div>

                    {{-- <div class="form-group">
                      <label for="document">Document Attach</label>
                      <input type="file" multiple="multiple" name="document[]" class="form-control document_name" id="document">
                    </div> --}}
                    <div class="form-group">
                        <button type="button" class="btn btn-info btn-sm" id="add-document">Add File</button>
                    </div>

                    {{-- seo tab --}}

                    <div class="form-group">
                      <div class="card" style="background-color: #f7f7f0">
                        <div class="card-header bg-info" role="tab" id="heading-13">
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

                    {{-- general info --}}


                    <div class="form-group">
                        <div class="card" style="background-color: #f7f7f0">

                                <div class="card-header bg-info" role="tab" id="heading-13">
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
                                                <option value="simple" >Simple</option>
                                                <option value="digital" >Digital Product</option>
                                                <option value="variable" >Variable</option>
                                              </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="regular_price">Regular Price</label>
                                            <input type="number" step="0.02" class="form-control" id="regular_price" name="regular_price" placeholder="$0.00" value="{{old('regular_price')}}">
                                            @error('regular_price')
                                            <p><small class="text-danger">{{ $errors->first('regular_price') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="sale_price">Sale Price</label>
                                            <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="$0.00" value="{{old('sale_price')}}">
                                            @error('sale_price')
                                            <p><small class="text-danger">{{ $errors->first('sale_price') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{old('quantity')}}">
                                            @error('quantity')
                                            <p><small class="text-danger">{{ $errors->first('quantity') }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="quantity">Stock</label>
                                            <select name="stock" id="stock" class="form-control">
                                                <option value="instock" >In stock</option>
                                                <option value="outstock" >Out of stock</option>
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
                                            <input type="text" class="form-control" id="tax_class" name="tax_class" placeholder=" " value="{{old('tax_clas')}}">
                                            @error('tax_class')
                                            <p><small class="text-danger">{{ $errors->first('tax_class') }}</small></p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                                                              {{-- variation --}}
                    {{-- <div class="form-group">
                      <div class="card" style="background-color: #f7f7f0">
                        <div class="card-header bg-primary" role="tab" id="heading-13">
                          <h6 class="mb-0">
                            <a data-toggle="collapse" href="#variation-13" aria-expanded="false" aria-controls="collapse-13" class="collapsed" style="text-decoration: none;color: #FFFFFF;">
                              Variation
                            </a>
                          </h6>
                        </div>
                        <div id="variation-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5" style="">
                          <div class="card-body">
                                  <div class="row">
                                    @if(!empty($variations))
                                    <div class="form-group col-6">
                                      <label for="quantity">Variation Name</label>
                                      <select name="variation" id="variation" class="form-control">
                                        <option value="" selected>Custom Variation</option>
                                        @foreach ($variations as $variation)
                                          <option value="{{$variation->id}}">{{$variation->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-12 ">
                                        <button type="button" class="btn btn-primary form-control">Add</button>
                                      </div>
                                    </div>
                                    @endif


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
                              {{-- active or inactive --}}
                              <div class="form-group">
                                <label for="status">Draft</label>
                                <select name="status" class="form-control">
                                  <option value="publish"  class="form-group">Publish</option>
                                  <option value="draft" class="form-group">Draft</option>
                                </select>
                              </div>

                                  {{-- product image --}}
                              <div class="form-group">
                                <label>Product Image</label>

                                <div style="width:200px; border:1px solid #d9dee4;">

                                  <img style="max-width:200px;max-height:200px;
                                  display:block;" class="for-image" src="https://via.placeholder.com/200x200?text=Product Image"/>

                                    <button type="button" style="background:#d9dee4; border-radius:0px;width:200px;cursor:pointer;font-size:12px;font-weight:600;" class="upload-button btn btn-default">
                                      <i style="font-size:14px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>

                                    <input style="display:none;" class="file-upload" onchange="validateImage()" type="file" name="image" accept="image/*" id="featured_img"/>

                                    {{-- @error('image')
                                    <p><small class="text-danger">{{ $errors->first('image') }}</small></p>
                                    @enderror --}}

                                      <p class="text-danger" id="error-img" style="display:none;">Use validate Image  | jpg | jpeg | png | webp | svg</p>

                                </div>

                              </div>
                                {{-- product image end --}}
                                <hr>
                                  {{-- product brand --}}
                                <div class="form-group">
                                  <label class="col-8 col-form-label">Brands</label>
                                  <div class="col-sm-9">
                                    <select class="form-control select2" name="brand_id">
                                      <option value="" selected>UnCategories</option>
                                      @foreach ($brand as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                  {{-- product brand end --}}
                                <hr>
                                {{-- product categories --}}
                                <div class="form-group">
                                  <label class="col-8 col-form-label">Categories</label>
                                  <div class="col-sm-9">
                                    <select class="form-control select2" name="category_id">
                                      <option value="" selected>UnCategories</option>
                                      @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>

                                        @if (count($item->subcategory) > 0)
                                            @include('admin.product.layouts.multicategory',['subcategories' => $item->subcategory])
                                        @endif
                                      @endforeach

                                    </select>
                                  </div>

                                </div>
                                  {{-- product category end --}}
                                <hr>
                                  {{-- product grallery image --}}
                                  <div class="form-group">

                                    <label>Product Grallery</label>

                                    <div class="user-image mb-3 text-center">
                                      <div class="imgPreview"> </div>
                                    </div>


                                    <div class="form-group">
                                      <input type="file" name="gallery_image[]"  class="form-control"
                                      id="images" multiple="multiple" />
                                    </div>

                                    @error('gallery_image')
                                        <p><small class="text-danger">{{ $errors->first('gallery_image') }}</small></p>
                                    @enderror

                                  </div>
                                  {{-- product grallery image end--}}

            </div>
          </div>
        </div>

        <div class="col-12 form-group">
            <button type="submit" name="submit" class="col-12 btn btn-info btn-fw">Submit</button>
        </div>

      </form>

    </div>
  @endsection

@section('script')

    <script>
        $('#add-document').on('click', function(){
            var tr = '<tr>'+
                    // '<td style="padding-right:10px;"><input type="text" name="title[]" class="form-control" placeholder="Document Name"/></td>'+
                    '<td style="margin:10px"><input type="file" name="document[]" class="form-control"/></td>'+
                    '<td><button type="button" class="delete-row btn btn-default"><i style="color:red;" class="fa fa-trash"></i></button></td>'+
                    '</tr>';
                $('.new_document').append(tr);
        });

        $('.new_document').on('click', '.delete-row', function(){
             $(this).parent().parent().remove();
        });

    </script>

      {{-- delete product document --}}
        <script>
            $(".deletedocument").click('.deletedoc',function(){

                var dataId = $(this).attr("data-id");
                var del = this;
                // console.log(id);
                // alert(dataId);

                if(confirm("Do you really want to delete document")){

                    $.ajax({
                    url:dataId,
                    type:'DELETE',
                    data:{
                        _token : $("input[name=_token]").val()

                        },
                    success:function(response){
                        $(del).closest( "tr" ).remove();
                        alert(response.success);
                    }
                    });

                }
                });
        </script>
      {{-- delete product document end--}}



{{-- image validation--}}
  <script type="text/javascript">

    function validateImage() {
        var formData = new FormData();

        var file = document.getElementById("featured_img").files[0];

        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "webp" && t != "svg") {
            // alert('Please select a valid image file jpeg | jpg | png | webp');
            $("#error-img").slideDown();

            document.getElementById("featured_img").value = '';
            return false;
        }
        return true;
    }

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
          // validateImage();
            readURL(this);
        });

        $(".upload-button").on('click', function() {
           $(".file-upload").click();
        });


    });
  </script>

    {{-- image garllery --}}
    <script>

        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;
                    // var filepath    = input.files.val();
                    // alert(filepath);

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

    <script>

        $(".deletegallery").click('.delete',function(){

        var dataId = $(this).attr("data-id");
        var del = this;
        // console.log(id);
        // alert(dataId);
        if(confirm("Do you really want to delete")){

            $.ajax({
                url:dataId,
                type:'DELETE',
                data:{
                _token : $("input[name=_token]").val()

                },
                success:function(response){
                $(del).closest( "tr" ).remove();
                alert(response.success);
                }
            });

        }
        });

    </script>

    {{-- delete gallery image end--}}

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

  {{-- ckeditor --}}
  <script>

    CKEDITOR.replace( 'description', {

    });


    CKEDITOR.replace( 'short_description', {

    });

  </script>
  {{-- delete gallery image --}}


  {{-- for seraching dropdown seraching --}}
  <script>
      $(".select2").select2();
  </script>


      {{-- //editor --}}
      {{-- ///////modal --}}
      <script src="{{asset('backend/js/jquery-file-upload.js')}}"></script>


@endsection
