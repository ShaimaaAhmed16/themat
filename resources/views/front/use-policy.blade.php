@extends('front.app')
@section('title')
    سياسه الاستخدام
@endsection
<header class="header fixed-top bg-light-green">
    <div class="container pt-2 ">
        <div class="row">
            <div class="col-4 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
<<<<<<< HEAD
            <div class="col-7 d-flex justify-content-between">
                <h4 class="text-right text-white">
                    @if(count($policies) >0)
                        @foreach ($policies as $policy)
                            @if(($policy->getTranslation('ar')->name =='الشروط والاحكام') || ($policy->getTranslation('ar')->name =='سياسه الاستخدام'))
                                <p>{{$policy->getTranslation('ar')->name}}</p>
                            @endif
                        @endforeach
=======
            <div class="col-8 d-flex justify-content-between">
                <h5 class="text-right text-white">
                    @if($policy)
                        <p>{{$policy->name}}</p>
>>>>>>> 0fb5e22da4937ec1de123a5135a10e24c5a457a9
                    @else
                    سياسه الاستخدام
                    @endif
                </h5>
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
        @if(count($policies) >0)
            @foreach ($policies as $policy)
                @if(($policy->getTranslation('ar')->name =='الشروط والاحكام') || ($policy->getTranslation('ar')->name =='سياسه الاستخدام'))
                    <p>{{$policy->getTranslation('ar')->text}}</p>
                @endif
            @endforeach
        @else
        <div class="alert alert-danger" role="alert">
            لا يوجد بيانات
        </div>
    @endif
    </section>
    @endsection