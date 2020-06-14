@extends('front.app')
@section('title')
    الثمار الوطنية
@endsection
<header class="header fixed-top bg-light-green">
    <div class="container pt-2 ">
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
<div class="container text-right mt-5 fillter">
    <div>
        <a href="{{ route('main', ['sort'=>' num_of_orders']) }}" class="text-black">الاكثر طلبا</a>

        <hr>
    </div>
    <div>
        <a  href="{{ route('main', ['sort'=>' num_of_views']) }}" class="text-black">الاعلى مشاهدة</a>
        <hr>
    </div>

    <div>
        <a href="{{ route('main', ['sort'=>'high_low']) }}" class="text-black">السعر الاكثر فالاقل</a>
        <hr>
    </div>
    <div>
        <a href="{{ route('main', ['sort'=>'low_high']) }}" class="text-black">السعر الاقل فالاكثر</a>
        <hr>
    </div>



</div>
@endsection