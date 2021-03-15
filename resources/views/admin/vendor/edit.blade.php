@extends('admin.layouts.master')

@section('title','Vendor Edit')
    
@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Vendor Edit</h4>
      <form class="forms-sample" action="{{url('admin/vendor/'.$seller->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="card-body col-8">

              <div class="row">

                <div class="form-group col-6">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{$seller->first_name}}">
                  @error('first_name')
                  <p><small class="text-danger">{{ $errors->first('first_name') }}</small></p>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{$seller->last_name}}"></textarea>
                </div>

              </div>

              <hr>

              <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="{{$seller->username}}">
                @error('username')
                <p><small class="text-danger">{{ $errors->first('username') }}</small></p>
                @enderror
              </div>

              
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email : your@example.com" value="{{$seller->user->email}}">
                @error('email')
                <p><small class="text-danger">{{ $errors->first('email') }}</small></p>
                @enderror
              </div>   
              
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{$seller->user->password}}">
                @error('password')
                <p><small class="text-danger">{{ $errors->first('password') }}</small></p>
                @enderror
              </div>   

              <hr>

              <div class="form-group">
                <label for="mobile">Phone</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone Number" value="{{$seller->mobile}}">
                @error('mobile')
                <p><small class="text-danger">{{ $errors->first('mobile') }}</small></p>
                @enderror
              </div>

              <hr>

              <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="{{$seller->company_name}}">
                @error('company_name')
                <p><small class="text-danger">{{ $errors->first('company_name') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="company_email">Company Email</label>
                <input type="text" class="form-control" id="company_email" name="company_email" placeholder="Company Email" value="{{$seller->company_email}}">
                @error('company_email')
                <p><small class="text-danger">{{ $errors->first('company_email') }}</small></p>
                @enderror
              </div>

              <div class="form-group">
                <label for="company_address">Company Address</label>
                <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Company Address" value="{{$seller->company_address}}">
                @error('company_address')
                <p><small class="text-danger">{{ $errors->first('company_address') }}</small></p>
                @enderror
              </div>

              <div class="row">
              
                <div class="form-group col-6">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{$seller->country}}" />
                  @error('country')
                  <p><small class="text-danger">{{ $errors->first('country') }}</small></p>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{$seller->city}}" />
                  @error('city')
                  <p><small class="text-danger">{{ $errors->first('city') }}</small></p>
                  @enderror
                </div>

              </div>


              <div class="row">

                <div class="form-group col-6">
                  <label for="state">State</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="State" value="{{$seller->state}}" />
                  @error('state')
                  <p><small class="text-danger">{{ $errors->first('state') }}</small></p>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="postal_code">Postal Code</label>
                  <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code" value="{{$seller->postal_code}}" />
                  @error('postal_code')
                  <p><small class="text-danger">{{ $errors->first('postal_code') }}</small></p>
                  @enderror
                </div>
                
              </div>

        </div>

        <div class="col-4">

          <div class="form-group">
            <label for="city">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="1" {{$seller->status == '1' ? 'selected' : ''}} >Active</option>
              <option value="0" {{$seller->status == '0' ? 'selected' : ''}}>Inactive</option>
            </select>
            @error('status')
            <p><small class="text-danger">{{ $errors->first('status') }}</small></p>
            @enderror
          </div>

          <div class="form-group">

            <div class="form-group">
              <label>Profile Image</label>
              <div style="width:200px; border:1px solid #d9dee4;">
                  <img style="max-width:200px;max-height:200px;
                  display:block;" class="for-image" src="{{$seller->image ? asset('backend/images/vendor/'.$seller->image):'https://via.placeholder.com/200x200?text=Profile Image'}}"/>
                  <button type="button" style="background:#d9dee4; border-radius:0px;width:200px;cursor:pointer;font-size:12px;font-weight:600;" class="upload-button btn btn-default"><i style="font-size:14px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>
                  <input style="display:none;" class="file-upload" type="file" name="image" accept="image/*"/>
              </div>
              @error('image')
                  <p><small class="text-danger">{{ $errors->first('image') }}</small></p>
              @enderror 
            </div>

            <div class="form-group">
              <label>Company Logo</label>
              <div style="width:150px; border:1px solid #d9dee4;">
                  <img style="max-width:150px;max-height:150px;
                  display:block;" class="for-image-company" src="{{$seller->company_logo ? asset('backend/images/vendor/'.$seller->company_logo):'https://via.placeholder.com/200x200?text=Company Logo'}}"/>
                  <button type="button" style="background:#d9dee4; border-radius:0px;width:150px;cursor:pointer;font-size:10px;font-weight:600;" class="upload-button-company btn btn-default"><i style="font-size:14px;" class="fa fa-upload" aria-hidden="true"></i> &nbsp;Upload Image</button>
                  <input style="display:none;" class="file-upload-company" type="file" name="company_logo" accept="image/*"/>
              </div>
              @error('company_logo')
                  <p><small class="text-danger">{{ $errors->first('company_logo') }}</small></p>
              @enderror 
            </div>


           
          </div>

        </div>
            <input type="hidden" name="user_id" value="{{$seller->user_id}}"> 
      </div>
      <button type="submit" class="btn btn-primary mr-2">Submit</button>
      {{-- <button class="btn btn-light">Cancel</button> --}}
    </form>
  </div>
</div>

@endsection

@section('script')

    <script>
      // company logo show in div
      $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.for-image-company').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        $(".file-upload-company").on('change', function(){
            readURL(this);
        });
    
        $(".upload-button-company").on('click', function() {
           $(".file-upload-company").click();
        });
    
        
      });
    
    </script>

    <script>
      // show profile image in div
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