@extends('layouts.app')
@section('title', 'Home')
@section('content')
<!-- Home -->
<section id="home">

<!--     Background Video -->
    <video id="home-bg-video" poster="video/solo.jpg" autoplay loop muted>
        <source src="video/solo.mp4" type="video/mp4">
        <source src="video/solo.ogv" type="video/ogg">
        <source src="video/solo.webm" type="video/webm">
    </video>

<!--     Overlay -->
    <div id="home-overlay"></div>

<!--     Home Content -->
    <div id="home-content">

        <div id="home-content-inner" class="text-center">

            <div id="home-heading">
                <h1 id="home-heading-1">Digital</h1><br>
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

<!-- Contact -->
<section id="contact">

    <div class="content-box-md">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

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
                                        <h4>United States</h4>
                                        <ul class="office-details">
                                            <li><i class="fa fa-mobile"></i><span>+(55) 879 58 87 46</span></li>
                                            <li><i class="fa fa-envelope"></i><span>support@solo.com</span></li>
                                            <li><i class="fa fa-map-marker"></i><span>524 Mina Street Building 05<br>Newyork, USA.</span></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="office">
                                        <h4>Australia</h4>
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
                <div class="col-md-6">

<!--                     Contact Right -->
                    <div id="contact-right">

                        <form>
                            <h4>Send Message</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa repell.</p>

                            <div class="row">

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" placeholder="Phone No.">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="Message"></textarea>
                            </div>

                            <div id="submit-btn">
                                <a class="btn btn-general btn-yellow" href="#" title="Submit" role="button">Submit</a>
                            </div>

                        </form>

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

@stop

