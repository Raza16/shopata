@extends('admin.layouts.master')


@section('title','Category Edit')

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
      <h4 class="card-title">Category Edit</h4>
      <form class="forms-sample" action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="card-body col-8">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Category Name" value="{{$category->title}}">
                @error('title')
                <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                @enderror
              </div>

               <div class="form-group">
                <label for="title">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{$category->slug}}" readonly>
                @error('title')
                <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                @enderror
              </div>

              @if ($parent_id->count() > 1)

                <div class="form-group">

                    <label for="parentid">Parent Category</label>

                    <select class="form-control select2" name="parent_id" id="parent_id">

                        <option value="">UnCategories</option>

                            @foreach ($parent_id as $item)

                                    <option value="{{$item->id}}" {{$category->parent_id == $item->id ? 'selected' : ''}} {{$category->id == $item->id ? 'disabled' : ''}}>{{$item->title}}</option>

                                        @if (count($item->subcategory) > 0)
                                            @include('admin.category.layouts.editmulticategory',['subcategories' => $item->subcategory])
                                        @endif

                            @endforeach


                    </select>

                </div>

              @endif

        </div>

        <div class="col-4">

          <div class="form-group ">

            <div class="form-group">

                <div class="card">

                    <div class="card-body">

                    <h4 class="card-title">Category Image</h4>

                        <input type="file" class="dropify" name="image" accept="image/*" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{$category->image ? asset('backend/images/category/'.$category->image) : ''}}"/>

                    </div>

                </div>

            </div>

          </div>

        </div>

      </div>

        <div class="col-2 form-group">
            <button type="submit" name="submit" class="col-12 btn btn-info mr-2"><i class="icon-refresh"></i>&nbsp;Update</button>
        </div>

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
