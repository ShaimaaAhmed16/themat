@extends('front.app')
@section('title')
    {{trans('lang.national_fruits')}}
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
                <h4 class="text-right text-white">{{trans('lang.national_fruits')}}</h4>
            </div>
            @include('front.header')
        </div>
    </div>

</header>
@section('content')

<div class="container mt-5 fillter {{app()->isLocale('ar')?'text-right':'text-left' }}" >
    <div class="text-center">
        @include('flash::message')
    </div> <br>
    <div >
        <a href="{{ route('search', ['sort'=>' num_of_orders']) }}" class="text-black">{{trans('lang.the_most_wanted')}}</a>

        <hr>
    </div>
    <div>
        <a  href="{{ route('search', ['sort'=>' num_of_views']) }}" class="text-black">{{trans('lang.Most_viewed')}}</a>
        <hr>
    </div>

    <div>
        <a href="{{ route('search', ['sort'=>'high_low']) }}" class="text-black">{{trans('lang.The_price_is_more_and_less')}}</a>
        <hr>
    </div>
    <div>
        <a href="{{ route('search', ['sort'=>'low_high']) }}" class="text-black">{{trans('lang.The_price_is_lower_and_more')}}</a>
        <hr>
    </div>



</div>
@endsection