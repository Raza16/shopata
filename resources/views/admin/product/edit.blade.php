@extends('admin.layouts.master')


@section('title','Product Edit')
    
  @section('pageheadlinks')
  <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <style>
<<<<<<< HEAD
    .select2-container--default .select2-selection--single .select2-selection__rendered{
      color: #444;
      line-height: 18px;
      margin-top: -9px;
      margin-left: -20px
    }
  </style>
=======

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #444;
      line-height: 20px;
      margin-top: -10px;
      margin-left: -19px;
        }

  </style>

>>>>>>> dev
  @endsection

  @section('content')
    <div class="row">
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Product Edit</h3>
                <form class="forms-sample" action="{{url('admin/product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="productname"><h5>Product Name</h5></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{$product->name}}">
                        @error('title')
                        <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug"><h5>slug</h5></label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{$product->slug}}" readonly>
                        @error('slug')
                          <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="slug"><h5>Product code</h5></label>
                      <input type="text" class="form-control" id="product_code" name="product_code" placeholder="product code" value="{{$product->product_code}}">
                    </div>

                    <div class="form-group" >
                      <label for="description"><h5>Descripton</h5></label>
                      <textarea type="text" class="form-control" id="description" rows="10" name="long_description" >{{$product->long_description}}</textarea>
                    </div>

                    <div class="form-group">
                    <label for="shortdescription"><h5>Short Descripton</h5></label>
                      <textarea type="text" class="form-control" id="short_description" name="short_description">{{$product->short_description}}</textarea>
                    </div>

                    <div class="form-group">
                      <table>
                        <tbody>
                          @foreach ($product_documents as $document)
                            <tr>
                              <td>
                                  <input type="text" value="{{$document->document}}" name="document[]"  class="form-control">
                              </td>
                              <td>
                                  <button type="button" class="deletedocument deletedoc" data-id="{{url('admin/product/documentdelete/'.$document->id)}}" ><i style="color:red;" class="fa fa-trash"></i></button>
                              </td>
                            </tr> 
                              @endforeach
                        </tbody>
                      </table>
                    </div>

                    {{-- <div class="form-group document_add">
                      <table>
                        <tbody>
                            <tr>
                              <td>
                                <td>
                                
                              </td>
                              </td>
                          
                            </tr> 
                        </tbody>
                      </table>
                    </div> --}}



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
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$product->meta_title}}"/>
                                @error('meta_title')
                                <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                                @enderror
                              </div>

                              <div class="form-group col-12">
                                <label for="metadescription">meta Descripton</label>
                                <textarea type="text" class="form-control" id="meta_description" name="meta_description">{{$product->meta_description}}</textarea>
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
                        <div class="card-header bg-primary" role="tab" id="heading-13">
                          <h6 class="mb-0">
                            <a data-toggle="collapse" href="#general-13" aria-expanded="false" aria-controls="collapse-13" class="collapsed" style="text-decoration: none;color: #FFFFFF;">
                              General Info
                            </a>
                          </h6>
                        </div>
                        <div id="general-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5" style="">
                          <div class="card-body">
                                  <div class="row">
                                    {{-- {{$product->type == "variable" ? 'selected' : ''}} --}}
                                    <div class="form-group col-6">
                                      <label for="product_type">Product Type</label>
                                      <select name="product_type" id="product_type" class="form-control">
                                        <option value="simple" {{$product->type == "simple" ? 'selected' : ''}}>Simple</option>
                                        <option value="digital" {{$product->type == "digital" ? 'selected' : ''}}>Digital Product</option>
                                        <option value="variable" {{$product->type == "variable" ? 'selected' : ''}}>Variable</option>
                                      </select>
                                      @error('product_type')
                                      <p><small class="text-danger">{{ $errors->first('product_type') }}</small></p>
                                      @enderror
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="quantity">Stock</label>
                                      <select name="stock" id="stock" class="form-control">
                                        <option value="instock" {{$product->stock == "instock" ? 'selected' : ''}}>In stock</option>
                                        <option value="outstock" {{$product->stock == "outstock" ? 'selected' : ''}}>Out of stock</option>
                                      </select>
                                      @error('stock')
                                      <p><small class="text-danger">{{ $errors->first('stock') }}</small></p>
                                      @enderror
                                    </div>

                                  </div>

                                  <div class="row">

                                    <div class="form-group col-6">
                                      <label for="regular_price">Regular Price</label>
                                      <input type="text" class="form-control" id="regular_price" name="regular_price" placeholder="$0.00" value="{{$product->regular_price}}">
                                      @error('regular_price')
                                      <p><small class="text-danger">{{ $errors->first('regular_price') }}</small></p>
                                      @enderror
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="regular_price">Sale Price</label>
                                      <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="$0.00" value="{{$product->sale_price}}">
                                      @error('sale_price')
                                      <p><small class="text-danger">{{ $errors->first('sale_price') }}</small></p>
                                      @enderror
                                    </div>

                                  </div>

                                  <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="0" value="{{$product->quantity}}">
                                    @error('quantity')
                                    <p><small class="text-danger">{{ $errors->first('quantity') }}</small></p>
                                    @enderror
                                  </div>
                                  
                                  <div class="row">

                                    <div class="form-group col-6">
                                      <label for="item_weight">Item Weight</label>
                                      <input type="text" class="form-control" id="item_weight" name="item_weight" placeholder="0.00 kg" value="{{$product->item_weight}}">
                                      @error('item_weight')
                                      <p><small class="text-danger">{{ $errors->first('item_weight') }}</small></p>
                                      @enderror
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="item_dimension">Item Dimension</label>
                                      <input type="text" class="form-control" id="item_dimension" name="item_dimension" placeholder=" " value="{{$product->item_dimension}}">
                                      @error('item_dimension')
                                      <p><small class="text-danger">{{ $errors->first('item_dimension') }}</small></p>
                                      @enderror
                                    </div>

                                  </div>

                                  <div class="row">

                                    <div class="form-group col-6">
                                      <label for="tax_status">Tax status</label>
                                      <input type="text" class="form-control" id="tax_status" name="tax_status" placeholder=" " value="{{$product->tax_status}}">
                                      @error('tax_status')
                                      <p><small class="text-danger">{{ $errors->first('tax_status') }}</small></p>
                                      @enderror
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="tax_class">Tax Class</label>
                                      <input type="text" class="form-control" id="tax_class" name="tax_class" placeholder=" " value="{{$product->tax_class}}">
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
<<<<<<< HEAD
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
                                  <option value="1" {{$product->status == 1 ? 'selected' : ''}} class="form-group">Active</option>
                                  <option value="0" {{$product->status == 0 ? 'selected' : ''}} class="form-group">Inactive</option>
