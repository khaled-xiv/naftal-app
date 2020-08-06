<div class="side-nav">
	<div class="side-nav-item">
        <a href="{{url(app()->getLocale())}}"><i class="fa fa-home"></i>
            {{ __('home') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/dashboard')}}"><i class="fa fa-dashboard"></i>
            {{ __('dashboard') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/centers')}}"><i class="fa fa-building-o"></i>
            {{ __('centers') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/'. __('users'))}}"><i class="fa fa-users"></i>
            {{ __('users') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/'.__('equipments'))}}"><i class="fa fa-gears"></i>
            {{ __('equipments') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/'.__('request-of-intervention'))}}"><i class="fa fa-home"></i>
            {{ __('interventions') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/forums')}}"><i class="fa fa-newspaper-o"></i>
            {{ __('forums') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/#contact')}}"><i class="fa fa-envelope-o"></i>
            {{ __('contact') }}
        </a>
    </div>

    <div class="side-nav-item">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if($localeCode !=app()->getLocale())
            <a  hreflang="{{ $localeCode }}"
                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                <img src="{{asset('flags/'.$localeCode.'.svg')}}" style="height: 20px ;width: 25px" alt="{{$localeCode}}">
            </a>
        @endif
    @endforeach
    </div>



</div>

