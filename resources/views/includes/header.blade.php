
<!-- Header -->
<header>
    <nav class="navbar navbar-fixed-top white-nav-top">
        <div class="container-fluid">
            <div class="site-nav-wrapper">

                <div class="navbar-header">

                    <!-- Mobile Menu Open Button -->
                    <span id="mobile-nav-open-btn">&#9776;</span>

                    <!-- Logo -->
<!--                    <a class="navbar-brand smooth-scroll" href="">-->
<!--                        <img src="{{asset('img/logo/naftal.jpg')}}" style="width: 100px;height: 30px" >-->
<!--                    </a>-->
                </div>

                <!-- Main Menu -->
                <div class="container">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav pull-right">
                            <li><a class="btn btn-link" href=" {{ route('home')}}">Home</a></li>
                            <li><a class="smooth-scroll" href="#about">About</a></li>
                            <li><a class="smooth-scroll" href="#team">Team</a></li>
                            <li><a class="smooth-scroll" href="#services">Services</a></li>
                            <li><a class="smooth-scroll" href="#portfolio">Work</a></li>
                            <li><a class="smooth-scroll" href="#blog">Blog</a></li>
                            <li><a class="smooth-scroll" href="#contact">Contact</a></li>
                            <li><a class="btn btn-link" href="{{ route('login')}}">Sign in</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-nav">
                    <!-- Mobile Menu Close Button -->
                    <span id="mobile-nav-close-btn">&times;</span>

                    <div id="mobile-nav-content">
                        <ul class="nav">
                            <li><a class="btn btn-link" href=" {{ route('home')}}">Home</a></li>
                            <li><a class="smooth-scroll" href="#about">About</a></li>
                            <li><a class="smooth-scroll" href="#team">Team</a></li>
                            <li><a class="smooth-scroll" href="#services">Services</a></li>
                            <li><a class="smooth-scroll" href="#portfolio">Work</a></li>
                            <li><a class="smooth-scroll" href="#blog">Blog</a></li>
                            <li><a class="smooth-scroll" href="#contact">Contact</a></li>
                            <li><a class="btn btn-link" href="{{ route('login')}}">Sign in</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</header>
<!-- Header Ends -->

