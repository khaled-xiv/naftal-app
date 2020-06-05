<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>{{__('Reset Password')}}</title>
    <!-- Custom Styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 wrap-login100_1" >
            <form class="login100-form" style="padding: 130px 55px 0 55px" method="POST" action="{{ route('password.email') }}">
                @csrf
                <input type="hidden" name="language" value="{{ app()->getLocale() }}">
                <span class="login100-form-title_1" >
                        {{__('Reset Password')}}
                </span>

                @if (session('status'))
                <div class="alert alert-success " role="alert">
                    {{ session('status') }}
                </div>
                @else

                <div class="wrap-input100" style="margin-bottom: 16px" >
                    <input class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{__('email address')}}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                @endif
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        {{__('Reset')}}
                    </button>
                </div>

                <div class="go_back">
                    <a href="{{route('login')}}" id="back"><i class="fa fa-arrow-left">  Go Back</i></a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
