@extends('front.app')
@section('title')
    سياسه الاستخدام
@endsection
<header class="header fixed-top bg-light-green">
    <div class="container pt-2 ">
        <div class="row">
            <div class="col-5 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-7 d-flex justify-content-between">
                <h4 class="text-right text-white">
                    @if($policy)
                        <p>{{$policy->name}}</p>
                    @else
                    سياسه الاستخدام
                    @endif
                </h4>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>

</header>
@section('content')
    <section class="container text-right mt-5 about">
        <br>
        <br>
        @if($policy)
            <p>{{$policy->text}}</p>
    @else
        <div class="alert alert-danger" role="alert">
            لا يوجد بيانات
        </div>
    @endif
    </section>
    @endsection