=======
                            {{-- product image end --}}
                            <hr>
                              {{-- product brand --}}
                            <div class="form-group">
                              <label class="col-8 col-form-label">Brands</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="brand_id" id="brand">
                                  <option value="" selected>UnCategories</option>
                                  @foreach ($brand as $item)
                                  <option value="{{$item->id}}" {{ $item->id == $product->brand_id ? 'selected' : ''}}>{{$item->title}}</option>
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
                                <select class="form-control" name="category_id" id="category">
                                  <option value="" selected>UnCategories</option>
                                  @foreach ($category as $item)
                                  <option value="{{$item->id}}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{$item->title}}</option>
                                  @endforeach
                                  
>>>>>>> dev
                                </select>
                              </div>

                                  {{-- product image --}}
                              <div class="form-group">
                                <label>Product Image</label>
                                <div style="width:200px; border:1px solid #d9dee4;">
                                  @if(!$product->product_image)
                                  <img style="max-width:200px;max-height:200px;
                                  display:block;" class="for-image" src="https://via.placeholder.com/200x200?text=200+x+200"/>
                                  @else
                                  <img style="max-width:200px;max-height:200px;
                                  display:block;" class="for-image" src="{{asset('backend/images/products/'.$product->product_image)}}"/>
                                  @endif
                                    <button type="button" style="background:#d9dee4; border-radius:0px;width:200px;cursor:pointer;font-size:12px;font-weight:600;" class="upload-button btn btn-default"><i style="font-size:14px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>
                                    <input style="display:none;" class="file-upload" onchange="validateImage()" type="file" name="image" accept="image/*" id="img"/>
                                    {{-- @error('image') --}}
                                      <p class="text-danger" id="error" style="display:none">Use validate Image | jpg | jpeg | png | webp</p>
                                    {{-- @enderror --}}
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
                                      <option value="{{$item->id}}" {{ $item->id == $product->brand_id ? 'selected' : ''}}>{{$item->title}}</option>
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
                                      <option value="{{$item->id}}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{$item->title}}</option>
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
                                      <table class="table">
                                        <tbody>
                                          @foreach($product_grallery as $item)
                                            <tr>
                                                <td class="form-group">
                                                  <div class="form-group">
                                                    <img src="{{asset('backend/images/product_gallery/'.$item->image)}}" alt="" width="80px" height="auto"/>
                                                  </div>
                                                </td>

                                                <td>
                                                  <button type="button" class="deletegallery delete" data-id="{{url('admin/product/gallerydelete/'.$item->id)}}" ><i style="color:red;" class="fa fa-trash"></i></button>
                                                </td>
                                              
                                            </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
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
                                    <button type="submit" name="submit" class="col-12 btn btn-primary mr-2">Update</button>
                                  </div>

      </form>

    </div>
  @endsection

@section('script')


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

{{-- image validation--}}
  <script type="text/javascript">

    function validateImage() {
        var formData = new FormData();
    
        var file = document.getElementById("img").files[0];
    
        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "webp") {
            // alert('Please select a valid image file jpeg | jpg | png | webp');
            $("#error").slideDown();;
            
            document.getElementById("img").value = '';
            return false;
        }
        return true;
    }

    $('#images').MultiFile({

        accept:'gif|jpg|png'

    });

  </script>
  {{-- image validation end--}}
 
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

  {{-- ckeditor --}}
  <script>
    
    CKEDITOR.replace( 'description', {

    });


    CKEDITOR.replace( 'short_description', {

    });

  </script>
  {{-- delete gallery image --}}

  {{-- document tr loop --}}
  {{-- <script>
    $(function() {
    // Multiple images preview with JavaScript
    var multidocument = function(input, docPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                // var fileName = e.target.files[0].name

                reader.onload = function(event) {
                  // <input type="text" value="" name="document[]"  class="form-control" >
                    $($.parseHTML('<input type="text" name="document[]"  class="form-control col-4" >')).attr('value', event.target.result).appendTo(docPreviewPlaceholder);
                    // alert(filename);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#document').on('change', function() {
      multidocument(this, 'div.document_add');
    });
    });    
  </script> --}}

  {{-- document tr loop end--}}

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

  {{-- for seraching dropdown seraching --}}
  <script>
      $(".select2").select2();
  </script>


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