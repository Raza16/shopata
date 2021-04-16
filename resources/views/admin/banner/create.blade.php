@extends('admin.layouts.master')

@section('title','Add Banner')

    @section('pageheadlinks')

        <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>

    @endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Banner</h4>

      <form class="forms-sample" action="{{url('admin/banner')}}" method="POST" enctype="multipart/form-data">

          @csrf

            <div class="card-body col-12">

                <div class="form-group">

                    <div class="row">

                        <div class="form-check form-check-info col-2">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="active" checked>
                            Active
                            <i class="input-helper"></i></label>
                        </div>

                        <div class="form-check col-8 form-check-danger">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="inactive">
                            Inactive
                            <i class="input-helper"></i></label>
                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <div class="form-group">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Banner Image</h4>
                              <input type="file" class="dropify" name="image" accept="image/*" data-allowed-file-extensions="png jpg jpeg" />
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-6">

                        <label for="title">Title</label>

                        <input type="text" class="form-control" id="title" name="title" placeholder="Banner Name" value="{{old('title')}}" autofocus >

                        @error('title')
                            <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
                        @enderror

                    </div>

                    <div class="form-group col-6">

                        <label for="title">Link</label>

                        <input type="text" class="form-control" id="link" name="link" placeholder="Banner Link" value="{{old('link')}}" >

                        @error('link')
                            <p><small class="text-danger">{{ $errors->first('link') }}</small></p>
                        @enderror

                    </div>

                </div>
              <div class="form-group ">

                <label for="description">Description</label>

                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" rows="5">{{old('description')}}</textarea>

              </div>

        </div>



        <div class="col-2 form-group">
            <button type="submit" class="col-12 btn btn-info btn-fw"><i class="icon-plus"></i>&nbsp;Submit</button>
        </div>
    </form>
  </div>
</div>

@endsection



@section('script')

        <script src="{{asset('backend/js/dropify.js')}}"></script>

        <script>

            CKEDITOR.replace( 'description', {

            });

        </script>

@endsection
