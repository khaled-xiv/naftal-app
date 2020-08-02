<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" src="{{ asset ('favicon.ico')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Fontawesome -->
    <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/bootstrap/bootstrap-select.css') }}" rel="stylesheet" >

    {{--material design lite --}}
    <link rel="stylesheet" href="{{asset('css/material.min.css')}}">

    <!-- Animate Css -->
    <link href="{{asset('css/animate/animate.min.css')}}" rel="stylesheet">

    {{--Owl-carousel--}}
    <link href="{{asset('css/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl-carousel/owl.theme.default.min.css')}}" rel="stylesheet">

    <!-- Responsive Tabs CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive-tabs/responsive-tabs.min.css')}}">

    <!-- Custom Styles -->
    <link href="{{asset('css/style5.css')}}" rel="stylesheet">

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
    <nav class="navbar navbar-expand-lg  fixed-top  white-nav-top">
        <div class="container-fluid">
            <div class="site-nav-wrapper ml-auto">

                <div class="navbar-header">
                    <!-- Mobile Menu Open Button -->
                    <span id="mobile-nav-open-btn">&#9776;</span>
                </div>

                {{--                <!-- Main Menu -->--}}
                <div class="container ">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav pull-right">
                            <li><a class="btn btn-link smooth-scroll" href="#home">{{ __('home') }}</a></li>
                            <li><a class="btn btn-link smooth-scroll" href="#about">{{ __('about') }}</a></li>
                            <li><a class="btn btn-link smooth-scroll" href="#team">{{ __('team') }}</a></li>
                            <li><a class="btn btn-link smooth-scroll" href="#center">{{ __('centers') }}</a></li>
                            <li><a class="btn btn-link smooth-scroll" href="#services">{{ __('services') }}</a></li>
                            <li><a class="btn btn-link smooth-scroll" href="{{url(app()->getLocale().'/forums')}}">{{ __('forums') }}</a></li>
                            <li><a class="btn btn-link smooth-scroll" href="#contact">{{ __('contact') }}</a></li>

                            @guest
                                <li><a class="btn btn-link" href="{{route('login')}}">{{ __('Sign In') }}</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle center-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{Auth()->user()->name}}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('account.show')}}"><i class="fa fa-fw fa-user ml-auto"></i> {{ __('Account') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-fw fa-power-off ml-auto"></i> {{ __('Log Out') }} &nbsp;&nbsp;  </a>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>

                <!-- Mobile Menu -->
                                <div id="mobile-nav">
                                    <!-- Mobile Menu Close Button -->
                                    <span id="mobile-nav-close-btn" style="margin-bottom: 0px">&times;</span>

                                    <div id="mobile-nav-content">
                                        <ul class="nav " style="display: flex;flex-direction: column;">
                                            <li><a class="btn btn-link smooth-scroll" href="#home">{{ __('home') }}</a></li>
                                            <li><a class="btn btn-link smooth-scroll" href="#about">{{ __('about') }}</a></li>
                                            <li><a class="btn btn-link smooth-scroll" href="#team">{{ __('team') }}</a></li>
                                            <li><a class="btn btn-link smooth-scroll" href="#center">{{ __('centers') }}</a></li>
                                            <li><a class="btn btn-link smooth-scroll" href="#services">{{ __('services') }}</a></li>
                                            <li><a class="btn btn-link smooth-scroll" href="{{url(app()->getLocale().'/forums')}}">{{ __('forums') }}</a></li>
                                            <li><a class="btn btn-link smooth-scroll" href="#contact">{{ __('contact') }}</a></li>

                                            @guest
                                                <li><a class="btn btn-link" href="{{url(app()->getLocale().'/'.__('login'))}}">{{ __('Sign In') }}</a></li>
                                            @else
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                        {{Auth()->user()->name}}
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="{{route('account.show',['language'=>app()->getLocale(),'account'=>__('account')])}}"><i class="fa fa-fw fa-user ml-auto"></i> {{ __('Account') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{url(app()->getLocale().'/#contact')}}"><i class="fa fa-fw fa-power-off ml-auto"></i> {{ __('Log Out') }} &nbsp;&nbsp;  </a>
                                                    </div>
                                                </li>
                                            @endguest
                                        </ul>
                                    </div>
                                </div>

            </div>
        </div>
    </nav>
</header>
<!-- Header Ends -->

<!-- Home -->
<section id="home">

    <!--     Background Video -->
    <video id="home-bg-video" poster="{{asset('video/naftal_demo.PNG')}}" autoplay loop muted>
        <source src="{{asset('video/Video_institutionnelle.mp4')}}" type="video/mp4">
    </video>

    <!--     Overlay -->
    <div id="home-overlay"></div>

    <!--     Home Content -->
    <div id="home-content">

        <div id="home-content-inner" class="text-center">

            <div id="home-heading">
                <h1 id="home-heading-1">{{ __('Laravel') }}</h1><br>
                {{--                <h1 id="home-heading-1">Digital</h1><br>--}}
                <h1 id="home-heading-2">Creative <span>Agency</span></h1>
            </div>

            <div id="home-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam in nihil minima unde qui nihil minima.</p>
            </div>

            <div id="home-btn">
                <a class="btn btn-general btn-home smooth-scroll" href="#about" title="Start Now" role="button">Start Now</a>
            </div>

        </div>

    </div>

    <!--     Arrow Down -->
    <a href="#about" id="arrow-down" class="smooth-scroll">
        <i class="fa fa-angle-down"></i>
    </a>

</section>
<!-- Home ends-->

<!-- About -->
<section id="about">

    <!-- About 01 -->
    <div id="about-01">

        <div class="content-box-lg">

            <div class="container">

                <div class="row">

                    <!-- About Left Side -->
                    <div class="col-md-6 col-sm-6 wow slideInLeft" data-wow-duration="1s">

                        <div id="about-left">
                            <div class="vertical-heading">

                                <h2> <strong style="color: #f4c613;">Stations</strong><br>Service</h2>
                            </div>
                        </div>

                    </div>

                    <!-- About Right Side -->
                    <div class="col-md-6 col-sm-6 wow slideInRight" data-wow-duration="1s">

                        <div id="about-right">
                            <p>
                                Le réseau stations-service de Naftal qui est composé de 2010 stations est implanté à travers l’ensemble du territoire national. Il met à votre disposition tous les produits pétroliers ainsi que les services y afférents.
                            </p>
                            <ul>
                                <li>Une panoplie de carburants de qualité à votre disposition</li>
                                <li>et une meilleure prestation pour mieux vous servir</li>
                                <li>Relooking du réseau stations-service</li>
                                <li>Autoroute Est/Ouest</li>
                            </ul>

                        </div>

                    </div>

                </div>

                <!-- About Bottom -->
                <div class="row">

                    <div class="col-md-12 wow fadeInUp" data-wow-duration="2s">

                        <div id="about-bottom " class="text-center">
                            <img src="{{asset('img/station.jpg')}}" style="width: 100% ;height: 400px" alt="About Us" class="img-responsive">
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- About 01 Ends -->

</section>
<!-- About Ends -->

<!-- Team -->
<section id="team">

    <div class="content-box-lg">

        <div class="container">

            <!-- Team Members -->
            <div class="row">

                <!-- Team Left Side -->
                <div class="col-md-6 col-sm-12 wow slideInLeft" data-wow-duration="1s">

                    <div id="team-left">

                        <div class="vertical-heading">
                            <h5>Who We Are</h5>
                            <h2>Meet Our<br><strong>Talented</strong> Team</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, repellat, eos! Dignissimos expedita totam cum quidem autem alias dolorum error a quia optio eligendi, amet animi reprehenderit, quaerat.</p>

                    </div>

                </div>

                <!-- Team Right Side -->
                <div class="col-md-6 col-sm-12 wow slideInRight" data-wow-duration="1s">

                    <div id="team-members" class="owl-carousel owl-theme">

                        <!-- Member 01 -->
                        <div class="team-member">
                            <img src="{{asset('img/team/team-1.jpg')}}" alt="team member" class="img-responsive">
                            <div class="team-member-overlay">
                                <div class="team-member-info text-center">
                                    <h6>Kevin Greer</h6>
                                    <p>Web Designer</p>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- Member 02 -->
                        <div class="team-member">
                            <img src="{{asset('img/team/team-2.jpg')}}" alt="team member" class="img-responsive">
                            <div class="team-member-overlay">
                                <div class="team-member-info text-center">
                                    <h6>Christian Cilinis</h6>
                                    <p>Web Developer</p>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- Member 03 -->
                        <div class="team-member">
                            <img src="img/team/team-3.jpg" alt="team member" class="img-responsive">
                            <div class="team-member-overlay">
                                <div class="team-member-info text-center">
                                    <h6>Andrea Arkov</h6>
                                    <p>Senior Developer</p>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- Member 04 -->
                        <div class="team-member">
                            <img src="img/team/team-4.jpg" alt="team member" class="img-responsive">
                            <div class="team-member-overlay">
                                <div class="team-member-info text-center">
                                    <h6>Harold Houdini</h6>
                                    <p>Art Director</p>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- Member 05 -->
                        <div class="team-member">
                            <img src="img/team/team-5.jpg" alt="team member" class="img-responsive">
                            <div class="team-member-overlay">
                                <div class="team-member-info text-center">
                                    <h6>Angela Perry</h6>
                                    <p>Manager</p>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <!-- Member 06 -->
                        <div class="team-member">
                            <img src="img/team/team-6.jpg" alt="team member" class="img-responsive">
                            <div class="team-member-overlay">
                                <div class="team-member-info text-center">
                                    <h6>Kara Kulis</h6>
                                    <p>Marketing & Sales</p>
                                    <ul class="social-list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

</section>
<!-- Team Ends -->

<!-- About -->
<section id="center">

    {{--    <!-- About 02 -->--}}
    <div id="center-01">

        <div class="content-box-md">

            <div class="container">

                <div class="owl-carousel owl-theme" id="center-items">

                    @foreach($centers as $center)
                        <div class="wow ">
                            <!-- About item 01 -->
                            <div class="center-item text-center" style="margin-right:10px ">
                                <i class="fa fa-home"></i>
                                <h3>{{$center->code}}</h3>
                                <hr>
                                <h4>{{$center->location}}</h4>
                                <h4>{{$center->phone}}</h4>
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>
{{--<!-- About Ends -->--}}

<!-- Services -->
<section id="services">

    <!-- Services 02 -->
    <div id="services-02">

        <div class="content-box-md">

            <div id="services-tabs">

                <ul class="text-center">
                    <li><a href="#service-tab-1">Carburants terre</a></li>
                    <li><a href="#service-tab-2">gpl</a></li>
                    <li><a href="#service-tab-3">Aviation</a></li>
                    <li><a href="#service-tab-4">Marine</a></li>
                </ul>

                <!-- Service Tab 01 -->
                <div id="service-tab-1" class="service-tab">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('img/services/carburants.webp')}}" style="width: 100%;height: 100%" alt="Carburants terre">
                            </div>
                            <div class="col-md-6">
                                <div class="tab-bg">
                                    <h3>Carburants terre</h3>
                                    <p>Naftal commercialise 5 types de carburants terre pour les moteurs essence et diesel</p>
                                    <ul>
                                        <li>Essence Normale</li>
                                        <li>Essence Super</li>
                                        <li>Essence super Sans plomb</li>
                                        <li>Gas oil</li>
                                        <li>GPL/C</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Service Tab 02 -->
                <div id="service-tab-2" class="service-tab">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('img/services/GPL.png')}}" style="width: 100%;height: 100%" alt="gpl">
                            </div>
                            <div class="col-md-6">
                                <div class="tab-bg">
                                    <h3>Gpl</h3>
                                    <p>Les GPL désignent : GAZ DE PÉTROLE LIQUÉFIÉ. Ce sont des mélanges de Butane (C4) et de Propane (C3). Les GPL peuvent être obtenus à partir de diverses sources de traitement des hydrocarbures telles que:
                                    </p>
                                    <ul>
                                        <li>le traitement du gaz naturel ou gaz associés.</li>
                                        <li>le raffinage du pétrole.</li>
                                        <li>la liquéfaction du gaz naturel.</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Service Tab 03 -->
                <div id="service-tab-3" class="service-tab">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('img/services/white-plane-sky.webp')}}" style="width: 100%;height: 100%" alt="Aviation">
                            </div>
                            <div class="col-md-6">
                                <div class="tab-bg">
                                    <h3>Aviation</h3>
                                    <ul>
                                        <li>Lubrifiants Aviation :</li>
                                        <li>Huiles Moteurs :</li>
                                        <li>Fluides Hydrauliques :</li>
                                        <li>Huiles Turbines :</li>
                                        <li>Carburants Aviation :</li>
                                        <li>Produits Spéciaux : </li>
                                        <li>Autres :</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Service Tab 04 -->
                <div id="service-tab-4" class="service-tab">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('img/services/Marine1.png')}}" style="width: 100%;height: 100%" alt="Marine">
                            </div>
                            <div class="col-md-6">
                                <div class="tab-bg">
                                    <h3>Marine</h3>
                                    <ul>
                                        <li>Lubrifiants Marine :</li>
                                        <li>Huiles Moteurs:</li>
                                        <li>Huiles Cylindres :</li>
                                        <li>Huiles Engrenages :</li>
                                        <li>Huiles Turbines :</li>
                                        <li>Produits Spéciaux :</li>
                                        <li>Carburants Marine:</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- Services 02 Ends -->

