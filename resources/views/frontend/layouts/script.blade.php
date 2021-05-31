	<!-- COMMON SCRIPTS -->
    <script src="{{asset('frontend/js/common_scripts.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>

	<!-- SPECIFIC SCRIPTS -->
	<script src="{{asset('frontend/js/carousel-home.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.cookiebar.js')}}"></script>

	<script>
		$(document).ready(function() {
			'use strict';
			$.cookieBar({
				fixed: true
			});
		});
	</script>

    {{-- search --}}
    <script src="{{asset('frontend/js/search/dist/js/suggestion-box.min.js')}}"></script>
