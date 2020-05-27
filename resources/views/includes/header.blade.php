<!-- Header -->
<header>
        <nav class="navbar navbar-expand-lg  fixed-top  white-nav-top">
        <div class="container-fluid">
            <div class="site-nav-wrapper ml-auto">

                <div class="navbar-header">
                    <!-- Mobile Menu Open Button -->
                    <span id="mobile-nav-open-btn">&#9776;</span>
                </div>

                <!-- Main Menu -->
                <div class="container ">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav pull-right">
                            <li><a class="btn btn-link" href=" {{ url('/')}}">{{ __('Home') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('equipments')}}">{{ __('Equipments') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('centers')}}">{{ __('Centers') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('request-of-intervention')}}">{{ __('Interventions') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('users')}}">{{ __('Users') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('forums')}}">{{ __('Forums') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('/#contact')}}">{{ __('Contact') }}</a></li>
                            @guest
                            <li><a class="btn btn-link" href="{{ route('login',app()->getLocale())}}">{{ __('Sign In') }}</a></li>
                            @else

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle center-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{Auth()->user()->name}}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{url('/account')}}"><i class="fa fa-fw fa-user ml-auto"></i> {{ __('Account') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('logout',app()->getLocale())}}"><i class="fa fa-fw fa-power-off ml-auto"></i> {{ __('Log Out') }} &nbsp;&nbsp;  </a>
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
                            <li><a class="btn btn-link" href=" {{ url('/')}}">{{ __('Home') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('equipments')}}">{{ __('Equipments') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('centers')}}">{{ __('Centers') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('request-of-intervention')}}">{{ __('Interventions') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('users')}}">{{ __('Users') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('forums')}}">{{ __('Forums') }}</a></li>
                            <li><a class="btn btn-link" href="{{url('/#contact')}}">{{ __('Contact') }}</a></li>
                            @guest
                                <li><a class="btn btn-link" href="{{ route('login',app()->getLocale())}}">{{ __('Sign In') }}</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        {{Auth()->user()->name}}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{url('/account')}}"><i class="fa fa-fw fa-user ml-auto"></i> {{ __('Account') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('logout',app()->getLocale())}}"><i class="fa fa-fw fa-power-off ml-auto"></i> {{ __('Log Out') }} &nbsp;&nbsp;  </a>
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

