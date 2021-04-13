@extends('admin.layouts.master')

@section('title','Brand Edit')


@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Brand Edit</h4>
      <form class="forms-sample" action="{{url('admin/brand/'.$brand->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="card-body col-8">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Brand Name" value="{{$brand->title}}" required>
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
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" rows="5">{{$brand->description}}</textarea>
              </div>

              <div class="form-group">
                <label for="title">meta title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="meta title" value="{{$brand->meta_title}}">
                @error('meta_title')
                <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="title">meta keyword</label>
                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="meta keyword" value="{{$brand->meta_keyword}}">
                @error('meta_keyword')
                <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="title">meta description</label>
                <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="meta description" rows=5 >{{$brand->meta_decription}}</textarea>
                @error('meta_description')
                <p><small class="text-danger">{{ $errors->first('meta_description') }}</small></p>
                @enderror
              </div>
        </div>

        <div class="col-4">
          <div class="form-group ">

            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Brand Image</h4>

                  <input type="file" class="dropify" name="image" accept="image/*" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{$brand->image ? asset('backend/images/brands/'.$brand->image) : ''}}"/>

                </div>
            </div>

          </div>
        </div>
      </div>

        <div class="col-2 form-group">
            <button type="submit" name="submit" class="col-12 btn btn-info mr-2"><i class="icon-refresh"></i>&nbsp; Update</button>
        </div>
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

@endsection
