@extends('layouts.base')
@section('title', __('Verify Email Address'))
@section('content')

    <section id="verify">

        <style>

        </style>
        <div class="content-box-md">
            <div class="container">

                <button onclick="show()">click</button>

            </div>
        </div>


    </section>

    <script>

        function show(){
            $.toast({

                text : "Let's test some HTML stuff... <a href='#'>github</a>",
                showHideTransition : 'slide',  // It can be plain, fade or slide
                bgColor : 'green',              // Background color for toast
                textColor : '#eee',            // text color
                allowToastClose : true,       // Show the close button or not
                hideAfter : 1000000,              // `false` to make it sticky or time in miliseconds to hide after
                stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                textAlign : 'center',            // Alignment of text i.e. left, right, center
                position : 'bottom-center',
                width:"100%"
            })

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-full-width",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "100000",
                "extendedTimeOut": "100000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success("{{__('A fresh verification link has been sent to your email address.')}}");
        }

        @if (Session::has('resent'))

        toastr.success("{{__('A fresh verification link has been sent to your email address.')}}");

        @endif
        @if (Session::has('error'))
        toastr.error("{{Session::get('error')}}");
        @endif


    </script>

@endsection
