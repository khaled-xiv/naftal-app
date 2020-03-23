<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="shortcut icon" src="{{ asset ('favicon.ico')}}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- Fontawesome -->
<link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

<!-- Bootstrap CSS -->
<link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" >
<link href="{{ asset('css/bootstrap/bootstrap-select.css') }}" rel="stylesheet" >

<!-- Animate Css -->
<link href="{{asset('css/animate/animate.min.css')}}" rel="stylesheet">

<!-- Custom Styles -->
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link href="{{asset('css/style_1.css')}}" rel="stylesheet">

<!-- Responsive  Css -->
<link href="{{asset('css/responsive.css')}}" rel="stylesheet">

{{--jquery--}}
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap-select.min.js') }}"></script>
