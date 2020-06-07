<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>@yield('title')</title>
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="65">

<!-- Header-->
@include('includes.header')
<!-- Header Ends-->
@yield('content')

</body>

<!--    Bootstrap-->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>


<!--    owl-carousel-->
<script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}" ></script>

<!-- Responsive Tabs JS -->
<script src="{{asset('js/responsive-tabs/jquery.responsiveTabs.min.js')}}"></script>

<!--    Easing-->
<script src="{{asset('js/easing/jquery.easing.1.3.min.js')}}"></script>

<!-- WOW JS -->
<script src="{{asset('js/wow/wow.min.js')}}"></script>

<!--    Custom Script-->
<script src="{{ asset('js/script_1.js') }}" defer></script>

<script !src="">
    /* =========================================
               Responsive Tabs
============================================ */
    $(function () {

        $("#services-tabs").responsiveTabs({
            animation: 'slide'
        });

    });

</script>

</html>
