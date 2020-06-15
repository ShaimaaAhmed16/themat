@extends('front.app')
@section('title')
    الثمار الوطنية
@endsection
<header class="header fixed-top bg-light-green">
    <div class="container pt-2">
        <div class="row">
            <div class="col-5 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-7 d-flex justify-content-between">
                <h4 class="text-right text-white">الصفحة الشخصية</h4>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>
</header>
@section('content')
    <section class="update container text-center">
        <div class="mt-3">
            @include('flash::message')
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{url('profile-update/'.auth()->guard('client-web')->user()->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="img-container p-5">
                            <div class="picture-container">
                                <div class="picture">
                                    @if(auth()->guard('client-web')->user()->image)
                                        <img src="{{asset(auth()->guard('client-web')->user()->image)}}" class="img-fluid" alt="">
                                    @else
                                        <img src="{{asset('public/front/images/user-icon.png')}}"  class="img-fluid" alt="">
                                    @endif
                                    <div class="picture-edit">
                                        <img src="{{asset('public/front/images/edit.png')}}" class="picture-src" id="wizardPicturePreview">
                                        <input type="file" id="wizard-picture" name="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <img src="images/user-icon.png"class="img-fluid"alt="" width="100"/> -->
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <label for="username" class="text-light-green">الاسم الاول</label>
                <input  type="text" class="form-control" id="username" placeholder="الاسم الاول"
                 value="{{auth()->guard('client-web')->user()->first_name}}"  name="first_name" />
            </div>
            <div class="form-group text-right">
                <label for="username" class="text-light-green">اسم العائله</label>
                <input  type="text" class="form-control" id="username" placeholder="اسم العائله"
                        value="{{auth()->guard('client-web')->user()->second_name}}"  name="second_name" />
            </div>
            <div class="form-group text-right">
                <label class="text-light-green">رقم الجوال</label>
                <input type="tel" class="form-control" placeholder="رقم الجوال"  value="{{auth()->guard('client-web')->user()->phone}}"  name="phone"/>
            </div>
            <div class="form-group text-right">
                <label class="text-light-green">البريد الالكترونى</label>
                <input
                        type="email"
                        class="form-control"
                        placeholder="البريد الالكترونى" name="email" value="{{auth()->guard('client-web')->user()->email}}"
                />
            </div>
            <div class="form-group text-right">
                <label class="text-light-green">العنوان</label>
                <input type="text" class="form-control" placeholder="العنوان"  name="address" value="{{auth()->guard('client-web')->user()->address}}"/>
            </div>
            <div class="form-group text-right">
                <label class="text-light-green">كلمة المرور</label>
                <input
                        type="password"
                        class="form-control"
                        placeholder="اتركها فارغة ان لم تريد تغييرها"
                />
            </div>

            <button type="submit" class="btn btn-block text-white">تحديث</button>
        </form>
    </section>
@endsection