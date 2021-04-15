@extends('admin.layouts.master')

@section('title','Add Brand')


@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Brand</h4>
      <form class="forms-sample" action="{{url('admin/brand')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="card-body col-8">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Brand Name" value="{{old('title')}}" autofocus required>
                @error('title')
                    <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                @enderror
              </div>

              {{-- <div class="form-group">
                <label for="title">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{old('title')}}" readonly>
                @error('title')
                <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                @enderror
              </div> --}}

              <div class="form-group ">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" rows="5">{{old('description')}}</textarea>
              </div>

              <div class="form-group">
                <label for="title">meta title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="meta title" value="{{old('meta_title')}}">
                @error('meta_title')
                <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="title">meta keyword</label>
                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="meta keyword" value="{{old('meta_keyword')}}">
                @error('meta_keyword')
                <p><small class="text-danger">{{ $errors->first('meta_keyword') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="title">meta description</label>
                <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="meta description" rows=5 >{{old('meta_description')}}</textarea>
                @error('meta_description')
                <p><small class="text-danger">{{ $errors->first('meta_description') }}</small></p>
                @enderror
              </div>
        </div>

        <div class="col-4">
          <div class="form-group ">

            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Brand Image</h4>
                      <input type="file" class="dropify" name="image" accept="image/*" data-allowed-file-extensions="png jpg jpeg" />
                    </div>
                </div>
            </div>

          </div>
        </div>
      </div>
        <div class="col-2 form-group">
            <button type="submit" class="col-12 btn btn-info btn-fw"><i class="icon-plus"></i>&nbsp;Submit</button>
        </div>
      {{-- <button type="submit" class="btn btn-info mr-2"> Submit</button> --}}
    </form>
  </div>
</div>

@endsection



@section('script')

        <script src="{{asset('backend/js/dropify.js')}}"></script>

        {{-- <script type="text/javascript">

            function validateImage() {
                var formData = new FormData();

                var file = document.getElementById("featured_img").files[0];

                formData.append("Filedata", file);
                var t = file.type.split('/').pop().toLowerCase();
                if (t != "jpeg" && t != "jpg" && t != "png" && t != "webp" && t != "svg") {
                    // alert('Please select a valid image file jpeg | jpg | png | webp');

                    $("#error-img").css('display','block').slideDown();

                    document.getElementById("featured_img").value = '';
                    return false;
                }
                return true;
            }

          </script> --}}

@endsection
