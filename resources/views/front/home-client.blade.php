<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/front/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/app.css')}}">
    <title>{{trans('lang.national_fruits_grandfather')}}</title>
</head>
<body class="intro">

<section class="container text-center pt-5">
    <img src="{{asset('public/front/images/tt.png')}}" alt="" class="img-fluid" style="width: 400px;"/>
    <h1 class="text-light-green">{{trans('lang.national_fruits')}}</h1>
    <div class="btn-group mt-4" role="group" aria-label="Basic example">
        <a rel="alternate" class="btn {{ app()->isLocale('ar') ? 'active' : '' }}" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', 'login', [], true) }}">
            عربى
        </a>
        <a rel="alternate" class="btn {{ app()->isLocale('en') ? 'active' : '' }}" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', 'login', [], true) }}">
            English
        </a>

        {{--<a href="{{route('login.client')}}" type="button" class="btn active">عربى</a>--}}
        {{--<a href="{{route('login.client')}}" type="button" class="btn">English</a>--}}
    </div>
</section>


<script src="{{asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/front/js/main.js')}}"></script>
</body>
</html>