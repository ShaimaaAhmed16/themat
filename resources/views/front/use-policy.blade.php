@extends('front.app')
@section('title')
    {{trans('lang.use_policy')}}
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
                    @if(count($policies) >0)
                        @foreach ($policies as $policy)
                            @if(($policy->getTranslation('ar')->name =='الشروط والاحكام') || ($policy->getTranslation('ar')->name =='سياسه الاستخدام'))
                                <p>{{$policy->getTranslation('ar')->name}}</p>
                            @endif
                        @endforeach
                    @else
                        {{trans('lang.use_policy')}}
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
    <section class="container {{app()->isLocale('ar')?'text-right':'text-left' }} mt-5 about">
        <br>
        <br>
        @if(count($policies) >0)
            @foreach ($policies as $policy)
                @if(($policy->getTranslation('ar')->name =='الشروط والاحكام') || ($policy->getTranslation('ar')->name =='سياسه الاستخدام'))
                    <p>{{$policy->getTranslation()->text}}</p>
                @endif
            @endforeach
        @else
            <div class="alert alert-danger" role="alert">
                {{trans('lang.There_are_no_data')}}
            </div>
        @endif
    </section>
@endsection