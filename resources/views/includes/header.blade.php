<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg  fixed-top  white-nav-top">
        <div class="container-fluid">
            <div class="site-nav-wrapper site-nav-wrapper1 ml-auto">

                <div class="navbar-header">
                    <!-- Mobile Menu Open Button -->
                    <i id="mobile-nav-open-btn" class="fa fa-bars"></i>

                </div>

                <div class="container ">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav pull-right">
                            <!-- Logo -->
                            <li>
                                <i id="toggle-side-nav-btn" onclick="hideSideNav()"class="fa fa-bars"></i>
                            </li>
                            <li>
                                <form action="">
                                    <input type="text" class="form-control" style="display: none" id="nav-search"  name="search" placeholder="Search..">
                                </form>
                            </li>

                            <li class="nav-item dropdown" id="notification-dropdown">
                                <a class="nav-link text-light notif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i id="bell" class="fa fa-bell"></i>
                                    @if (Auth()->user()->unReadNotifications()->count()!=0)
                                    <span class="num">{{Auth()->user()->unReadNotifications()->count()}}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-1 scrollar" id="style-1">
                                    <li class="head text-light bg-dark">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12">
                                                <span id="count-nots">Notifications</span>
                                                <a href="#" onclick="markAsRead()" class="float-right text-light">Mark all as read</a>
                                            </div>
                                        </div>
                                    </li>
                                    @foreach(Auth()->user()->notifications as $notification)
                                    <li class="notification-box {{$notification->is_read?:'bg-gray'}}">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                <img src="{{($notification->user->photo) ? asset('img/users/'.Auth()->user()->photo):asset('img/users/profile-placeholder.jpg')}}" class="w-50 rounded-circle">
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8">
                                                <strong class="text-info">{{$notification->user->name}}</strong>
                                                <div>
                                                    {{$notification->content}}
													<span> <a href="{{$notification->link}}"> see more</a></span>
                                                </div>
                                                <small class="text-warning">{{$notification->created_at}}</small>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><img src="{{(Auth()->user()->photo) ? asset('img/users/'.Auth()->user()->photo):asset('img/users/profile-placeholder.jpg')}}" style="border-radius: 50%; width: 45px; height: 45px" alt=""></li>
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


                        </ul>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-nav">
                    <!-- Mobile Menu Close Button -->
                    <span id="mobile-nav-close-btn" style="margin-bottom: 0px">&times;</span>
                    <div id="mobile-nav-content">
                        <ul class="nav " style="display: flex;flex-direction: column;">
                            <li><a class="btn btn-link" href="{{url(app()->getLocale())}}">{{ __('home') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/equipments')}}">{{ __('equipments') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/centers')}}">{{ __('centers') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/'.__('request-of-intervention'))}}">{{ __('interventions') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/'. __('users'))}}">{{ __('users') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/forums')}}">{{ __('forums') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/#contact')}}">{{ __('contact') }}</a></li>
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
