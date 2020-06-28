@extends('front.app')
@section('title')
    {{trans('lang.national_fruits')}}
@endsection
<header class="header fixed-top bg-light-green">
    <div class="container pt-2 ">
        <div class="row">
            <div class="col-4 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-8 d-flex justify-content-between">

                <h4 class="text-right text-white">{{$row->name}}</h4>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>

</header>

@section('content')

    <div class="container mt-4">
        <div class="card">
            <img src="{{asset('public/'.$row->image)}}" alt="" class="img-fluid">
        </div>

    </div>
    <div class="text-center">
        @include('flash::message')
    </div>
    <div class="container mt-2 buy">
        <div class="row">

            <div class="col-6 text-right">
                <small>
                    <i class="fas fa-weight"></i>
                    {{trans('lang.wight')}} :  {{$row->wight}}
                </small>
                <br>

                <form action="{{url('add-cart')}}" method="get" class="box" id="cart">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$row->id}}">
                    <input type="hidden" name="name" value="{{$row->name}}">
                    <input type="hidden" name="price" value="{{$row->price}}">
                    {{--@if (Cart::count() > 0)--}}
                    <input type="number" value="0" min="0" name="qty">
                    {{--<input type="number" value="{{$product_qty?$product_qty:0}}" min="0" name="qty">--}}
                    {{--@else--}}
                    {{--<input type="number" value="0" min="0" name="qty">--}}
                    {{--@endif--}}
                    {{--</form>--}}

                    {{--<form>--}}<br>
                    <br>
                    @if($row->getTranslation('ar')->wight == 'كيلو')
                        <i class="fas fa-weight" style="font-size: 13px"></i>
                        <small>{{trans('lang.weight_in_grams')}}:</small>
                        <div class="input-group input-group-sm mt-2 mb-3">
                            <input type="text" class="form-control" name="qty1">
                            {{--<div class="input-group-prepend">--}}
                            {{--<button class="btn btn-sm">تاكيد</button>--}}
                            {{--</div>--}}
                        </div>
                    @endif
                </form>
            </div>
            <div class="col-6">
                <span>
                    {{trans('lang.price')}} : {{$row->price}} {{trans('lang.SR')}}
                </span>
                <br>
                <div class="btn-group mt-2">
                    <button type="submit" class="btn btn-sm" form="cart">{{trans('lang.add_to_cart')}}</button>
                    @if (Cart::count() > 0)
                        <button type="button" class="btn btn-sm"><i class="fas fa-shopping-basket"></i><span class="badge ml-1">{{$product_qty?$product_qty:""}}</span></button>
                    @else
                        <button type="button" class="btn btn-sm"><i class="fas fa-shopping-basket"></i><span class="badge ml-1">0</span></button>
                    @endif
                </div>
            </div>
        </div>

        <div class="card mt-5 mb-4">
            <div class="card-title text-right">
                <span class="about-product">{{trans('lang.about_the_product')}}</span>
            </div>
            <div class="card-body text-right " style="padding-top: 0;">{{$row->description}}</div>
        </div>

    </div>

@endsection