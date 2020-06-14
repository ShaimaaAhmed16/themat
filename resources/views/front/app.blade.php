<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/jquery.nice-number.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/hover.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>

@yield('content')

@include('front.nave')

<script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('front/js/jquery.nice-number.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('front/js/main.js')}}"></script>
</body>
</html>