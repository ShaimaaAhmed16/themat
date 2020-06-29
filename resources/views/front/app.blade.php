<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/front/css/jquery.nice-number.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/hover.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
{{--<body style="direction: {{ app()->isLocal('ar') ? 'ltr' : 'rtl' }}">--}}

@yield('content')

@include('front.nave')

<script src="{{asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/front/js/jquery.nice-number.js')}}"></script>
<script src="{{asset('public/front/js/bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('public/front/js/main.js')}}"></script>
@yield('scripts')
</body>
</html>