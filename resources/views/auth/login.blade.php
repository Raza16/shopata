@extends('layouts.admin_login')

@section('title','Admin Login')

@section('content')

<div class="container-scroller">

    <div class="container-scroller">

      <div class="container-fluid page-body-wrapper full-page-wrapper">

        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">

          <div class="row flex-grow">

            <div class="col-lg-6 d-flex align-items-center justify-content-center">

              <div class="auth-form-transparent text-left p-3">

                <div class="reset-password-center">

                    <div class="brand-logo">
                        <img src="{{asset('backend/images/logo.svg')}}" width="auto" height="80px" alt="logo">
                    </div>

                    <h4>Welcome back!</h4>

                    <h6 class="font-weight-light">Happy to see you again!</h6>

                </div>

                <form class="pt-3" method="POST" action="{{ route('login') }}">

                    @csrf

                  <div class="form-group">

                    <label for="exampleInputEmail">Email</label>

                    <div class="input-group">

                      <div class="input-group-prepend bg-transparent">

                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="fa fa-user text-primary"></i>
                        </span>

                      </div>

                      <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-lg border-left-0  @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputPassword">Password</label>

                    <div class="input-group">

                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="fa fa-lock text-primary"></i>
                        </span>
                      </div>

                      <input type="password" name="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>

                  </div>

                  <div class="my-2 d-flex justify-content-between align-items-center">

                    <div class="form-check">
                      <label class="form-check-label text-muted">
                       <input type="checkbox" class="form-check-input" name="remeberme">
                        Keep me signed in
                      <i class="input-helper"></i></label>
                    </div>

                    <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>

                  </div>

                  <div class="my-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="line-height: 1px" type="submit" name="login_btn">Login</button>
                  </div>

                </form>

              </div>

            </div>

            <div class="col-lg-6 login-half-bg d-flex flex-row">
              <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright © 2021 Shopataclick</p>
            </div>

          </div>

        </div>


      </div>

  </div>

</div>



@endsection
