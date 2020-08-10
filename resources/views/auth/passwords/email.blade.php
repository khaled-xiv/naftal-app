<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    <title>{{__('Reset Password')}}</title>
    <!-- Custom Styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/toast/jquery.toast.css')}}" rel="stylesheet">
</head>
<body>
<style>
    .jq-toast-single{
        font-size: 20px;
        line-height: 35px;
    }
    .close-jq-toast-single{
        font-size: 20px;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
    .jq-toast-wrap{
        left: 0 !important;
        top:0px;
        width: 100%;
        height: 60px;
    }
</style>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 wrap-login100_1" >
            <form class="login100-form" style="padding: 130px 55px 0 55px" method="POST" action="{{ route('password.email') }}">
                @csrf
                <input type="hidden" name="language" value="{{ app()->getLocale() }}">
                <span class="login100-form-title_1" >
                        {{__('Reset Password')}}
                </span>

                <div class="wrap-input100" style="margin-bottom: 16px" >
                    <input class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{__('email address')}}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

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

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/toast/jquery.toast.min.js') }}"></script>
<script !src="">
    @if (Session::has('status'))
    $.toast({

        text : "{{Session::get('status')}}",
        showHideTransition : 'slide',
        bgColor : 'green',
        textColor : '#eee',
        allowToastClose : true,
        hideAfter : 3000,
        stack : 5,
        textAlign : 'center',
        position : 'bottom-center',
        width:"100%"
    })
    @endif
    @if (Session::has('error'))
    $.toast({

        text : "{{Session::get('error')}}",
        showHideTransition : 'slide',
        bgColor : '#CA0B00',
        textColor : '#eee',
        allowToastClose : true,
        hideAfter : 3000,
        stack : 5,
        textAlign : 'center',
        position : 'bottom-center',
        width:"100%"
    })
    @endif



</script>
</body>


</html>
