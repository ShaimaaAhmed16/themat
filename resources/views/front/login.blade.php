@extends('front.app')
@section('title')
   {{trans('lang.login_to_your_account')}}
@endsection
<header class="header fixed-top bg-light-green">
    <div class="container pt-2">
        <div class="row">
            <div class="col-5 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-7">
                <h4 class="text-right text-white">{{trans('lang.national_fruits')}}</h4>
            </div>
            @include('front.header')
        </div>
    </div>
</header>

@section('content')
    <section class="container text-center pt-5">
        <img src="{{asset('public/front/images/tt.png')}}" alt="" width="150" />
    </section>
    @if ($errors->any())
        <div class="alert alert-danger text-right">
            <ul class="">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </ul>
        </div>
    @endif
    @include('flash::message')
    <section class="signin">
        <div class="card pt-3">
            <form class="container" method="post" action="{{route('login.client')}}">
                @csrf
                <div class="form-group text-right">
                    <input id="email" type="email" class="form-control" placeholder="{{trans('lang.email')}}" name="email"/>
                </div>
                <div class="form-group text-right">
                    <input type="password" id="password"  class="form-control" placeholder="{{trans('lang.password')}}"  name="password"/>
                </div>
                <div class="text-center">
                    <button type="submit" id="myBtn" class="btn btn-block text-white bg-light-green mb-1">{{trans('lang.login')}}</button >
                    <a href="{{route('register.client')}}" type="submit" class="btn btn-block bg-light-green mb-1  text-white ">{{trans('lang.register')}}</a>
                </div>
                <a  href="{{route('index')}}" class="btn btn-block text-white bg-light-green mt-2"> {{trans('lang.login_as_a_visitor')}}</a>
                <a href="{{route('reset.password')}}"  class="btn btn-block text-white bg-light-green mt-2">{{trans('lang.restore_password')}}</a>

            </form>
        </div>

    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
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

@endsection