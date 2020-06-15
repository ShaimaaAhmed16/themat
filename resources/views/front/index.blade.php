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
            <div class="col-8">
                <h4 class="text-right text-white" style="margin: 0 10%;">الثمار الوطنية</h4>
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
                    {!! Form::open(['action'=>'Front\MainController@index','method'=>'get']) !!}
                    <div class="searchContainer">
                        <i class="fa fa-search searchIcon"></i>
                        <button type="submit" class="border-0"></button>
                        <input class="searchBox form-control" type="search" name="name">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <ul class="nav nav-pills justify-content-around mt-2 pr-0" id="pills-tab" role="tablist">

                @foreach($categories as $category)
                    <li class="nav-item text-center" role="presentation">
                    {{--<a class="nav-link active text-white" id="pills-fruits-tab" data-toggle="pill" href="#pills-fruits" role="tab" aria-controls="pills-fruits" aria-selected="false">--}}
                    <a  href="index?category_id={{$category->id}}" class="nav-link active text-white"   role="tab" aria-controls="pills-fruits" aria-selected="false">

                    <img src="{{asset('public/'.$category->image)}}" width="25" height="25" alt=""><br>
                        {{$category->name}}
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
        <div class="row p-2">
            <div class="col-6 text-right">
                <a href="{{route('filter')}}"><i class="fas fa-filter mr-2"></i>
                    <span>فلتر</span></a>

            </div>
            <div class="col-6">
                <a href="{{route('main')}}"><i class="fas fa-th-large mr-2"></i></a>
                <a href="{{route('index')}}"><i class="fas fa-th-list text-light-green"></i></a>


            </div>

        </div>
    </section>

    @if(count($rows))
    <div class="container">
        <div class="tab-content" id="pills-tabContent" dir="rtl">
            {{--@foreach($categories as $category)--}}
            @php $i=1; @endphp
            <div class="tab-pane fade show active" id="{{$i=1}}" role="tabpanel" aria-labelledby="pills-fruits-tab">

                    <div class="content mt-2">
                        @foreach($rows as $row)
                    <div class="card mb-2">
                        <div class="row p-2">
                            <div class="col-sm-4 col-12 d-flex justify-content-between">
                                <div>
                                    <img src="{{asset('public/'.$row->image)}}" alt="" width="120">
                                </div>
                                <div>
                                    {{--<a href="#">--}}

                                        {{--@foreach (Cart::content() as $item)--}}
                                        {{--<span class="badge ml-1">{{$qty}}</span>--}}
                                        {{--@endforeach--}}
                                        {{--<i class="fas fa-shopping-basket"></i>--}}

                                    {{--</a>--}}
                                </div>

                            </div>

                            <div class="col-sm-4 col-12 text-right">
                                <h5>{{$row->name}}</h5>
                                <small>
                                    ريال
                                    {{$row->price}}
                                </small><br>
                                <span class="ml-4">{{$row->wight}}</span>
                                <span class="text-light-green">{{$row->price}}ريال</span>
                            </div>
                            <div class="col-sm-4 col-12 text-right">
                                {{--<form class="box">--}}
                                {{--<span class="ml-2">إضافة عدد</span>--}}
                                {{--<input type="number" value="1" min="1">--}}
                                {{--</form>--}}
                                {{--<br>--}}
                                {{--<form class="box">--}}
                                {{--<span class="ml-2">إضافة سعر</span>--}}
                                    {{--<input type="number" value="1" min="1">--}}
                                {{--</form>--}}
                                @if(auth('client-web')->user())

                                    <a href="{{route('details',$row->id)}}"><button type="submit" class="btn bg-light-green mt-4 myBtn2 text-white hvr-glow">
                                                شراء الآن
                                        </button></a>

                                @else
                                    <a href="{{route('login.client')}}"><button class="btn bg-light-green mt-4 myBtn2 text-white hvr-glow">
                                            شراء الآن
                                        </button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                        @endforeach
                        @php $i++ @endphp
                </div>


            </div>

            {{--@endforeach--}}
            {!! $rows->render() !!}
        </div>
    </div>

    @else
        <div class="alert alert-danger text-center mt-5" role="alert">
            لا يوجد منتجات بهذا الاسم
        </div>
    @endif


@endsection
