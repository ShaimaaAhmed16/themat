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
                <h5 class="text-white">صفحتى الشخصية</h5>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>
</header>
@section('content')

    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            @if($row->status)
                <label>حالة الحساب :1</label>
                <label class="text-primary">فعال</label>
            @else
                <label>حالة الحساب :0</label>
                <label class="text-primary">منتظر</label>
            @endif

        </div>
    </div>
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
    <section class="container account">

        <div class="card p-4 mr-2 ml-2">
            <div class="text-center">
                @if($row->image)
                    <img src="{{asset($row->image)}} " alt="" width="50">
                @else
                    <img src="{{asset('front/images/user-icon.png')}}" alt="" width="50">
                @endif
            </div>
            <div class="card-body text-center">
                <small>{{$row->first_name}} {{$row->second_name}}</small>
                <a href="{{route('profile.client',$row->id)}}">
                    <i class="fas fa-pencil-alt text-dark"></i>
                </a>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 mb-2 text-right">
                <span>الاسم</span><br />
                <small>u{{$row->first_name}} {{$row->second_name}}</small>
            </div>
            <div class="col-12 mb-2">
                <a href="#" class="text-black"></a>
            </div>
            <div class="col-12 mb-2 text-right">
                <span>البريد الالكترونى</span><br />
                <small>{{$row->email}}</small>
            </div>
            <div class="col-12 mb-2">
                <a href="#" class="text-black"></a>
            </div>
            <div class="col-12 mb-2 text-right">
                <span>رقم الجوال</span>
                <small>{{$row->phone}}</small>
            </div>
            <div class="col-12 mb-2">
                <a href="#" class="text-black"></a>
            </div>
            <div class="col-12 mb-2 text-right">
                <span>العنوان</span>
                <small>{{$row->address}}</small>
            </div>
        </div>
        <div class="card p-2 mr-2 ml-2">
            <div class="row">
                <div class="col-6 text-right">
                    <small>
                        عدد الطلبات
                        <i class="fas fa-shopping-bag ml-2"></i>
                    </small>
                </div>
                <div class="col-6">
                    <a href="{{route('myorder')}}" class="text-dark">
                        <i class="fas fa-angle-double-left"></i>
                        <label>
                            {{count($orders)}}
                        </label>
                    </a>

                </div>
            </div>
        </div>
    </section>
@endsection