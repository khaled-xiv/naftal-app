<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{__('Home')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" src="{{ asset ('favicon.ico')}}">

    <!-- Google Fonts -->
    <link href="{{asset('fonts/Raleway.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/Open Sans.css')}}" rel="stylesheet">

    <!-- Fontawesome -->
    <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" >

    <!-- Animate Css -->
    <link href="{{asset('css/animate/animate.min.css')}}" rel="stylesheet">

    {{--Owl-carousel--}}
    <link href="{{asset('css/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl-carousel/owl.theme.default.min.css')}}" rel="stylesheet">

    <!-- Responsive Tabs CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive-tabs/responsive-tabs.min.css')}}">

    {{--    toast --}}
    <link href="{{asset('css/toast/jquery.toast.css')}}" rel="stylesheet">
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
    <nav class="navbar navbar-expand-lg  fixed-top ">
        <div class="container-fluid">
            <div class="site-nav-wrapper ml-auto">

                <div class="navbar-header">
                    <!-- Mobile Menu Open Button -->
                    <i id="mobile-nav-open-btn" class="fa fa-bars"></i>
                </div>

                <!-- Main Menu -->
                <div class="container ">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav pull-right">
                            <li><a class="btn btn-link smooth-scroll" href="#home">{{ __('home') }}</a></li>
                            <li><a class="btn btn-link smooth-scroll" href="#about">{{ __('about') }}</a></li>
                            <li><a class="btn btn-link smooth-scroll" href="#team">{{ __('team') }}</a></li>
                            @if(!Auth()->check() || Auth()->user()->is_technician())
                            <li><a class="btn btn-link smooth-scroll" href="#center">{{ __('centers') }}</a></li>
                            @endif
                            <li><a class="btn btn-link smooth-scroll" href="#services">{{ __('services') }}</a></li>
                            @if(Auth()->check() && !Auth()->user()->is_technician())
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/'.__('centers'))}}">
                                    {{ ucwords(__('centers')) }}
                                </a>
                            </li>
                            @endif
                            @if(!Auth()->check() || !Auth()->user()->is_technician())
                            <li>
                                <a class="btn btn-link" href="{{url(app()->getLocale().'/'.__('equipments'))}}">
                                    {{ ucwords(__('equipments')) }}
                                </a>
                            </li>
                            @endif
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/forums')}}">{{ __('forums') }}</a></li>
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
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/forums')}}">{{ __('forums') }}</a></li>
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

                <h1 id="home-heading-1">{{ __('Informatisez') }}</h1><br>
                {{--                <h1 id="home-heading-1">Digital</h1><br>--}}
                <h1 id="home-heading-2">{{__('your')}} <span>{{__('maintenance')}}</span></h1>
            </div>

            <div id="home-text">
                <p>{{__('Declare and follow the interventions in the field and plan them in a few clicks')}}.</p>
            </div>

            <div id="home-btn">
                <a class="btn btn-general btn-home smooth-scroll" href="#about" title="Start Now" role="button">{{__('Start Now')}}</a>
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
                                @if(app()->getLocale()=="en")
                                    <h5>Who We Are</h5>
                                    <h2> About <br><strong style="color: #f4c613;">Naftal</strong><br></h2>
                                @else
                                    <h5 style="left: -70px">Qui nous Sommes</h5>
                                    <h2> A Propos De <br><strong style="color: #f4c613;">Naftal</strong><br></h2>
                                @endif

                            </div>
                        </div>

                    </div>

                    <!-- About Right Side -->
                    <div class="col-md-6 col-sm-6 wow slideInRight" data-wow-duration="1s">

                        <div id="about-right">
                            @if(app()->getLocale()=='fr')
                            <p>Naftal est une société par actions (SPA) au capital social de 40 000 000 000 DA. Fondée en 1982 et filiale à 100% du Groupe Sonatrach,
                                elle est rattachée à l’activité commercialisation. Elle a pour mission principale,
                                la distribution et la commercialisation des produits pétroliers et dérivés sur le marché national.
                            </p>

                            <p>Elle intervient également dans le domaine de :</p>
                            <ul>
                                <li>L’enfûtage des GPL.</li>
                                <li>La formulation des bitumes.</li>
                                <li>Le transport des produits pétroliers.</li>
                                <li>Le cabotage et les pipes, pour l’approvisionnement des entrepôts à partir des raffineries.</li>
                                <li>Le rail pour le ravitaillement des dépôts à partir des entrepôts.</li>
                            </ul>
                            @else
                                <p>Naftal is a joint stock company (SPA) with a share capital of 40,000,000,000 DA. Founded in 1982 and a 100% subsidiary of the Sonatrach Group,
                                    it is attached to the marketing activity. Its main mission is,
                                    the distribution and marketing of petroleum products and derivatives on the national market.
                                </p>

                                <p>It also works in the field of:</p>
                                <ul>
                                    <li>GPL drumming.</li>
                                    <li>The formulation of bitumens.</li>
                                    <li>Transportation of petroleum products.</li>
                                    <li>Cabotage and pipes, for the supply of warehouses from refineries.</li>
                                    <li>Rail for the supply of depots from warehouses.</li>
                                </ul>

                            @endif

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
                            @if(app()->getLocale()=="en")
                                <h5>Who We Are</h5>
                                <h2>Meet Our<br><strong>Talented</strong> Team</h2>
                            @else
                                <h5 style="left: -70px">Qui nous Sommes</h5>
                                <h2>Rencontrez Notre<br>Equipe<strong>Talentueuse</strong></h2>
                            @endif
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, magni, reprehenderit. Amet aspernatur corporis dolorum eligendi eum, harum hic in, ipsa labore, neque optio quae quia repudiandae sed velit voluptatum.</p>
                    </div>

                </div>

                <!-- Team Right Side -->
                <div class="col-md-6 col-sm-12 wow slideInRight" data-wow-duration="1s">

                    <div id="team-members" class="owl-carousel owl-theme">

                        @foreach($users as $user)
                            <!-- Member 01 -->
                                <div class="team-member">
                                    <img src="{{$user->photo? asset('img/users/'.$user->photo):asset('img/users/profile-placeholder.jpg')}}" alt="team member" class="img-responsive">
                                    <div class="team-member-overlay">
                                        <div class="team-member-info text-center">
                                            <h6>{{$user->name}}</h6>
                                            <p>{{__($user->role->name)}}</p>
                                            <ul class="social-list">
                                                <li><a @if ($user->fb_link) href="{{$user->fb_link}}" @else onclick="return false;" href="#" @endif><i class="fa fa-facebook"></i></a></li>
                                                <li><a @if ($user->twitter_link) href="{{$user->twitter_link}}" @else onclick="return false;" href="#" @endif><i class="fa fa-twitter"></i></a></li>
                                                <li><a @if ($user->gmail_link) href="mailto:{{$user->gmail_link}}"  @else onclick="return false;" href="#" @endif><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
                    <li><a href="#service-tab-1">{{__('Land fuels ')}}</a></li>
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
                                    <h3>{{__('Land fuels')}}</h3>
                                    <p>
                                        {{__('Naftal markets 5 types of earth fuels for gasoline and diesel engines')}}</p>
                                    <ul>
                                        <li>{{__('Normal essence')}}</li>
                                        <li>{{__('Essence Super')}}</li>
                                        <li>{{__('Essence super Sans plomb')}}</li>
                                        <li>{{__('Gas oil')}}</li>
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
                                    @if(app()->getLocale()=='fr')
                                    <p>Les GPL désignent : GAZ DE PÉTROLE LIQUÉFIÉ. Ce sont des mélanges de Butane (C4)
                                        et de Propane (C3).
                                        Les GPL peuvent être obtenus à partir de diverses sources de traitement des
                                        hydrocarbures telles que:
                                    </p>
                                    @else
                                        <p>LPG stands for: LIQUEFIED PETROLEUM GAS. They are mixtures of Butane (C4) and Propane (C3).
                                            LPGs can be obtained from various hydrocarbon processing sources such as:
                                        </p>
                                    @endif
                                    <ul>
                                        <li>{{__('Le traitement du gaz naturel ou gaz associés')}}.</li>
                                        <li>{{__('Le raffinage du pétrole')}}.</li>
                                        <li>{{__('La liquéfaction du gaz naturel')}}.</li>
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
                                        <li>{{__('Lubrifiants Aviation')}}.</li>
                                        <li>{{__('Huiles Moteurs')}}.</li>
                                        <li>{{__('Fluides Hydrauliques')}}.</li>
                                        <li>{{__('Huiles Turbines')}}.</li>
                                        <li>{{__('Carburants Aviation')}}.</li>
                                        <li>{{__('Produits Spéciaux')}}.</li>
                                        <li>{{__('Autres')}}.</li>
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
                                        <li>{{__('Lubrifiants Marine')}}.</li>
                                        <li>{{__('Huiles Moteurs')}}.</li>
                                        <li>{{__('Huiles Cylindres')}}.</li>
                                        <li>{{__('Huiles Engrenages')}}.</li>
                                        <li>{{__('Huiles Turbines')}}.</li>
                                        <li>{{__('Produits Spéciaux')}}.</li>
                                        <li>{{__('Carburants Marine')}}.</li>
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
                            @if(app()->getLocale()=="en")
                                <h5>Who We Are</h5>
                                <h2>Get<br>In <strong>Touch</strong></h2>
                            @else
                                <h5 style="left: -70px">Qui nous Sommes</h5>
                                <h2>Avoir<br>En <strong>Contact</strong></h2>
                            @endif

                        </div>
                        <br>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias modi est itaque aliquam sit, minima esse nihil mollitia no.</p>

                        <div id="offices">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="office">
                                        <h4>Tiaret</h4>
                                        <ul class="office-details">
                                            <li><i class="fa fa-mobile"></i><span>+(213) 627 333 210 </span></li>
                                            <li><i class="fa fa-envelope"></i><span>support@solo.com</span></li>
                                            <li><i class="fa fa-map-marker"></i><span>City belhadj elhachemi<br>Tiaret, Tiaret.</span></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="office">
                                        <h4>Alger</h4>
                                        <ul class="office-details">
                                            <li><i class="fa fa-mobile"></i><span>+(213) 627 333 210</span></li>
                                            <li><i class="fa fa-envelope"></i><span>support@solo.com</span></li>
                                            <li><i class="fa fa-map-marker"></i><span>City belhadj elhachemi <br>ALger, Alger.</span></li>
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

                        {!! Form::open(['method'=>'POST','id'=>'contact_form', 'action'=> ['HomeController@sendEmail']]) !!}

                        <h4>{{__('Send us message')}}</h4>
                        <p>{{__('If you have any problem please contact us.')}}</p>

                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required id="name" placeholder="{{__('Name')}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required id="email" placeholder="{{__('email address')}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="{{('Phone')}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" required id="subject" placeholder="{{__('Subject')}}">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" required placeholder="Message"></textarea>
                        </div>

                        <div id="submit-btn" class="text-right">
                            <button class="btn btn-general btn-yellow" id="btn-submit" type="submit" href="" title="Submit" role="button">
                                {{__('Submit')}}</button>
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


{{--jquery--}}
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!--    Bootstrap-->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>

<script  async
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwsUAzVTx3UgIfh3Tgn5FtxoLrCaRawJU">

</script>

{{--    owl-carousel--}}
<script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}" ></script>

<!--    Easing-->
<script src="{{asset('js/easing/jquery.easing.1.3.min.js')}}"></script>

<!-- Responsive Tabs JS -->
<script src="{{asset('js/responsive-tabs/jquery.responsiveTabs.min.js')}}"></script>

<!-- WOW JS -->
<script src="{{asset('js/wow/wow.min.js')}}"></script>

<!--    Custom Script-->
<script src="{{ asset('js/script.js') }}" defer></script>

<script src="{{ asset('js/toast/jquery.toast.min.js') }}"></script>
<script !src="">

    // contact_form

    $("#contact_form").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                if(data.success==true)
                {
                    $.toast({

                        text : data.status,
                        showHideTransition : 'slide',
                        bgColor : 'green',
                        textColor : '#eee',
                        allowToastClose : true,
                        hideAfter : 3000,
                        stack : 5,
                        textAlign : 'center',
                        position : 'bottom-center',
                        width:"100%"
                    })
                }else {
                    $.toast({

                        text : data.error,
                        showHideTransition : 'slide',
                        bgColor : '#CA0B00',
                        textColor : '#eee',
                        allowToastClose : true,
                        hideAfter : 3000,
                        stack : 5,
                        textAlign : 'center',
                        position : 'bottom-center',
                        width:"100%"
                    })
                }
                form.trigger('reset');

            }
        });

    });


</script>
</body>
</html>
