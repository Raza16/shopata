@extends('admin.layouts.master')



@section('title','Blog Edit')

@section('pageheadlinks')
      {{-- <script src="{{asset('backend/ckeditorfullimage/ckeditor.js')}}"></script> --}}
      {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
      {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
      {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

      <!-- include summernote css/js -->
      {{-- <link rel="stylesheet" href="{{asset('backend/vendors/summernote/dist/summernote-bs4.css')}}"> --}}
      {{-- <script src="{{asset('backend/plugins/ckeditor_standard/ckeditor.js')}}"></script> --}}
      {{-- <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script> --}}

      <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

@endsection

@section('content')
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Blog Edit</h4>

        <form class="forms-sample" action="{{url('admin/blog/'.$blog->slug)}}" method="POST" enctype="multipart/form-data">

          @csrf
          @method('PUT')

          <div class="row">

            <div class="col-8">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$blog->title}}">
                @error('title')
                <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                @enderror
              </div>

              <div class="form-group ">
                <label for="slug">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{$blog->slug}}" readonly>
                @error('slug')
                <p><small class="text-danger">{{ $errors->first('slug') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows='10'>{{$blog->description}}</textarea>
                @error('description')
                <p><small class="text-danger">{{ $errors->first('description') }}</small></p>
                @enderror
              </div>



          {{-- heading seo --}}

            <div class="alert alert-fill-info" role="alert">
                {{-- <i class="fa fa-exclamation-triangle"></i> --}}
                {{-- Heads up! This alert needs your attention, but it's not super important. --}}
                <h2 style="text-align: center;line-height: 14px;padding-top: 5px;">SEO</h2>
            </div>

              <div class="form-group">
                <label for="title">Meta Title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="meta title" value="{{$blog->meta_title}}">
                @error('meta_title')
                <p><small class="text-danger">{{ $errors->first('meta_title') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="title">Meta description</label>
                <textarea type="text" rows="5" class="form-control" id="meta_description" name="meta_description" placeholder="meta description">{{$blog->meta_description}}</textarea>
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
                        <input type="file" class="dropify" name="image" accept="image/*" data-allowed-file-extensions="png jpg jpeg" />
                        </div>
                    </div>
                </div>


                <div class="form-group">
                  <label>Category</label>
                  <select name="category_id" id="" class="form-control">
                    <option value="" selected disabled>Category</option>
                    @foreach ($category as $item)

                    <option value="{{$item->id}}" {{$item->id == $blog->category_id ? 'selected' : ''}}  >{{$item->title}}</option>

                    @endforeach

                  </select>
                </div>

              </div>

              <div class="col-2 form-group">
                <button type="submit" name="submit" class="col-12 btn btn-info mr-2"><i class="icon-refresh"></i>&nbsp; Update</button>
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

    {{-- <script>
      $(document).ready(function(){

        CKEDITOR.replace( 'description', {
          height:400,
          filebrowserUploadUrl: "{{route('blog.upload',['_token' => csrf_token() ])}}", //route
          filebrowserImageUploadUrl:'public/backend/images/blogs',
          filebrowserUploadMethod:'form '
          config.filebrowserUploadMethod = 'form';
          filebrowserUploadUrl: "{{asset('/blog/ckeditor_upload')}}",
          filebrowserBrowserUrl: "{{asset('/blog/file_browser')}}"
        });

      });
    </script> --}}
{{--
<script src="{{asset('backend/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>

<script src="{{asset('backend/js/editorDemo.js')}}"></script>
     --}}
@endsection
