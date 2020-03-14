<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>Sign In</title>
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
                        Sign In
                </span>
                <div class="wrap-input100" style="margin-bottom: 16px">
                    <input class="input100" type="email" name="email" value="{{ old('email') }}" autocomplete="email"
                           placeholder="Email Address" required>
                    <span class="focus-input100"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="wrap-input100  input-group">
                    <input class="input100" type="password" name="password" placeholder="Password" required>
                    <span class="focus-input100"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="text-right" style="padding: 13px 0 23px 0 ">
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

</body>
</html>
