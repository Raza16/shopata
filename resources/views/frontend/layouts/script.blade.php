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

    <script>
        $(document).ready(function(){

            @foreach ($cat as $item)

                $("#category-{{$item->slug}}").click(function(){
                    // alert('hello');
                    var id  =   $("#category-{{$item->slug}}").val();
                    // var url =   ""
                    alert(id);
                });

            @endforeach
        });
    </script>
