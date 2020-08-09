@extends('layouts.base')
@section('title', __('Verify Email Address'))
@section('content')

<section id="verify">

    <div class="content-box-md">
        <div class="container">

            <div class="row">

                <div class="col-md-8 col-sm-12 wow slideInLeft">

                    <div class="vertical-heading">

                        <h2>{{__('Verify your email address')}}</h2>


                        <h4>{{__('Before proceeding, please check your email for a verification link.')}}</h4>

                        <h4>    {{ __('If you did not receive the email') }},</h4>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline verify_link">{{ __('click here to request another') }}</button>.
                        </form>
                        <br><br><br><br><br><br><br><br>
                    </div>

                </div>


            </div>

        </div>
    </div>


</section>

<script>

    @if (Session::has('resent'))

    toastr.success("{{__('A fresh verification link has been sent to your email address.')}}");
    @endif
    @if (Session::has('error'))
    toastr.error("{{Session::get('error')}}");
    @endif


</script>

@endsection
