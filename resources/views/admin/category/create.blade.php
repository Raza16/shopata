@extends('admin.layouts.master')


@section('title','Add Category')

@section('pageheadlinks')
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

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Category</h4>
      <form class="forms-sample" action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="card-body col-8">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Category Name" value="{{old('title')}}" autofocus required>
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

              @if ( $parent_id->count() > 0)
                <div class="form-group">
                    <label for="parentid">Parent Category</label>
                    <select class="form-control select2" name="parent_id" id="parent_id">
                    <option value="">UnCategories</option>

                    @foreach ($parent_id as $item)

                        <option value="{{$item->id}}">{{$item->title}}</option>

                        @if (count($item->subcategory) > 0)
                            @include('admin.category.layouts.multicategory',['subcategories' => $item->subcategory])
                        @endif

                        @endforeach

                    </select>

                </div>

              @endif


        </div>

        <div class="col-4">
          <div class="form-group ">

            {{-- <div class="form-group">
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
            </div> --}}

            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category Image</h4>
                  <input type="file" class="dropify" name="image" accept="image/*" data-allowed-file-extensions="png jpg jpeg"/>
                </div>
            </div>

          </div>
        </div>
      </div>
        <div class="col-2 form-group">
            <button type="submit" class="col-12 btn btn-info btn-fw"><i class="icon-plus"></i>&nbsp;Submit</button>
        </div>
      {{-- <button type="submit" class="btn btn-info mr-2">Submit</button> --}}
    </form>
  </div>
</div>


@endsection



@section('script')

    <script>

        $('#parentcat').select2({
            selectOnClose: true
        });

    </script>

    <script>

    $("#title").keyup(function(){
      var str = $(this).val();
      var trims = $.trim(str)
      var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
      $("#slug").val(slug.toLowerCase());
    });

    </script>

    <script>

      $(".select2").select2();

    </script>

@endsection
