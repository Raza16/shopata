@extends('admin.layouts.master')


@section('title','Website Setting')
    

@section('content')

@if(session()->has('update'))
<div id="alert" class="alert alert-primary alert-dismissible deletefade in mb-1" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Update!</strong> {{session('update')}}
</div>
@endif


<div class="page-header">
  <h3 class="page-title">
    Web Settings
  </h3>
</div>
<hr>
  <div class="row">

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">General Info</h4>

          <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{url('admin/websetting/update/'.$setting->id)}}">
            @csrf
            @method("PUT")

            <div class="form-group">
              <label for="site_title">Site Title</label>
              <input type="text" class="form-control" id="site_title" placeholder="Site Title" name="title" value="{{$setting->title}}">
              @error('title')
              <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
              @enderror
            </div>

            <div class="form-group">
              <label for="site_title">Tag Line</label>
              <input type="text" class="form-control" id="site_title" placeholder="Tag line" name="tagline" value="{{$setting->tagline}}">
            </div>

            <div class="form-group">
              <label for="site_url">Site Url</label>
              <input type="text" class="form-control" id="site_title" placeholder="Site Url" name="site_url" value="{{$setting->site_url}}">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Site Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{$setting->email}}">
            </div>

            <div class="form-group">
              <label for="phone">Contact Number</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" name="phone" value="{{$setting->phone}}">
            </div>

            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" name="address" value="{{$setting->address}}"> 
            </div>

           

        </div>
      </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
      <div class="card" >
        <div class="card-body" >

          <div class="form-group">
            <label>Site Logo</label>
            <div style="width:200px; border:1px solid #d9dee4;background-color:#004dda ">
                <img style="max-width:200px;max-height:200px;
                display:block;" class="for-image" src="{{$setting->logo ? asset('backend/images/'.$setting->logo) : 'https://via.placeholder.com/200x200?text=Site logo'}}"/>
                <button type="button" style="background:rgb(7, 86, 231); border-radius:0px;width:200px;cursor:pointer;font-size:12px;font-weight:600;" class="upload-button btn btn-default"><i style="font-size:14px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>
                <input style="display:none;" class="file-upload" type="file" name="logo" accept="image/*"/>
            </div>
            @error('image')
                <p><small class="text-danger">{{ $errors->first('image') }}</small></p>
            @enderror 
          </div>

          <div class="form-group">
            <label>Fav icon</label>
            <div style="width:100px; border:1px solid #d9dee4;">
                <img style="max-width:100px;max-height:100px;
                display:block;" class="for-icon-image" src="{{$setting->favicon ? asset('backend/images/'.$setting->favicon) : 'https://via.placeholder.com/100x100?text=fav icon'}}"/>
                <button type="button" style="background:#d9dee4; border-radius:0px;width:100px;cursor:pointer;font-size:10px;font-weight:600;" class="upload-button-icon btn btn-default"><i style="font-size:10px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>
                <input style="display:none;" class="file-upload-icon" type="file" name="fav_icon" accept="image/*"/>
            </div>
            @error('fav_icon')
                <p><small class="text-danger">{{ $errors->first('fav_icon') }}</small></p>
            @enderror 
          </div>

        
        </div>
      </div>  
        
    </div>  
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    {{-- <button class="btn btn-light">Cancel</button> --}}

    </form>  

  </div>


@endsection


@section('script')

    <script>
      // logo show in div
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

    <script>
      // logo show in div
      $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.for-icon-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload-icon").on('change', function(){
            readURL(this);
        });

        $(".upload-button-icon").on('click', function() {
          $(".file-upload-icon").click();
        });

        
      });

    </script>


@endsection