<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>Recover password</title>
    <!-- Custom Styles -->
    <link href="{{asset('css/util.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 wrap-login100_1">
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('password.email') }}">
                @csrf

                @if($errors->any())
                <span class="alert alert_1  alert alert-danger">
                    {{ $errors->first() }}
                </span>
                @else
                <span class=" login100-form-title_1">
                        Recover password
                </span>
                @endif

                @if (session('status'))
                <div class="alert alert-success " role="alert">
                    {{ session('status') }}
                </div>
                @else


                <div class="wrap-input100  validate-input m-b-16" data-validate="Please enter username">
                    <input class="input100" type="email" name="email" placeholder="Email" required>
                    <span class="focus-input100"></span>
                </div>

                @endif
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Recover Password
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
