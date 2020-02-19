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
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('login') }}">
                @csrf
                @if($errors->any())
                <span class="alert alert_1  alert alert-danger">
                    {{ $errors->first() }}
                </span>
                @else
                <span class="login100-form-title">
                        Sign In
                </span>
                @endif


                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                    <input class="input100" type="email" name="email" placeholder="Email" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                    <input class="input100" type="password" name="password" placeholder="Password" required>

                    <span class="focus-input100"></span>
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
                    <a href="/" id="back"><i class="fa fa-arrow-left">  Go Back</i></a>

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
