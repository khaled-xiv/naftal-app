<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>Reset password</title>
    <!-- Custom Styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 wrap-login100_2">
            <form class="login100-form" style="padding: 135px 55px 0 55px" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <span class=" login100-form-title_1">
                        Reset password
                </span>

                <div class="wrap-input100"  style="margin-bottom: 16px">
                    <input class="input100" type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="E-Mail Address" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="wrap-input100" style="margin-bottom: 16px">
                    <input class="input100" type="password"  placeholder="Password"  name="password" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="wrap-input100" style="margin-bottom: 16px">
                    <input class="input100" type="password"  placeholder="Confirm Password"  name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Reset Password
                    </button>
                </div>

                <div class="go_back">
                    <a href="{{route ('login')}}" id="back"><i class="fa fa-arrow-left">  Go Back</i></a>

                </div>


            </form>
        </div>
    </div>
</div>

</body>
</html>
