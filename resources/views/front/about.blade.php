@extends('front.app')
@section('title')
    من نحن
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
                <h4 class="text-right text-white">من نحن</h4>
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
        @if($about)
            <p>{{$about->text}}</p>  </section>
    @else
        <div class="alert alert-danger" role="alert">
            لا يوجد بيانات
        </div>
    @endif
        @endif
    @endsection