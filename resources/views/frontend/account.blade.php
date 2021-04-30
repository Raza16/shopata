@extends('frontend.layouts.master')

@section('title','Account')

@section('pagecss')
<link href="{{asset('frontend/css/account.css')}}" rel="stylesheet">
@endsection

@section('content')
<main class="bg_gray">

	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{url('/')}}">Home</a></li>
				</ul>
		</div>
		<h1>Sign In or Create an Account</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
				{{-- login start --}}
			<div class="col-xl-6 col-lg-6 col-md-8">
				{{-- <div class="box_account">
					<h3 class="client">Login</h3>
					<div class="form_container">
						<div class="row no-gutters">
							<div class="col-lg-6 pr-lg-1">
								<a href="#0" class="social_bt facebook">Login with Facebook</a>
							</div>
							<div class="col-lg-6 pl-lg-1">
								<a href="#0" class="social_bt google">Login with Google</a>
							</div>
						</div>
						<div class="divider"><span>Or</span></div>

						<div class="form-group">
							<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email*">
							@error('email')
							<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
								@enderror
						</div>
						<div class="form-group">
							<input type="password" class="form-control  @error('password') is-invalid @enderror" name="password_in" id="password_in" value="" placeholder="Password*">
							@error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            	    @enderror
						</div>
						<div class="clearfix add_bottom_15">
							<div class="checkboxes float-left">
								<label class="container_check">Remember me
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="float-right"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div>
						</div>

						<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
						<div id="forgot_pw">
							<div class="form-group">
								<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
							</div>
							<p>A new password will be sent shortly.</p>
							<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
						</div>
					</div>
				</div> --}}
				<div class="row">
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Find Locations</li>
							<li>Quality Location check</li>
							<li>Data Protection</li>
						</ul>
					</div>
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Secure Payments</li>
							<li>H24 Support</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">SignUp</h3> <small class="float-right pt-2">* Required Fields</small>
                    <form action="{{url('account')}}" method="POST">
                        @csrf
                        <div class="form_container">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email_2" placeholder="Email*" required>
                                @error('email')
                                    <p><small class="text-danger">{{ $errors->first('email') }}</small></p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password_in_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value="" placeholder="Password*">
                                @error('password')
                                    <p><small class="text-danger">{{ $errors->first('password') }}</small></p>
                                @enderror
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="container_radio" style="display: inline-block; margin-right: 15px;">Buyer
                                    <input type="radio" name="client_type" checked="" value="5">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_radio" style="display: inline-block;">Seller
                                    <input type="radio" name="client_type" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="private box" style="">
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="first_name" placeholder="Name*">
                                            @error('first_name')
                                                <p><small class="text-danger">{{ $errors->first('first_name') }}</small></p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name*">
                                            @error('last_name')
                                                <p><small class="text-danger">{{ $errors->first('last_name') }}</small></p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="address" placeholder="Full Address*">
                                            @error('address')
                                                <p><small class="text-danger">{{ $errors->first('address') }}</small></p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" placeholder="City*">
                                            @error('address')
                                                <p><small class="text-danger">{{ $errors->first('address') }}</small></p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="postal_code" placeholder="Postal Code*">
                                            @error('postal_code')
                                                <p><small class="text-danger">{{ $errors->first('postal_code') }}</small></p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <input type="text" name="country" id="country" class="form-control" placeholder="Country*">
                                            @error('country')
                                                <p><small class="text-danger">{{ $errors->first('country') }}</small></p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone" placeholder="Phone *">
                                            @error('phone')
                                                <p><small class="text-danger">{{ $errors->first('phone') }}</small></p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /private -->
                            {{-- <div class="company box" style="display: none;">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Company Name*">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Full Address">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City*">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Postal Code*">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <div class="custom-select-form">
                                                <select class="wide add_bottom_10" name="country" id="country_2" style="display: none;">
                                                        <option value="" selected="">Country*</option>
                                                        <option value="Europe">Europe</option>
                                                        <option value="United states">United states</option>
                                                        <option value="Asia">Asia</option>
                                                </select><div class="nice-select wide add_bottom_10" tabindex="0"><span class="current">Country*</span><ul class="list"><li data-value="" class="option selected">Country*</li><li data-value="Europe" class="option">Europe</li><li data-value="United states" class="option">United states</li><li data-value="Asia" class="option">Asia</li></ul></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Telephone *">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                            </div> --}}
                            <!-- /company -->
                            <hr>
                            <div class="form-group">
                                <label class="container_check">Accept <a href="{{url('privacypolicy')}}">Terms and conditions</a>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Register" class="btn_1 full-width">
                            </div>
                        </div>
                    </form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
