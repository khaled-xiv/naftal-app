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
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet" >

    <!-- Animate Css -->
    <link href="{{asset('css/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Responsive  Css -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

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

        <!-- Back To Top -->
        <a href="#home" id="back-to-top" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="home" role="button">
            <i class="fa fa-angle-up"></i>
        </a>

    </footer>
    <!-- Footer Ends -->

</body>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>

    <!--    Bootstrap-->
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}" defer></script>

    <!--    Google MAP  -->
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5thfF3yalaB_eqFj6SVd488_jmQMLkyI&callback=initMap">
    </script>

    <!--    Custom Script-->
    <script src="{{ asset('js/script.js') }}" defer></script>

</html>
