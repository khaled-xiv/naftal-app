<div class="side-nav">
	<div class="side-nav-item">
        <a href="{{url(app()->getLocale())}}"><i class="fa fa-home"></i>
            {{ ucwords(__('home')) }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/'.__('dashboard1'))}}"><i class="fa fa-dashboard"></i>
            {{__('Dashboard') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/'.__('centers'))}}"><i class="fa fa-building-o"></i>
            {{ ucwords(__('centers')) }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/'. __('users'))}}"><i class="fa fa-users"></i>
            {{ ucwords(__('users')) }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/'.__('equipments'))}}"><i class="fa fa-gears"></i>
            {{ ucwords(__('equipments')) }}
        </a>
    </div>

    <div class="side-nav-item">
        <a  href="{{url(app()->getLocale().'/'.__('request-of-intervention'))}}"><i class="fa fa-home"></i>
            {{ __('Request of intervention') }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/forums')}}"><i class="fa fa-newspaper-o"></i>
            {{ ucwords(__('forums')) }}
        </a>
    </div>

    <div class="side-nav-item">
        <a href="{{url(app()->getLocale().'/#contact')}}"><i class="fa fa-envelope-o"></i>
            {{ ucwords(__('contact')) }}
        </a>
    </div>

    <div id="side-nav-item-lang" class="side-nav-item">
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

