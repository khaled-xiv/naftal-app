@extends('layouts.app')
@section('title', 'Home')
@section('content')
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

<!-- About -->
<section id="about">

{{--    <!-- About 02 -->--}}
    <div id="about-02">

        <div class="content-box-md">

            <div class="container">

                <div class="owl-carousel owl-theme" id="team-members">

                    @foreach($centers as $center)
                    <div class="wow ">
                        <!-- About item 01 -->
                        <div class="about-item text-center" style="margin-right:10px ">
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
{{--    <!-- About 02 Ends -->--}}

</section>
{{--<!-- About Ends -->--}}

{{--<!-- Team -->--}}
{{--<section id="team">--}}

{{--    <div class="content-box-lg">--}}

{{--        <div class="container">--}}

{{--            <!-- Team Members -->--}}
{{--            <div class="row">--}}

{{--                <!-- Team Left Side -->--}}
{{--                <div class="col-md-6 col-sm-6 wow slideInLeft" data-wow-duration="1s">--}}

{{--                    <div id="team-left">--}}

{{--                        <div class="vertical-heading">--}}
{{--                            <h5>Who We Are</h5>--}}
{{--                            <h2>Meet Our<br><strong>Talented</strong> Team</h2>--}}
{{--                        </div>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, repellat, eos! Dignissimos expedita totam cum quidem autem alias dolorum error a quia optio eligendi, amet animi reprehenderit, quaerat.</p>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <!-- Team Right Side -->--}}
{{--                <div class="col-md-6 col-sm-6 wow slideInRight" data-wow-duration="1s">--}}

{{--                    <div id="team-members" class="owl-carousel">--}}

{{--                        <!-- Member 01 -->--}}
{{--                        <div class="team-member">--}}
{{--                            <img src="{{asset('img/team/team-1.jpg')}}" alt="team member" class="img-responsive">--}}
{{--                            <div class="team-member-overlay">--}}
{{--                                <div class="team-member-info text-center">--}}
{{--                                    <h6>Kevin Greer</h6>--}}
{{--                                    <p>Web Designer</p>--}}
{{--                                    <ul class="social-list">--}}
{{--                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <!-- Member 02 -->--}}
{{--                        <div class="team-member">--}}
{{--                            <img src="{{asset('img/team/team-2.jpg')}}" alt="team member" class="img-responsive">--}}
{{--                            <div class="team-member-overlay">--}}
{{--                                <div class="team-member-info text-center">--}}
{{--                                    <h6>Christian Cilinis</h6>--}}
{{--                                    <p>Web Developer</p>--}}
{{--                                    <ul class="social-list">--}}
{{--                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <!-- Member 03 -->--}}
{{--                        <div class="team-member">--}}
{{--                            <img src="{{asset('img/team/team-3.jpg')}}" alt="team member" class="img-responsive">--}}
{{--                            <div class="team-member-overlay">--}}
{{--                                <div class="team-member-info text-center">--}}
{{--                                    <h6>Andrea Arkov</h6>--}}
{{--                                    <p>Senior Developer</p>--}}
{{--                                    <ul class="social-list">--}}
{{--                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <!-- Member 04 -->--}}
{{--                        <div class="team-member">--}}
{{--                            <img src="img/team/team-4.jpg" alt="team member" class="img-responsive">--}}
{{--                            <div class="team-member-overlay">--}}
{{--                                <div class="team-member-info text-center">--}}
{{--                                    <h6>Harold Houdini</h6>--}}
{{--                                    <p>Art Director</p>--}}
{{--                                    <ul class="social-list">--}}
{{--                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <!-- Member 05 -->--}}
{{--                        <div class="team-member">--}}
{{--                            <img src="img/team/team-5.jpg" alt="team member" class="img-responsive">--}}
{{--                            <div class="team-member-overlay">--}}
{{--                                <div class="team-member-info text-center">--}}
{{--                                    <h6>Angela Perry</h6>--}}
{{--                                    <p>Manager</p>--}}
{{--                                    <ul class="social-list">--}}
{{--                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <!-- Member 06 -->--}}
{{--                        <div class="team-member">--}}
{{--                            <img src="img/team/team-6.jpg" alt="team member" class="img-responsive">--}}
{{--                            <div class="team-member-overlay">--}}
{{--                                <div class="team-member-info text-center">--}}
{{--                                    <h6>Kara Kulis</h6>--}}
{{--                                    <p>Marketing & Sales</p>--}}
{{--                                    <ul class="social-list">--}}
{{--                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div id="progress-elements">--}}

{{--                <!-- Progress Bars -->--}}
{{--                <div class="row wow fadeInUp">--}}

{{--                    <div class="col-md-6 col-sm-6">--}}

{{--                        <!-- Skill 01 -->--}}
{{--                        <div class="skill">--}}
{{--                            <h4>Web Design</h4>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">--}}
{{--                                    <span>95%</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-6">--}}
{{--                        <!-- Skill 02 -->--}}
{{--                        <div class="skill">--}}
{{--                            <h4>Photoshop/Illustration</h4>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">--}}
{{--                                    <span>75%</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-6">--}}
{{--                        <!-- Skill 03 -->--}}
{{--                        <div class="skill">--}}
{{--                            <h4>Web Development</h4>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">--}}
{{--                                    <span>75%</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-6">--}}
{{--                        <!-- Skill 04 -->--}}
{{--                        <div class="skill">--}}
{{--                            <h4>Digital Marketing</h4>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">--}}
{{--                                    <span>90%</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}



{{--    </div>--}}

{{--</section>--}}
{{--<!-- Team Ends -->--}}

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
                <div class="col-lg-6 col-md-12 col-sm-12">

<!--                     Contact Right -->
                    <div class="contact-right">

                        {!! Form::open(['method'=>'POST', 'action'=> 'HomeController@sendEmail']) !!}
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
<!--<section id="google-map">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->
<!--            <div id="map"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Google Map Ends -->

@stop




















