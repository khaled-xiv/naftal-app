<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
            <span class="left" >
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if($localeCode !=app()->getLocale())
                        <a  hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img src="{{asset('flags/'.$localeCode.'.svg')}}" style="height: 20px ;width: 25px" alt="{{$localeCode}}">
                        </a>
                    @endif
                @endforeach
            </span>
                <span class="centerd">
                    Copyright &copy; 2020 All Rights Reserved By
                </span>

                   <span id="naftal_inc" >Naftal Inc.</span>
            </p>

        </div>
    </div>
</div>
