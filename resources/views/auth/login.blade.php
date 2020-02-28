<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>Sign In</title>
    <!-- Custom Styles -->
    <link href="{{asset('css/util.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('login') }}">
                @csrf

                <span class="login100-form-title">
                        Sign In
                </span>

                <div class="wrap-input100  m-b-16">
                    <input class="input100" type="email" name="email" value="{{ old('email') }}" autocomplete="email"
                           placeholder="Email Address" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="wrap-input100  input-group">
                    <input class="input100" type="password" name="password" placeholder="Password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

                    <a href="{{ route('password.request') }}" class="txt2">
                        Email / Password?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign in
                    </button>
                </div>

                <div class="go_back">
                    <a href="/" id="back"><i class="fa fa-arrow-left"> Go Back</i></a>

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
