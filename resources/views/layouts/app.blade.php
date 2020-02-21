<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>@yield('title')</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="65" >
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    @include('includes.header')

    @yield('content')

    <!-- Footer  -->
    <footer class="text-center">
        @include('includes.footer')

    <!--         Back To Top-->
        <a href="#home" id="back-to-top" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="home" role="button">
            <i class="fa fa-angle-up"></i>
        </a>

    </footer>
    <!-- Footer Ends -->

</body>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>

    <!--    Bootstrap-->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>

    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: 35.367355, lng: 1.322032};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 10, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9EdV2JfPG1Vfviw9gf_HlblIUfs7Ie2E&callback=initMap">
    </script>

    <!--    Easing-->
    <script src="{{asset('js/easing/jquery.easing.1.3.min.js')}}"></script>

    <!-- WOW JS -->
    <script src="{{asset('js/wow/wow.min.js')}}"></script>

    <!--    Custom Script-->
    <script src="{{ asset('js/script.js') }}" defer></script>

</html>
