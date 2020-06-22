@extends('front.app')
@section('title')
    {{trans('lang.shopping_basket')}}
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
                <h4 class="text-white">{{trans('lang.shopping_basket')}}</h4>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>

</header>

@section('content')

    <div class="container shopcart1 pb-5">
        @if (Cart::count() > 0)
        <section class="d-flex justify-content-between mt-5 pl-4">
            <label class="mt-2 pr-2"> {{trans('lang.number_of_products')}} : {{Cart::count()}}</label>
            <button type="button" class="btn" data-toggle="modal" data-target="#Modal">
                {{trans('lang.empty_the_basket')}}
            </button>
            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content text-right">

                        <div class="modal-body">
                            {{trans('lang.are_you_sure')}}
                        </div>
                        <div class="modal-footer">
                            <form class="m-auto d-flex justify-content-around">
                                <div>
                                    <button type="button" class="btn" data-dismiss="modal">{{trans('lang.Cancellation')}}</button>
                                </div>
                                <div>
                                    <a href="{{route('empty')}}" class="btn">{{trans('lang.Certain')}} </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </section>
            @if (session()->has('success_message'))
                <div class="alert alert-success text-right">
                    {{ session()->get('success_message') }}
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <section class="text-center mt-5">
                @foreach (Cart::content() as $item)
                    <div class="card mt-2">
                <div class="row">
                    <div class="col-6 d-flex justify-content-around">
                        <div class="mt-2">
                            <img src="{{asset('public/'.$item->model->image)}}" alt="" width="50" height="50" class="img-fluid">
                        </div>

                        <h6 class="pt-3 pr-1">{{$item->name}}</h6>

                    </div>
                    <div class="col-6 d-flex justify-content-around">
                        <div class="card m-2 true">
                            <span class="pt-1 pb-1">&#10004;</span>
                        </div>
                        <form action="{{url('remove/'.$item->rowId)}}" method="get" class="mt-3 ml-3">
                            {{ csrf_field() }}
                            {{--{{ method_field('DELETE') }}--}}

                            <button type="submit" class="border-0 btn-light" style="background-color: transparent;"><i class="fas fa-trash-alt text-dark"></i></button>
                        </form>
                    </div>
                    <div class="col-12">
                       @if($item->model->getTranslation('ar')->wight == 'كيلو' )
                            <p>{{trans('lang.quantity_product')}}{{$item->qty}} {{trans('lang.kilo')}}</p>
                          <a href="{{route('details',$item->model->id)}}" class="border-0" style="background-color: transparent; color: #4e555b">{{trans('lang.quantity_change')}} <i class="fas fa-pencil-alt"></i></a>
                        </form>
                        @else
                            <form action="{{url('update-quantity/'.$item->rowId)}}" method="get" class="box mt-3">
                                @csrf
                                {{ method_field('patch') }}
                                <input type="number" value="{{$item->qty}}" min="1" name="quantity">
                                <button type="submit" class="border-0" style="background-color: transparent;"><i class="fas fa-pencil-alt"></i></button>
                            </form>
                        @endif


                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-4 mb-1">
                        <i class="fas fa-weight ml-1 mr-2"></i>
                        <span>
                            {{trans('lang.wight')}} :  {{$item->model->wight}}
                        </span>
                    </div>
                    <div class="col-4">
                        <span>
                            {{trans('lang.price')}} : {{$item->price}} {{trans('lang.SR')}}
                        </span>

                    </div>
                    <div class="col-4">
                        <span>
                            {{trans('lang.the_value_added_of_this_product')}} : {{$item->model->tax_price?$item->model->tax_price/100:0}}
                        </span>
                    </div>
                </div>
            </div>
                @endforeach
        </section>

        <section class="jumbotron p-2 m-4">
                <div class="d-flex justify-content-between">
                    <h6>{{trans('lang.The_total_price_of_the_products')}}</h6>
                    <h6>{{Cart::subtotal()}}</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6>{{trans('lang.value_added')}}</h6>
                    <h6>{{Cart::tax()}}</h6>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h6>{{trans('lang.total_price')}}</h6>
                    <h6>{{Cart::total()}}</h6>
                </div>
            </section>
        <section class="text-center mt-3 mb-5">
            {{--<form method="get" action="{{route('addorder')}}">--}}
            <form method="get" action="{{route('map')}}">

            <button type="submit" class="btn btn-success btn-block mt-4"> {{trans('lang.complete_the_request')}}</button>
            {{--<a href="map.html" class="btn btn-success btn-block mt-4"> إكمال الطلب</a>--}}
            </form>
            <a href="{{route('index')}}" class="btn btn-outline-dark btn-block mt-4"> {{trans('lang.refer_to_the_products')}}</a>
        </section>

        @else
            <section class="text-center mt-5">
                <label class="bg-red text-white pl-5 pr-5 pt-1 pb-1">{{trans('lang.no_products_in_the_cart')}}</label>
            </section>
        @endif
    </div>
@endsection