@extends('front.app')
@section('title')
   {{trans('lang.national_fruits')}}
@endsection
<header class="header card fixed-top bg-light-green">
    <div class="container pt-2 ">
        <div class="row">
            <div class="col-4 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div class="col-8 d-flex justify-content-between">
                <h4 class="text-right text-white">{{trans('lang.my_orders')}} </h4>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>

</header>
@section('content')
    <section class="container text-right mt-5 about" style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }}">
        <ul class="nav nav-tabs  nav-justified pr-0" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link  text-dark " id="profile-tab" data-toggle="tab" href="#{{trans('lang.Waiting')}}" role="tab" aria-controls="profile" aria-selected="false" style="padding: 8px 0 !important;">{{trans('lang.Waiting')}} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark active" id="contact-tab" data-toggle="tab" href="#{{trans('lang.active')}}" role="tab" aria-controls="contact" aria-selected="true" style="padding: 8px 0 !important;">{{trans('lang.active')}} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-dark" id="profile-tab" data-toggle="tab" href="#{{trans('lang.Finished')}}" role="tab" aria-controls="profile" aria-selected="false" style="padding: 8px 0 !important;">{{trans('lang.Finished')}} </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="home-tab" data-toggle="tab" href="#{{trans('lang.Canceled')}}" role="tab" aria-controls="home" aria-selected="false" style="padding: 8px 0 !important;">{{trans('lang.Canceled')}} </a>
            </li>
        </ul>
        @if(count($orders) >0)
        <div class="tab-content" id="myTabContent" >
            <div class="tab-pane fade" id="{{trans('lang.Canceled')}}" role="tabpanel" aria-labelledby="home-tab">
                @foreach($orders as $order)
                    @if($order->status == 'ملغي')
                        <br>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{asset('public/front/images/accepted.png')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5>{{trans('lang.request_has_been_rejected')}}</h5>
                                    <small class="text-muted">{{$order->updated_at}}</small>
                                </div>

                            </div>
                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade" id="{{trans('lang.Finished')}}" role="tabpanel" aria-labelledby="profile-tab">
                @foreach($orders as $order)
                    @if($order->status == 'منتهي')
                        <br>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{asset('public/front/images/tick.png')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5>{{trans('lang.The_receipt_of_the_request')}}</h5>
                                    <small class="text-muted">{{$order->updated_at}}</small>
                                </div>

                            </div>

                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade show active" id="{{trans('lang.active')}}" role="tabpanel" aria-labelledby="contact-tab">
                @foreach($orders as $order)
                    @if($order->status == 'فعال')
                        <br>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{asset('public/front/images/accepted.png')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5>{{trans('lang.The_request_has_been_activated')}}</h5>
                                    <small class="text-muted">{{$order->updated_at}}</small>
                                </div>

                            </div>
                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade " id="{{trans('lang.Waiting')}}" role="tabpanel" aria-labelledby="profile-tab">
                @foreach($orders as $order)
                    @if($order->status == 'منتظر')
                        <br>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{asset('public/front/images/accepted.png')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5>{{trans('lang.The_request_is_on_hold')}}</h5>
                                    <small class="text-muted">{{$order->updated_at}}</small>
                                </div>

                            </div>
                    @endif
                @endforeach
            </div>
        </div>
        @else
            <div class="alert alert-danger text-center mt-5" role="alert">
                {{trans('lang.There_are_no_data')}}
            </div>
        @endif
    </section>

    @endsection