<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>{{ __('Sign In') }}</title>
    <!-- Custom Styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>


<div class="limiter" >
    <div class="container-login100">
        <div class="wrap-login100" >
            <form class="login100-form" style="padding:178px 55px 0 55px" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
                        @lang('Sign In')
                </span>
                <div class="wrap-input100" style="margin-bottom: 16px">
                    <input class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="email"
                           placeholder="{{ __('email address') }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="wrap-input100  input-group">
                    <input class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Password') }}" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="text-right" style="padding: 13px 0 23px 0 ">
                    @if(Config::get('app.locale')=='en')
						<span class="txt1">
							{{ __('Forgot') }}
						</span>

                        <a href="{{route('password.request')}}" class="txt2">
                            {{ __('Email / Password?') }}
                        </a>
                    @else
                        <a href="{{route('password.request')}}" class="txt2">
                            {{ __('Email / Password?') }}
                        </a>
                        <span class="txt1">
							{{ __('Forgot') }}
						</span>

                    @endif
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        {{ __('Sign In') }}
                    </button>
                </div>

                <div class="go_back">
                    <a href="{{route('home')}}" id="back"><i class="fa fa-arrow-left"> {{ __('Go Back') }}</i></a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
