@extends('layouts.admin_login')

@section('title','Forget Password')


@section('content')

    <div class="container-scroller">

        <div class="container-scroller">

            <div class="container-fluid page-body-wrapper full-page-wrapper">

                <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">

                    <div class="row flex-grow custom-center">



                        <div class="col-lg-6 forget-half-bg d-flex flex-row">
                        </div>

                        <div class="col-lg-6 d-flex align-items-center justify-content-center">

                            <div class="auth-form-transparent text-left p-3">

                                <div class="brand-logo">
                                    <img src="{{asset('backend/images/logo.svg')}}" width="auto" height="80px" alt="logo">
                                </div>

                                    <h4>Welcome back!</h4>

                                    <h6 class="font-weight-light">Happy to see you again!</h6>

                                <form class="pt-3" method="POST" action="{{ route('password.email') }}">

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
                                        @if (session('status'))
                                            <div class="alert alert-success" style="margin-top: 10px" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="my-3">
                                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="line-height: 1px" type="submit" name="login_btn">Send Password Reset Link</button>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

              
            </div>



        </div>

    </div>




@endsection
