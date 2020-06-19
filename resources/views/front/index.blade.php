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
                {{--@if($category_first)--}}
                    {{--<li class="nav-item text-center" role="presentation">--}}
                        {{--<a  href="index?category_id={{$category_first->id}}" class="nav-link active text-white"   role="tab" aria-controls="pills-fruits" aria-selected="false">--}}

                            {{--<img src="{{asset('public/'.$category_first->image)}}" width="25" height="25" alt=""><br>--}}
                            {{--<h6 style="font-size: 0.96rem;"> <small>{{$category_first->name}}</small></h6>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}} @foreach($categories as $category)
                <li class="nav-item text-center" role="presentation">

                         <a  href="index?category_id={{$category->id}} " class="nav-link text-white "   role="tab" aria-controls="pills-fruits" aria-selected="false">

                            <img src="{{asset('public/'.$category->image)}}" width="25" height="25" alt=""><br>
                            <h6 style="font-size: 0.96rem;"> <small>{{$category->name}}</small></h6>
                        </a>


                </li> @endforeach
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
                {{--<a href="{{route('main')}}"><i class="fas fa-th-large mr-2"></i></a>--}}
                <a href="{{route('index')}}"><i class="fas fa-th-list text-light-green"></i></a>


            </div>

        </div>
    </section>

    @if(count($rows))
        <div class="container">
            <div class="tab-content" id="pills-tabContent" dir="rtl">
                @php $i=1; @endphp
                <div class="tab-pane fade show active" id="{{$i=1}}" role="tabpanel" aria-labelledby="pills-offers-tab">
                    <div class="content mt-2">

                        <div class="row">
                            @foreach($rows as $row)
                                <div class="col-6 mb-3">
                                    <div class="card text-center" style="height: 220px;">
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
                                            <small class="text-light-green">1{{$row->price}} ر.س</small>
                                            @if(auth('client-web')->user())
                                                <div>
                                                    <a href="{{route('details',$row->id)}}" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;" >
                                                        <small>شراء الآن</small>
                                                    </a>

                                                </div>


                                            @else
                                                <div>

                                                    <a href="#" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;" data-toggle="modal" data-target="#exampleModal6">
                                                        <small>شراء الآن</small>
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
                                                                    يجب التسجيل
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <a href="{{route('login.client')}}" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;">
                                                                        <small>التسجيل الان</small>
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
                            @endforeach
                            @php $i++ @endphp

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger text-center mt-5" role="alert">
            لا يوجد منتجات بهذا الاسم
        </div>
    @endif

@endsection
