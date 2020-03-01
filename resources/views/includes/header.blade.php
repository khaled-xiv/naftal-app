
<!-- Header -->
<header>
    <nav class="navbar navbar-fixed-top white-nav-top">
        <div class="container-fluid">
            <div class="site-nav-wrapper">

                <div class="navbar-header">
                    <!-- Mobile Menu Open Button -->
                    <span id="mobile-nav-open-btn">&#9776;</span>
                </div>

                <!-- Main Menu -->
                <div class="container ">
                    <div class="collapse navbar-collapse ">
                        <ul class="nav navbar-nav pull-right">
                            <li><a class="btn btn-link" href=" {{ url('/')}}">Home</a></li>
                            <li><a class="smooth-scroll" href="#about">About</a></li>
                            <li><a class="smooth-scroll" href="#team">Team</a></li>
                            <li><a class="smooth-scroll" href="{{url('centers')}}">Centers</a></li>
                            <li><a class="btn btn-link" href="{{url('request-of-intervention')}}">Intervention</a></li>
                            <li><a class="btn btn-link" href="{{url('users')}}">Users</a></li>
                            <li><a class="smooth-scroll" href="#contact">Contact</a></li>
                            @guest
                            <li><a class="btn btn-link" href="{{ route('login')}}">Sign in</a></li>
                            @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth()->user()->name}} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('/account')}}"><i class="fa fa-fw fa-user"></i> Account</a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>



                            @endguest
                        </ul>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-nav">
                    <!-- Mobile Menu Close Button -->
                    <span id="mobile-nav-close-btn">&times;</span>

                    <div id="mobile-nav-content">
                        <ul class="nav">
                            <li><a class="btn btn-link" href=" {{ url('/')}}">Home</a></li>
                            <li><a class="smooth-scroll" href="#about">About</a></li>
                            <li><a class="smooth-scroll" href="#team">Team</a></li>
                            <li><a class="smooth-scroll" href="#services">Services</a></li>
                            <li><a class="btn btn-link" href="{{url('request-of-intervention')}}">Intervention</a></li>
                            <li><a class="btn btn-link" href="{{url('users')}}">Users</a></li>
                            <li><a class="smooth-scroll" href="#contact">Contact</a></li>
                            @guest
                            <li><a class="btn btn-link" href="{{ route('login')}}">Sign in</a></li>
                            @else




                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth()->user()->name}} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('/account')}}"><i class="fa fa-fw fa-user"></i> Account</a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
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

