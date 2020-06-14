@extends('front.app')
@section('title')
    اتصل بنا
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
                <h4 class="text-right text-white">اتصل بنا</h4>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>

</header>
@section('content')
<section class="contact container">
    @if(count($rows)>0)
        @foreach($rows as $row)
            <div class="card text-right pr-4">
        <div class="row">
            <div class="col-12">
                <i class="fas fa-globe text-light-green ml-2"></i>
                <small>{{$row->country}} - {{$row->city}}</small>
            </div>
            <div class="col-12">
                <i class="fas fa-mobile text-light-green ml-2"></i>
                <small>{{$row->phone}}</small>
            </div>
            <div class="col-12">
                <i class="fab fa-whatsapp text-light-green ml-2"></i>
                <small>{{$row-> watsUp}}</small>
            </div>
            <div class="col-12">
                <i class="fas fa-envelope text-light-green ml-2"></i>
                <small>{{$row->email}}</small>
            </div>
        </div>
    </div>
        @endforeach
    @endif
    <form method="post" action="{{route('contact.client')}}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger text-right ">
                <ul class="">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group text-right">

            <input type="text" class="form-control" placeholder="الاسم" name="name">
        </div>
        <div class="form-group text-right">

            <input type="tel" class="form-control"placeholder="رقم الجوال" name="phone">
        </div>
        <div class="form-group text-right">

            <input type="email" class="form-control" placeholder="البريد الالكتروني" name="email">
        </div>
        <div class="form-group text-right">
            <textarea class="form-control" placeholder="نص الرسالة" name="message"></textarea>
        </div>

        <button type="submit" class="btn btn-block text-white">ارسال</button>
    </form>
</section>
@endsection
