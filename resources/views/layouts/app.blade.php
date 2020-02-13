<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" src="{{ asset ('favicon.ico')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


    <!-- Fontawesome -->
    <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" >

    <!-- Animate Css -->
    <link href="{{asset('css/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Responsive  Css -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="65" >
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="site-nav-wrapper">

                    <div class="navbar-header">

                        <!-- Mobile Menu Open Button -->
                        <span id="mobile-nav-open-btn">&#9776;</span>

                        <!-- Logo -->
                        <a class="navbar-brand smooth-scroll" href="#home">
                            <img src="img/logo/logo.png" alt="logo">
                        </a>
                    </div>

                    <!-- Main Menu -->
                    <div class="container">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav pull-right">
                                <li><a class="smooth-scroll" href="#home">Home</a></li>
                                <li><a class="smooth-scroll" href="#about">About</a></li>
                                <li><a class="smooth-scroll" href="#team">Team</a></li>
                                <li><a class="smooth-scroll" href="#services">Services</a></li>
                                <li><a class="smooth-scroll" href="#portfolio">Work</a></li>
                                <li><a class="smooth-scroll" href="#blog">Blog</a></li>
                                <li><a class="smooth-scroll" href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Mobile Menu -->
                    <div id="mobile-nav">
                        <!-- Mobile Menu Close Button -->
                        <span id="mobile-nav-close-btn">&times;</span>

                        <div id="mobile-nav-content">
                            <ul class="nav">
                                <li><a class="smooth-scroll" href="#home">Home</a></li>
                                <li><a class="smooth-scroll" href="#about">About</a></li>
                                <li><a class="smooth-scroll" href="#team">Team</a></li>
                                <li><a class="smooth-scroll" href="#services">Services</a></li>
                                <li><a class="smooth-scroll" href="#portfolio">Work</a></li>
                                <li><a class="smooth-scroll" href="#blog">Blog</a></li>
                                <li><a class="smooth-scroll" href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <!-- Header Ends -->

    @yield('content')

    <!-- Footer  -->
    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Copyright &copy; 2020 All Rights Reserved By <span>Naftal Inc.</span>
                    </p>
                </div>
            </div>
        </div>

         Back To Top
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
