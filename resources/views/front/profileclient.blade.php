@extends('front.app')
@section('title')
    {{trans('lang.national_fruits')}}
@endsection
<header class="header fixed-top bg-light-green">
    <div class="container pt-2">
        <div class="row">
            <div class="col-5 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-7 d-flex justify-content-between">
                <h4 class="text-right text-white">{{trans('lang.profile')}}</h4>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>
</header>
@section('content')
    <section class="update container text-center">
        <div class="mt-3">
            @include('flash::message')
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="get" action="{{url('profile-update/'.auth()->guard('client-web')->user()->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="img-container p-5">
                            <div class="picture-container">
                                <div class="picture">
                                    @if(auth()->guard('client-web')->user()->image)
                                        <img src="{{asset(auth()->guard('client-web')->user()->image)}}" class="img-fluid" alt="">
                                    @else
                                        <img src="{{asset('public/front/images/user-icon.png')}}"  class="img-fluid" alt="">
                                    @endif
                                    <div class="picture-edit">
                                        <img src="{{asset('public/front/images/edit.png')}}" class="picture-src" id="wizardPicturePreview">
                                        <input type="file" id="wizard-picture" name="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <img src="images/user-icon.png"class="img-fluid"alt="" width="100"/> -->
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <label for="username" class="text-light-green">{{trans('lang.first_name')}}</label>
                <input  type="text" class="form-control" id="username" placeholder="{{trans('lang.first_name')}}"
                 value="{{auth()->guard('client-web')->user()->first_name}}"  name="first_name" />
            </div>
            <div class="form-group text-right">
                <label for="username" class="text-light-green">{{trans('lang.family_name')}}</label>
                <input  type="text" class="form-control" id="username" placeholder="{{trans('lang.family_name')}}"
                        value="{{auth()->guard('client-web')->user()->second_name}}"  name="second_name" />
            </div>
            <div class="form-group text-right">
                <label class="text-light-green">{{trans('lang.phone')}}</label>
                <input type="tel" class="form-control" placeholder="{{trans('lang.phone')}}"  value="{{auth()->guard('client-web')->user()->phone}}"  name="phone"/>
            </div>
            <div class="form-group text-right">
                <label class="text-light-green">{{trans('lang.email')}}</label>
                <input
                        type="email"
                        class="form-control"
                        placeholder="{{trans('lang.email')}}" name="email" value="{{auth()->guard('client-web')->user()->email}}"
                />
            </div>
            <div class="form-group text-right">
                <label class="text-light-green">{{trans('lang.address')}}</label>
                <input type="text" class="form-control" placeholder="{{trans('lang.address')}}"  name="address" value="{{auth()->guard('client-web')->user()->address}}"/>
            </div>
            <div class="form-group text-right">
                <label class="text-light-green">{{trans('lang.password')}}</label>
                <input
                        type="password"
                        class="form-control"
                        placeholder="{{trans('lang.Leave_it_blank')}}"
                />
            </div>

            <button type="submit" class="btn btn-block text-white">{{trans('lang.Update')}}</button>
        </form>
    </section>
@endsection