</section>
<!-- Services Ends -->

{{--<!-- Contact -->--}}
<section id="contact">

    <div class="content-box-md">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-12 col-sm-12">

                    <!--                     Contact Left -->
                    <div id="contact-left">

                        <div class="vertical-heading">
                            <h5>Who We Are</h5>
                            <h2>Get<br>In <strong>Touch</strong></h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias modi est itaque aliquam sit, minima esse nihil mollitia no.</p>

                        <div id="offices">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="office">
                                        <h4>Tiaret</h4>
                                        <ul class="office-details">
                                            <li><i class="fa fa-mobile"></i><span>+(55) 879 58 87 46</span></li>
                                            <li><i class="fa fa-envelope"></i><span>support@solo.com</span></li>
                                            <li><i class="fa fa-map-marker"></i><span>524 Mina Street Building 05<br>Newyork, USA.</span></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="office">
                                        <h4>Alger</h4>
                                        <ul class="office-details">
                                            <li><i class="fa fa-mobile"></i><span>+(88) 457 87 74 87</span></li>
                                            <li><i class="fa fa-envelope"></i><span>support@solo.com</span></li>
                                            <li><i class="fa fa-map-marker"></i><span>507 Din Street Building 55 <br>Sydney, Australia.</span></li>
                                        </ul>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <ul class="social-list">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>

                    </div>

                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">

                    <!--                     Contact Right -->
                    <div class="contact-right">

                        {!! Form::open(['method'=>'POST', 'action'=> ['HomeController@sendEmail']]) !!}
                        <h4>Send Message</h4>
                        <p>If you have any problem please contact us.</p>

                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required id="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required id="email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone No.">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" required id="subject" placeholder="Subject">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" required placeholder="Message"></textarea>
                        </div>

                        <div id="submit-btn" class="text-right">
                            <button class="btn btn-general btn-yellow" type="submit" href="" title="Submit" role="button">Submit</button>
                        </div>

                        {!! Form::close() !!}
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- Contact Ends -->

<!-- Google Map -->
<section id="google-map">
    <div class="container-fluid">
        <div class="row">
            <div id="map"></div>
        </div>
    </div>
</section>
<!-- Google Map Ends -->

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

{{--jquery--}}
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

{{--material design lite --}}
{{--<script src="{{asset('js/material.min.js')}}"></script>--}}

<!--    Bootstrap-->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>

{{--    owl-carousel--}}
<script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}" ></script>


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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5thfF3yalaB_eqFj6SVd488_jmQMLkyI=initMap">
</script>

<!--    Easing-->
<script src="{{asset('js/easing/jquery.easing.1.3.min.js')}}"></script>

<!-- Responsive Tabs JS -->
<script src="{{asset('js/responsive-tabs/jquery.responsiveTabs.min.js')}}"></script>

<!-- WOW JS -->
<script src="{{asset('js/wow/wow.min.js')}}"></script>

<!--    Custom Script-->
<script src="{{ asset('js/script.js') }}" defer></script>

</html>
