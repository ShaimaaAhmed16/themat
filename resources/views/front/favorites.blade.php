@extends('front.app')
@include('front.header')
@section('content')
    <section class="container text-right mt-5 about">
    @if(count($products))
        @foreach($products as $product)

        <div class="card mb-2 mt-3">
            <div class="row p-2">
                    <div class="col-4">
                        <a href="#"><i class="fab fa-opencart"></i></a><br>
                        <form action="{{url('add-cart')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <button type="submit" class="btn bg-light-green mt-4">شراء الآن</button>
                        </form>
                    </div>
                <div class="col-4 text-right">
                    <h5>{{$product->name}}</h5>
                    <small>
                        ريال
                        {{$product->price}}
                    </small><br>
                    <span class="ml-4">{{$product->weight}}</span>
                    <span class="text-light-green">{{$product->price}}ريال</span>
                </div>
                <div class="col-4 text-right">
                    <a href="{{url('favorite/'.$product->id)}}">

                        <i class="fas fa-times-circle text-danger"></i>
                    </a>
                    <img src="{{$product->image}}" alt="" width="120">
                </div>
            </div>
        </div>

        @endforeach

    @endif
    </section>

@endsection