<!DOCTYPE html>
<html lang="en">
@include('frontend.layouts.head')
<body>
	<div id="page">
        @include('frontend.layouts.header')
		<!-- /header -->
    @yield('content')
	<!-- /main -->
	<!--/footer-->
	</div>
	<div id="toTop" class="visible"></div>
	<!-- page -->
    @yield('pop')
	<!-- /Newsletter Popup -->
    @include('frontend.layouts.script')
	 @yield('script')
<div id="mm-blocker" class="mm-slideout"></div>
</body>
</html>
