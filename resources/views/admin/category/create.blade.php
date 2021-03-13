@extends('admin.layouts.master')


@section('title','Category Add')
    
@section('content')
  
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Category Add</h4>
      <form class="forms-sample" action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="card-body col-8">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Category Name" value="{{old('title')}}">
                @error('title')
                <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                @enderror
              </div>

               <div class="form-group">
                <label for="title">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{old('title')}}" readonly>
                @error('title')
                <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                @enderror
              </div>

              @if ($category > 0)
              <div class="form-group">
                <label for="parentid">Parent Category</label>
                <select class="form-control" name="parent_id" id="parent_id">
                  <option value="">Parent Category</option>                        
                @foreach ($parent_id as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>                        
                    @endforeach
                  </select>
              </div>
              @endif 

              
        </div>

        <div class="col-4">
          <div class="form-group ">

            <div class="form-group">
              <label>Category Image</label>
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
           
          </div>  
        </div>
      </div>
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      <button class="btn btn-light">Cancel</button>
    </form>
  </div>
</div>


@endsection

@section('script')
    <script>

    $("#title").keyup(function(){
      var str = $(this).val();
      var trims = $.trim(str)
      var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
      $("#slug").val(slug.toLowerCase());
    });
    </script>


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
@endsection