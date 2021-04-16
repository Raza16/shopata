@extends('admin.layouts.master')



@section('title','Blog Add')

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
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Blog</h4>

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
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Blog Image</h4>
                            <input type="file" class="dropify" name="image" accept="image/*" data-allowed-file-extensions="png jpg jpeg webp" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <label>Category</label>

                        <select name="category_id" class="form-control select2" id="parentcat" >

                            <option value="" selected disabled>Category</option>

                            @foreach ($category as $item)

                                <option value="{{$item->id}}">{{$item->title}}</option>

                            @endforeach

                        </select>

                    </div>

                </div>



                <div class="col-2 form-group">
                    <button type="submit" class="col-12 btn btn-info btn-fw"><i class="icon-plus"></i>&nbsp;Submit</button>
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

    <script>

        $('#parentcat').select2({
            selectOnClose: true
        });

    </script>

    <script>

        $(".select2").select2();

    </script>

    <script>

        CKEDITOR.replace( 'description', {

        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'

        } );
    </script>


@endsection
