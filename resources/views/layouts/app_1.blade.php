<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>@yield('title')</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="65" >

<!-- Header-->
@include('includes.header')
<!-- Header Ends-->

@yield('content')

<!-- Footer-->
<footer class="text-center">
    @include('includes.footer')

<!--             Back To Top-->
    <a href="#home" id="back-to-top" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="home" role="button">
        <i class="fa fa-angle-up"></i>
    </a>

</footer>
<!-- Footer Ends-->

</body>
<!-- Jquery -->
<script src="{{ asset('js/jquery.min.js') }}" defer></script>

<!--    Bootstrap-->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>

<!--    Easing-->
<script src="{{asset('js/easing/jquery.easing.1.3.min.js')}}"></script>

<!-- WOW JS -->
<script src="{{asset('js/wow/wow.min.js')}}"></script>

<!--    Custom Script-->
<script src="{{ asset('js/script_1.js') }}" defer></script>

</html>
