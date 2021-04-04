@extends('admin.layouts.master')


@section('title','Settings')

    @section('pageheadlinks')

        <style>
            .profile-pic {
                max-width: 200px;
                max-height: 200px;
                display: block;
            }

            .file-upload {
                display: none;
            }
            .circle {
                border-radius: 1000px !important;
                overflow: hidden;
                width: 180px;
                height: 180px;
                border: 8px solid rgba(255, 255, 255, 0.7);
                /* position: absolute; */
                top: 72px;
            }

            img {
                max-width: 100%;
                height: auto;
            }
            .p-image {
                position: absolute;
                top: 210px;
                left: 300px;
                color: #666666;
                transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
            }
            .p-image:hover {
                transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
            }
            .upload-button {
                font-size: 1.2em;
            }

            .upload-button:hover {
                transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
                color: #000;
            }
        </style>


    @endsection

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        @if(session()->has('error_message'))
            <div id="alert" class="alert alert-danger alert-dismissible deletefade in mb-1" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Incorrect Password</strong> {{session('error_message')}}
            </div>
        @endif

          {{-- @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif --}}

        <h4 class="card-title">Settings</h4>
        {{-- <p class="card-description">
          Basic form layout
        </p> --}}
        <form class="forms-sample" method="Post" action="{{url('/admin/update-current-pwd')}}" name="updatepwd" id="updatepwd">

          @csrf

          <div class="form-group">
            <label for="currentpwd">Current Password</label>
            <input type="password" class="form-control" id="currentpwd" placeholder="Enter Current Password" name="currentpwd" required>
            <span id="checkcurrentpwd"></span>

          </div>
          <div class="form-group">
            <label for="newpwd">New Password</label>
            <input type="password" class="form-control" id="newpwd" placeholder="New Password" name="newpwd">
          </div>
          <div class="form-group">
            <label for="confrimpwd">Confrim Password</label>
            <input type="password" class="form-control" id="confrimpwd" placeholder="Confrim Password" name="confrimpwd">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>

{{-- -----------------------------------------setting for admin ------------------------------ --}}
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        @if(Session::has('update_error_message'))
        <div class="form-group alert-dismissible fade show alert-danger alert-warning">
            <label id="error_messgae" style="font-size:20px">{{Session::get('error_message')}}</label>
        </div>
          @endif

          @if(Session::has('update_success_message'))
          <div class="form-group alert-dismissible fade show alert-primary alert-warning">
              <label id="update_success_message" style="font-size:20px">{{Session::get('update_success_message')}}</label>
          </div>
            @endif


        <h4 class="card-title">Update Admin Details</h4>

        <form class="forms-sample" method="Post" action="{{url('/admin/update-admin-details')}}" name="updateadmindetails" id="updateadmindetails" enctype="multipart/form-data">

          @csrf


          <div class="row">
              <div class="col-4"></div>
            <div class="small-12 medium-2 large-2 columns">
              <div class="circle">
                <!-- User Profile Image -->
                <img class="profile-pic" src="https://via.placeholder.com/200x200?text=200+x+200">

                <!-- Default Image -->
                <!-- <i class="fa fa-user fa-5x"></i> -->
              </div>
              <div class="p-image">
                <i class="fa fa-camera upload-button"></i>
                 <input class="file-upload" type="file" name="profile_image" accept="image/*"/>
              </div>
           </div>
         </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Admin Name</label>
            <input type="text" class="form-control" id="adminname" placeholder="Admin Name" name="name" value="{{ Auth::user()->name}}">
          </div>

          <div class="form-group">
            <label for="email">Admin Email</label>
            <input type="email" class="form-control"  placeholder="Email" readonly value="{{  Auth::user()->email}}">
          </div>

          <div class="form-group">
            <label for="email">User Type</label>
            <input type="email" class="form-control" id="admintype" placeholder="Admin Type" name="admintype" readonly value="{{Auth::user()->role->name}}">
          </div>

          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="{{  Auth::user()->mobile}}">
          </div>

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>

      </div>
    </div>
  </div>

</div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
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

  $(document).ready(function(){
      //check admin password is correct or not
        $("#currentpwd").on("change",function(){
            var current_pwd=$("#currentpwd").val();
            // alert(current_pwd);
            $.ajax({
                type:'post',
                url:'{{url("/admin/check-current-pwd")}}',
                data:{currentpwd:current_pwd},
                success:function(resp){
                    // alert(resp);
                    if(resp=="false"){
                          $("#checkcurrentpwd").html("<font color=red>Current Password is incorrect</font>");
                    }else if(resp=="true"){
                      $("#checkcurrentpwd").html("<font color=green>Current Password is correct</font>");
                    }
                },error:function(){
                    alert("Error");
                }
            });
        });




  });


</script>





@endsection
