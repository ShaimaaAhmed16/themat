@extends('front.app')
@section('title')
    {{trans('lang.national_fruits')}}
    @endsection

@section('content')
    <header class="header fixed-top bg-light-green">
        <div class="container pt-2 ">
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
    <section class="container text-center pt-5">
        <img src="{{asset('public/front/images/tt.png')}}" alt="" width="150">
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
    <section class="signin">
        <div class="card pt-3">
            <form class="container" method="post" action="{{route('register.client')}}" style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }} ">
                @csrf
                <div class="form-group text-right">
                    <input id="name" type="text" class="form-control"  placeholder="{{trans('lang.first_name')}}" name="first_name" value="{{old('first_name')}}" >
                </div>
                <div class="form-group text-right">
                    <input id="name" type="text"class="form-control" placeholder="{{trans('lang.family_name')}}" name="second_name" value="{{old('second_name')}}">
                </div>
                <div class="form-group text-right">
                    <input id="name" type="text"class="form-control" placeholder="{{trans('lang.district')}}"  name="address" value="{{old('address')}}">
                </div>
                <div class="form-group text-right">
                    <input type="email"  id="email1" class="form-control" placeholder="{{trans('lang.email')}}" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group text-right">
                    <input type="tel" id="phone" class="form-control" placeholder="05xxxxxxxx {{trans('lang.phone')}}" name="phone" value="{{old('phone')}}">
                </div>
                <div class="form-group text-right">
                    <input type="password" id="password1" class="form-control" placeholder="{{trans('lang.password')}}" name="password">
                </div>
                <div class="form-group text-right">
                    <input type="password" id="password1" class="form-control"placeholder="{{trans('lang.confirm_password')}}" name="password_confirmation">
                </div>
                <div class="text-center">
                    <button type="submit" id="myBtn1" class="btn btn-block text-white bg-light-green mb-1">{{trans('lang.register')}}</button>
                </div>

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