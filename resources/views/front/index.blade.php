@extends('front.app')
@section('title')
    {{trans('lang.national_fruits')}}
@endsection
<header class="header fixed-top bg-light-green" >
{{--<header class="header fixed-top bg-light-green" style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }}">--}}
   {{--{{dd(app()->isLocale('ar'))}}--}}
    <div class="container pt-2 ">
        <div class="row">
            <div class="col-4 text-right" >
                <a href="#" class="text-white">
                {{--<a href="#" class="text-white" style="margin-right: {{ app()->isLocal('en') ? '' : '' }}">--}}
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-8">
                <h4 class="{{app()->isLocale('ar')?'text-right':'text-left' }} text-white" style="margin: 0 5%;">{{trans('lang.national_fruits')}}</h4>
            </div>

            @include('front.header')
        </div>
    </div>

</header>

@section('content')
    <section class=" pt-5 container-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! Form::open(['action'=>'Front\MainController@search','method'=>'get']) !!}
                    <div class="searchContainer">
                        <i class="fa fa-search searchIcon"></i>
                        <button type="submit" class="border-0"></button>
                        <input class="searchBox form-control" type="search" name="name">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <ul class="nav nav-pills justify-content-around mt-2 pr-0" id="pills-tab" role="tablist" style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }} ">

                @foreach($categories as $category)
                <li class="nav-item text-center" role="presentation">
                    <a class="nav-link text-white {{ $loop->first ? 'active' : '' }}" id="pills-{{$category->id}}-tab" data-toggle="pill" href="#pills-{{$category->id}}" role="tab" aria-controls="pills-{{$category->id}}" aria-selected="false" style="padding: .5rem .78rem
">
                        <img src="{{asset('public/'.$category->image)}}" width="20" height="20" alt=""><br>
                        <h6 style="font-size: 0.96rem;"> <small>{{$category->name}}</small></h6>
                    </a>
                </li>
              @endforeach
            </ul>

        </div>
        </div>

    </section>
    {{--flash message--}}
    <div class="text-center">
        @include('flash::message')
    </div>
    <section class="container mt-2 filter card">
        <div class="row p-2" style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }} ">
            <div class="col-6 {{app()->isLocale('ar')?'text-right':'text-left' }}" >

                {{--style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }};float:{{app()->isLocale('en')?'right':'' }} "--}}
                <a href="{{route('filter')}}"><i class="fas fa-filter mr-2" ></i>
                    <span>{{trans('lang.filter')}}</span></a>

            </div>
            <div class="col-6 {{app()->isLocale('en')?'text-right':'' }}">
                {{--<a href="{{route('main')}}"><i class="fas fa-th-large mr-2"></i></a>--}}
                <a href="{{route('index')}}"><i class="fas fa-th-list text-light-green"></i></a>


            </div>

        </div>
    </section>
        <div class="container">
            <div class="tab-content" id="pills-tabContent" dir="rtl">
                {{--@php $i=1; @endphp--}}
                @forelse($categories as $category)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pills-{{$category->id}}" role="tabpanel" aria-labelledby="pills-{{$category->id}}-tab">
                        {{--<div class="tab-pane fade show active" id="{{$i=1}}" role="tabpanel" aria-labelledby="pills-offers-tab">--}}

                        <div class="content mt-2">

                            <div class="row">
                                @forelse($category->products as $row)
                                    <div class="col-6 mb-3">
                                        <div class="card text-center" style="height:{{app()->isLocale('ar')?'220px':'240px' }}" >
                                            <div style="position: relative;">
                                                <img src="{{asset('public/'.$row->image)}}" class="img-fluid" alt=""style="width:100%;height:100px">
                                                <div style="position: absolute;top: 5px;left: 5px;">
                                                    @if (Cart::count() > 0)
                                                        <i class="fas fa-shopping-basket"></i>
                                                        @foreach (Cart::content() as $item)
                                                            <small>@if($item->id ==$row->id){{$item->qty}}@endif</small>
                                                        @endforeach
                                                    @else
                                                        <i class="fas fa-shopping-basket"></i>
                                                        <small>0</small>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="text-right">
                                                    <small class="text-muted">
                                                        {{$row->wight}}
                                                    </small>
                                                </div>

                                                <h6 class="pt-1">{{$row->name}}</h6>
                                                <small class="text-light-green">{{$row->price}} {{trans('lang.SR')}}</small>
                                                @if(auth('client-web')->user())
                                                    <div>
                                                        <a href="{{route('details',$row->id)}}" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;" >
                                                            <small>{{trans('lang.buy_now')}}</small>
                                                        </a>

                                                    </div>


                                                @else
                                                    <div>

                                                        <a href="#" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;" data-toggle="modal" data-target="#exampleModal6">
                                                            <small>{{trans('lang.buy_now')}}</small>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{trans('lang.You_must_register')}}
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <a href="{{route('login.client')}}" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;">
                                                                            <small>{{trans('lang.register_now')}}</small>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                @endif


                                            </div>

                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-danger text-center mt-5" role="alert">
                                        {{trans('lang.there_are_no_products_with_this_name')}}
                                    </div>
                                @endforelse
                                {{--@php $i++ @endphp--}}

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger text-center mt-5" role="alert">
                        {{trans('lang.there_are_no_products_with_this_name')}}
                    </div>
                @endforelse
            </div>
        </div>
@endsection
