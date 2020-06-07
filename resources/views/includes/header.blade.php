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
                            <li><a class="btn btn-link" href="{{route('home')}}">{{ __('home') }}</a></li>
                            <li><a class="btn btn-link" href="{{LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.equipments')}}">{{ __('equipments') }}</a></li>
                            <li><a class="btn btn-link" href="{{LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.centers')}}">{{ __('centers') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/'.__('request-of-intervention'))}}">{{ __('interventions') }}</a></li>
                            <li><a class="btn btn-link" href="{{route('users.show')}}">{{ __('users') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/forums')}}">{{ __('forums') }}</a></li>
                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/#contact')}}">{{ __('contact') }}</a></li>
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="nav-item">
                                    <a class="nav-link btn btn-link" rel="alternate" hreflang="{{ $localeCode }}"
                                       @if (app()->getLocale() == $localeCode) style=" font-weight: bold; text-decoration: underline" @endif
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
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
{{--                <div id="mobile-nav">--}}
{{--                    <!-- Mobile Menu Close Button -->--}}
{{--                    <span id="mobile-nav-close-btn" style="margin-bottom: 0px">&times;</span>--}}

{{--                    <div id="mobile-nav-content">--}}
{{--                        <ul class="nav " style="display: flex;flex-direction: column;">--}}
{{--                            <li><a class="btn btn-link" href="{{url(app()->getLocale())}}">{{ __('home') }}</a></li>--}}
{{--                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/equipments')}}">{{ __('equipments') }}</a></li>--}}
{{--                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/centers')}}">{{ __('centers') }}</a></li>--}}
{{--                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/'.__('request-of-intervention'))}}">{{ __('interventions') }}</a></li>--}}
{{--                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/'. __('users'))}}">{{ __('users') }}</a></li>--}}
{{--                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/forums')}}">{{ __('forums') }}</a></li>--}}
{{--                            <li><a class="btn btn-link" href="{{url(app()->getLocale().'/#contact')}}">{{ __('contact') }}</a></li>--}}
{{--                            @foreach (config('app.alt_langs') as $locale)--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link btn btn-link"--}}
{{--                                       href="{{ url($locale.'/changeLang') }}"--}}
{{--                                       @if (app()->getLocale() == $locale) style=" font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                            @guest--}}
{{--                                <li><a class="btn btn-link" href="{{url(app()->getLocale().'/'.__('login'))}}">{{ __('Sign In') }}</a></li>--}}
{{--                            @else--}}
{{--                                <li class="nav-item dropdown">--}}
{{--                                    <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        {{Auth()->user()->name}}--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">--}}
{{--                                        <a class="dropdown-item" href="{{route('account.show',['language'=>app()->getLocale(),'account'=>__('account')])}}"><i class="fa fa-fw fa-user ml-auto"></i> {{ __('Account') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>--}}
{{--                                        <div class="dropdown-divider"></div>--}}
{{--                                        <a class="dropdown-item" href="{{url(app()->getLocale().'/#contact')}}"><i class="fa fa-fw fa-power-off ml-auto"></i> {{ __('Log Out') }} &nbsp;&nbsp;  </a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endguest--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </nav>
</header>
<!-- Header Ends -->

