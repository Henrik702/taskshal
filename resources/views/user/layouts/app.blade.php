<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600;700;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/datepicker.min.css')}}">


    <script src="{{asset('user/js/jquery.min.js')}}"></script>
    <script src="{{asset('user/js/popper.min.js')}}"></script>
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user/js/slick.min.js')}}"></script>


</head>
<body
    @if(Request::segment(1) != 'login' && Request::segment(1) != 'register'  )
        id="body"
        @else
        class="login"

        @endif
>

@if((Request::segment(1) != 'login' || Request::segment(1) != null) && Request::segment(1) != 'register'  )
    @include('user.layouts.nav')
@endif

@yield('content')

@if((Request::segment(1) != 'login' || Request::segment(1) != null) && Request::segment(1) != 'register'  )
    @include('user.layouts.footer')
@endif

<script src="{{asset('user/js/datepicker.min.js')}}"></script>
<script src="{{asset('user/js/main.js')}}"></script>

</body>
</html>
