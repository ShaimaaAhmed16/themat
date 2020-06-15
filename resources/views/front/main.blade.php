@extends('front.app')
@section('title')
    الثمار الوطنية
@endsection
<header class="header card fixed-top bg-light-green">
    <div class="container pt-2 ">
        <div class="row">

            <div class="col-5 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-7">
                <h4 class="text-right text-white">الثمار الوطنيةر</h4>
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
                        <a class="nav-link active text-white"  href="index?category_id={{$category->id}}" role="tab" aria-controls="pills-fruits" aria-selected="false">
                            <img src="{{asset('public/'.$category->image)}}" width="25" height="25" alt=""><br>
                            {{$category->name}}
                        </a>
                     </li>
                @endforeach
            </ul>
        </div>
        </div>

    </section>

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
                @php $i=1; @endphp
                    <div class="tab-pane fade show active" id="{{$i=1}}" role="tabpanel" aria-labelledby="pills-fruits-tab">
                    <div class="content mt-2">
                        <div class="row">
                            @foreach($rows as $row)
                            <div class="col-6">
                                <div class="card text-center p-2">

                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <img src="{{asset('public/'.$row->image)}}" class="img-fluid" alt="" width="60">
                                        </div>
                                        <div>
                                            <a href="#">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div>
                                        <h5>{{$row->name}}</h5>
                                        <small>
                                            ريال
                                            {{$row->price}}
                                        </small><br>
                                        <span class="ml-4">{{$row->wight}}</span>
                                        <span class="text-light-green">{{$row->price}}ريال</span>


                                        @if(auth('client-web')->user())
                                            <a href="{{route('details')}}"><button type="submit" class="btn bg-light-green btn-block mt-4 myBtn2 text-white hvr-glow">
                                                شراء الآن
                                                </button></a>

                                        @else
                                            <a href="{{route('login.client')}}"><button class="btn bg-light-green btn-block mt-4 myBtn2 text-white hvr-glow">
                                                    شراء الآن
                                                </button>
                                            </a>
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