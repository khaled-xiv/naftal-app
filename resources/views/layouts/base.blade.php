<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>@yield('title')</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="65">

<!-- Header-->
@include('includes.header')
<!-- Header Ends-->
<div class="big-container">
	<div id="left-side">
		@include('includes.side-nav')
	</div>
	<div id="right-side">
		<div class="toggle-side-nav">
			<div><i id="toggle-side-nav-btn" onclick="hideSideNav()" class="fa fa-bars"></i></div>
		</div>
		<div>
			@yield('content')
		</div>
	</div>
</div>
</body>

<!--    Bootstrap-->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>

<!--    owl-carousel-->
<script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}" ></script>

<!-- Waypoints -->
<script src="{{asset('js/waypoints/jquery.waypoints.min.js')}}"></script>

<!-- Responsive Tabs JS -->
<script src="{{asset('js/responsive-tabs/jquery.responsiveTabs.min.js')}}"></script>

<!-- Counter -->
<script src="{{asset('js/counter/jquery.counterup.min.js')}}"></script>

<!--    Custom Script-->
<script src="{{ asset('js/script_1.js') }}" defer></script>

<script>
	var sideNavHidden = false;
	function hideSideNav(){
		let left = document.getElementById("left-side");
		let right = document.getElementById("right-side");
		if(!sideNavHidden){
			right.style.width = "100%";
			right.style.marginLeft = "0px";
			left.style.width = "0";
		}else{
			right.style.width = "calc(100% - 250px)";
			right.style.marginLeft = "250px";
			left.style.width = "250px";
		}
		sideNavHidden = !sideNavHidden;
	}
</script>

</html>
