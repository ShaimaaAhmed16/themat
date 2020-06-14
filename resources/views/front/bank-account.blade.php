@extends('front.app')
<header class="header card fixed-top bg-light-green">
    <div class="container pt-2 ">
        <div class="row">
            <div class="col-8">
                <h6 class="text-right text-white">الحسابات البنكية</h6>
            </div>
            <div class="col-4 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                @if(auth()->guard('client-web')->check())
                    <a href="updateinfo.html" class="user">
                        <img src="{{asset('front/images/user-icon.png')}}" alt="" width="40" class="user-icon">
                        <i class="fas fa-plus"></i>
                    </a>
                @endif
                <a href="main.html">
                    <span>الرئيسية</span>
                    <i class="fas fa-store-alt pl-2"></i>
                </a>
                <a href="{{route('about')}}">
                    <span>من نحن</span>
                    <i class="fas fa-apple-alt pl-2"></i>
                </a>
                <a href="{{route('bank')}}">
                    <span>بيانات الحسابات البنكية</span>
                    <i class="fas fa-dollar-sign pl-2"></i>
                </a>
                @if(auth()->guard('client-web')->check())
                    <a href="{{route('profile.client',auth('client-web')->user()->id)}}">
                        <span>صفحتى الشخصية </span>
                        <i class="far fa-user-circle pl-2"></i>
                    </a>
                    <a href="#">
                        <span>قائمة رغباتى </span>
                        <i class="far fa-heart pl-2"></i>
                    </a>
                    <a href="shopcart.html">
                        <span>سلة التسوق </span>
                        <i class="fas fa-shopping-basket pl-2"></i>
                    </a>
                @else
                    <a href="{{route('register.client')}}">
                        <span>تسجيل حساب جديد </span>
                        <i class="fas fa-shopping-basket pl-2"></i>
                    </a>
                    <a href="{{route('login.client')}}">
                        <span>تسجيل الدخول </span>
                        <i class="fas fa-shopping-basket pl-2"></i>
                    </a>
                @endif
                <a href="{{route('contact.client')}}">
                    <span>اتصل  بنا </span>
                    <i class="fas fa-phone-volume pl-2"></i>
                </a>
                <a href="#">
                    <span>مشاركة البيانات</span>
                    <i class="fas fa-share-alt pl-2"></i>
                </a>
                <a href="#">
                    <span>تقييم التطبيق </span>
                    <i class="fas fa-star-half-alt pl-2"></i>
                </a>
                @if(auth()->guard('client-web')->check())
                    <a href="{{route('login.client')}}">
                        <span>خروج </span>
                        <i class="fas fa-sign-out-alt pl-2"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>

</header>
@section('content')
    <section class="container text-right mt-5 about">
        <h6>الاهلى</h6>
        <h6>الراجحى</h6>
        <h6>البلاد</h6>
        <h6>الانماء</h6>
        <h6>الرياض</h6>
        <h6>سامبا</h6>
        <h6>ساب</h6>

    </section>
@endsection