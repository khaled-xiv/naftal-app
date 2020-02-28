<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>Reset password</title>
    <!-- Custom Styles -->
    <link href="{{asset('css/util.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 wrap-login100_2">
            <form class="login100-form  p-l-55 p-r-55 p-t-135" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <span class=" login100-form-title_1">
                        Reset password
                </span>

                <div class="wrap-input100   m-b-16" >
                    <input class="input100" type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="E-Mail Address" required autocomplete="email" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="wrap-input100   m-b-16" >
                    <input class="input100" type="password"  placeholder="Password"  name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="wrap-input100   m-b-16" data-validate="Please enter username">
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


<!--===============================================================================================-->
<!-- Jquery -->
<script src="{{ asset('js/jquery.min.js') }}" defer></script>

<!--    Bootstrap-->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" defer></script>

</body>
</html>
