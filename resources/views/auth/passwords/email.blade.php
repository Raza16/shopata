@extends('layouts.admin_login')

@section('login')

    <div class="container-scroller">

        <div class="container-scroller">

            <div class="container-fluid page-body-wrapper full-page-wrapper">

                <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">

                    <div class="row flex-grow custom-center">

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

                                    </div>

                                    <div class="my-3">
                                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="line-height: 1px" type="submit" name="login_btn">Send Password Reset Link</button>
                                    </div>

                                </form>

                            </div>

                        </div>

                        <div class="col-lg-6 forget-half-bg d-flex flex-row">
                        </div>

                    </div>

                </div>

                <!-- content-wrapper ends -->
            </div>

            <!-- page-body-wrapper ends -->

        </div>

    </div>





{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection
