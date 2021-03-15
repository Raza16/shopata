@extends('admin.layouts.master')

@section('title','Vendor Add')
    
@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Vendor Add</h4>
      <form class="forms-sample" action="{{url('admin/vendor')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="card-body col-8">

              <div class="row">

                <div class="form-group col-6">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
                  @error('first_name')
                  <p><small class="text-danger">{{ $errors->first('first_name') }}</small></p>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{old('last_name')}}"></textarea>
                </div>

              </div>

              <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="{{old('username')}}">
                @error('username')
                <p><small class="text-danger">{{ $errors->first('username') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="mobile">Phone</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone Number" value="{{old('mobile')}}">
                @error('mobile')
                <p><small class="text-danger">{{ $errors->first('mobile') }}</small></p>
                @enderror
              </div>

              <div class="row">
              
                <div class="form-group col-6">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{old('country')}}" />
                  @error('country')
                  <p><small class="text-danger">{{ $errors->first('country') }}</small></p>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{old('city')}}" />
                  @error('city')
                  <p><small class="text-danger">{{ $errors->first('city') }}</small></p>
                  @enderror
                </div>

              </div>

              <div class="form-group">
                <label for="city">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State" value="{{old('state')}}" />
                @error('state')
                <p><small class="text-danger">{{ $errors->first('state') }}</small></p>
                @enderror
              </div>

        </div>

        <div class="col-4">
          <div class="form-group ">

            <div class="form-group">
              <label>Vendor Image</label>
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