<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/front/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/app.css')}}">
    <title>{{trans('lang.national_fruits')}}</title>
</head>
<body>
<section class="container text-center pt-3">
    <img src="{{asset('public/front/images/tt.png')}}" class="img-fluid" alt="" width="350">
</section>

<section class="signin">
    @if ($errors->any())
        <div class="alert alert-danger text-right">
            <ul class="">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </ul>
        </div>
    @endif
        @if(Session::has('error'))
            <div class="row mr-2 ml-2" >
                <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                        id="type-error">{{Session::get('error')}}
                </button>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="row mr-2 ml-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{Session::get('success')}}
                </button>
            </div>
        @endif
    @include('flash::message')
    <div class="card pt-3">
        <div class="container">
            <form action="{{route('activation')}}" method="POST">
                @csrf
                <div class="form-group text-center m-auto">

                    <input type="text" class="form-control" placeholder=" {{trans('lang.Pass_code')}} " name="pin_code">
                </div><br>
                <div class="text-center w-50 m-auto ">
                    <button  type="submit" class="btn text-white btn-block text-center bg-light-green"> {{trans('lang.continue')}} </button>

                </div>
            </form>
            <form action="{{ route('activation') }}" method="POST">
                <div class="mb-3 text-center w-50 m-auto">
                    @csrf
                    <input type="hidden" name="pin_code" value="1234">
                    <button  type="submit" class="btn text-white btn-block text-center bg-light-green"> {{trans('lang.resend')}} </button>
                </div>
            </form>

            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{route('login.client')}}" type="submit" class="btn text-white btn-block bg-secondary mb-1 mr-1 ml-1"> {{trans('lang.login')}}</a>
                </div>
                <div>
                    <a href="{{route('register.client')}}" type="submit" class="btn mb-1 btn-block text-white bg-secondary mr-1 ml-1">{{trans('lang.register')}}</a>
                </div>
            </div>

        </div>

    </div>
</section>

{{--<section class="signin">--}}
    {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger text-right">--}}
            {{--<ul class="">--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--{{ $error }}<br>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--@include('flash::message')--}}
    {{--<div class="card pt-3">--}}
        {{--<form id="checkCodeForm" class="container" action="{{route('check.code')}}" method="POST">--}}
            {{--@csrf--}}
            {{--<div class="form-group text-right">--}}
                {{--<input type="text" class="form-control" placeholder=" كود المرور " name="pin_code">--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<div class="mb-3 text-center">--}}
            {{--<button type="submit" form="checkCodeForm" class="btn text-white text-center bg-light-green mr-5"> متابعة </button>--}}
            {{--<form action="{{ route('send.code') }}" method="POST">--}}
                {{--@csrf--}}
                {{--<input type="hidden" name="phone" value="{{ request()->phone }}">--}}
                {{--<button type="submit" class="btn text-white text-center bg-light-green ml-5"> إعادة إرسال </button>--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--<div class="d-flex justify-content-around">--}}
            {{--<a href="{{route('login.client')}}" type="submit" class="btn text-white bg-secondary mb-1"> الدخول</a>--}}
            {{--<a href="{{route('register.client')}}" class="btn mb-1 text-white bg-secondary">تسجيل حساب جديد</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

    <script src="{{asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/front/js/main.js')}}"></script>
    </body>
    </html>