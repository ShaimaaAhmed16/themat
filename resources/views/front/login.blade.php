@extends('front.app')
@section('title')
    تسجيل الدخول إلى حسابك
@endsection
<header class="header fixed-top bg-light-green">
    <div class="container pt-2">
        <div class="row">
            <div class="col-5 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-7">
                <h4 class="text-right text-white">الثمار الوطنية</h4>
            </div>
            @include('front.header')
        </div>
    </div>
</header>

@section('content')
    <section class="container text-center pt-5">
        <img src="{{asset('front/images/tt.png')}}" alt="" width="150" />
    </section>
    @if ($errors->any())
        <div class="alert alert-danger text-right">
            <ul class="">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </ul>
        </div>
    @endif
    @include('flash::message')
    <section class="signin">
        <div class="card pt-3">
            <form class="container" method="post" action="{{route('login.client')}}">
                @csrf
                <div class="form-group text-right">
                    <input id="email" type="email" class="form-control" placeholder="البريد الالكترونى" name="email"/>
                </div>
                <div class="form-group text-right">
                    <input type="password" id="password"  class="form-control" placeholder="كلمة المرور"  name="password"/>
                </div>
                <div class="text-center">
                    <button type="submit" id="myBtn" class="btn btn-block text-white bg-light-green mb-1">تسجيل الدخول</button >
                    <a href="{{route('register.client')}}" type="submit" class="btn btn-block mb-1 text-white bg-black">تسجيل حساب جديد</a>
                </div>
                <a  href="{{route('index')}}" class="btn btn-block text-white bg-light-green mt-2">  الدخول ك زائر</a>
                <a href="{{route('reset.password')}}"  class="btn text-white text-right bg-secondary">استعادة كلمة  المرور</a>
                <br />
                <hr />
                <div class="d-flex justify-content-center">
                    <a href="https://google.com">
                        <i class="fab fa-google-plus fa-2x text-danger mr-2"></i>
                    </a>
                    <a href="https://twitter.com">
                        <i class="fab fa-twitter fa-2x text-primary mr-2"></i>
                    </a>
                    <a href="https://facebook.com">
                        <i class="fab fa-facebook fa-2x text-blue mr-2"></i>
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection