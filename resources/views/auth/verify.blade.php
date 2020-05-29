@extends('layouts.without_footer')
@section('title', 'Verify email ')
@section('content')

<section id="testimonials">

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6 wow slideInLeft">

                <div class="vertical-heading">

                    <h2>Verify Your<br><strong>Email</strong> Address</h2>

                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        <h4>A fresh verification link has been sent to your email address.'</h4>
                    </div>
                    @endif

                    <h3>{{__('Before proceeding, please check your email for a verification link.')}}</h3>
                    <h3>Before proceeding, please check your email  <span style="color: #f4c613;">{{Auth()->user()->email}}</span> for verification link
                        {{ __('If you did not receive the email') }},</h3>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend',app()->getLocale()) }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline verify_link">{{ __('click here to request another') }}</button>.
                    </form>
                    <br><br><br><br><br><br><br><br>
                </div>

            </div>


        </div>

    </div>

</section>

@endsection
