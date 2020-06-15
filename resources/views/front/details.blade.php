@extends('front.app')
@section('title')
    الثمار الوطنية
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

                <h4 class="text-right text-white"> {{$row->name}}</h4>
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

    <div class="container mt-2 buy">
        <div class="row">
            <div class="col-6 text-right">
                <span>
                    الوزن :  {{$row->wight}}
                </span>
                <i class="fas fa-weight"></i>
                <br>
                <!-- <div class="btn-group mr-2 mt-2">
                    <button type="button" class="btn">+</button>
                    <button type="button" class="btn">1</button>
                    <button type="button" class="btn">-</button>
                </div> -->
                    <form action="{{url('front/add-cart')}}" method="POST" class="box" id="cart">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$row->id}}">
                    <input type="hidden" name="name" value="{{$row->name}}">
                    <input type="hidden" name="price" value="{{$row->price}}">
                    <input type="number" value="{{$product_qty?$product_qty:1}}" min="1" name="qty">
                </form>
            </div>
            <div class="col-6">
                <span>
                    السعر : {{$row->price}} ر.س
                </span>
                <i class="fas fa-dollar-sign"></i>
                <br>
                <div class="btn-group mt-2">
                    <button type="submit" class="btn" form="cart">أضف للسلة</button>

                    <button type="button" class="btn"><i class="fas fa-shopping-basket"></i></button>
                </div>
            </div>
        </div>

        <div class="card mt-5 mb-4">
            <div class="card-title text-right p-2">
                <span class="about-product">عن المنتج</span>
            </div>
            <div class="card-body">{{$row->description}}</div>
        </div>
        <h6 class="text-center">منتجات ذات صلة</h6>
        @foreach($rows as $row1)
            <div class="card mb-2">
                <div class="row p-2">
                    <div class="col-4 text-right">

                        <img src="{{asset('public/'.$row1->image)}}" class="img-fluid" alt="" width="120">
                    </div>
                    <div class="col-4 text-right">
                        <h5>{{$row1->name}}</h5>
                        <small>
                            ريال
                            {{$row1->price}}
                        </small><br>
                        <span class="ml-4">{{$row1->wight}}</span>
                        <span class="text-light-green">{{$row1->price}}ريال</span>
                    </div>
                    <div class="col-4">
                        <a href="#"><i class="fab fa-opencart"></i></a><br>
                        <a href="{{route('details',$row1->id)}}" class="btn btn-sm bg-light-green mt-4"> شراء الآن</a>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

@endsection