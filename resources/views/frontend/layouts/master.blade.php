<!DOCTYPE html>
<html lang="en">
    @include('frontend.layouts.head')

<body>
	<div id="page">
        @include('frontend.layouts.header')
		<!-- /header -->
    @yield('content')
	<!-- /main -->
    @include('frontend.layouts.footer')

	<!--/footer-->
	</div>
	<!-- page -->
    @yield('pop')

	<!-- /Newsletter Popup -->

	<div id="toTop" class="visible"></div>

    @include('frontend.layouts.script')
    @stack('script')

<div id="mm-blocker" class="mm-slideout"></div>
</body>
</html>
