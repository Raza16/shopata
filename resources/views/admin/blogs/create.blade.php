@extends('admin.layouts.master')



@section('title','Blog Add')
    
@section('pageheadlinks')
      {{-- <script src="{{asset('backend/ckeditorfullimage/ckeditor.js')}}"></script> --}}
      {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
      {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
      {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
      
      <!-- include summernote css/js -->
      {{-- <link rel="stylesheet" href="{{asset('backend/vendors/summernote/dist/summernote-bs4.css')}}"> --}}
      {{-- <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/inline/ckeditor.js"></script> --}}
      {{-- <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/balloon/ckeditor.js"></script> --}}
      {{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
      <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>

@endsection

@section('content')
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Blog Add</h4>

        <form class="forms-sample" action="{{url('admin/blog')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-8">



              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{old('title')}}">
                @error('title')
                <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                @enderror
              </div>

              <div class="form-group ">
                <label for="slug">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{old('slug')}}" readonly>
                @error('slug')
                <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows='10'>{{old('description')}}</textarea>
                @error('description')
                <p><small class="text-danger">{{ $errors->first('description') }}</small></p>
                @enderror
              </div>

            

          {{-- heading seo --}}

              <div class="form-group">
                <h2 class="bg-primary" style="color:#fff;padding:5px;border-radius:50px;text-align:center">SEO</h2>
              </div>

              <div class="form-group">
                <label for="title">Meta Title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="meta title" value="{{old('meta_title')}}">
                @error('meta_title')
                <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="title">Meta description</label>
                <textarea type="text" rows="5" class="form-control" id="meta_description" name="meta_description" placeholder="meta description">{{old('meta_description')}}</textarea>
                @error('meta_description')
                <p><small class="text-danger">{{ $errors->first('meta_description') }}</small></p>
                @enderror
              </div>


              
            </div>

              <div class="col-4">
                <div class="form-group">
                  <label>Blogs Image</label>
                    <div style="width:200px; border:1px solid #d9dee4;">
                        <img style="max-width:200px;max-height:200px;
                        display:block;" class="for-image" src="https://via.placeholder.com/200x200?text=200+x+200"/>
                        <button type="button" style="background:#d9dee4; border-radius:0px;width:200px;cursor:pointer;font-size:12px;font-weight:600;" class="upload-button btn btn-default"><i style="font-size:14px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>
                        <input style="display:none;" class="file-upload" type="file" name="image" accept="image/*"/>
                    </div>
                  @error('image')
                      <p><small class="text-danger">{{ $errors->first('image') }}</small></p>
                  @enderror 
                </div>

                <div class="form-group">
                  <label>Category</label>
                  <select name="category_id" id="" class="form-control">
                    <option value="" selected disabled>Category</option>
                    @foreach ($category as $item)
                        
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach                    

                  </select>
                </div>

              </div>

              
          
              <div class="form-group">
                <button class="btn btn-primary"> Submit </button>
              </div>
              
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')

      {{-- slug --}}
    <script>
          $("#title").keyup(function(){
        var str = $(this).val();
        var trims = $.trim(str)
        var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
        $("#slug").val(slug.toLowerCase());
      });
    </script>

{{-- // image show in div --}}
    <script>
        
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

{{-- <script src="{{asset('backend/vendors/summernote/dist/summernote-bs4.min.js')}}"></script> --}}
  
{{-- <script src="{{asset('backend/js/editorDemo.js')}}"></script> --}}

<script>
  
CKEDITOR.replace( 'description', {

  filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
  
} );
</script>

    
@endsection 