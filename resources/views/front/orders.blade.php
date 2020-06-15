@extends('front.app')
@section('title')
    الثمار الوطنية
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
                <h4 class="text-right text-white">طباتى </h4>
                <a href="{{route('index')}}">
                    <i class="fas fa-chevron-left text-white"></i>
                </a>
            </div>
            @include('front.header')
        </div>
    </div>

</header>
@section('content')
    <section class="container text-right mt-5 about">
        <ul class="nav nav-tabs  nav-justified pr-0" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link  text-dark " id="profile-tab" data-toggle="tab" href="#منتظر" role="tab" aria-controls="profile" aria-selected="false">منتظر </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark active" id="contact-tab" data-toggle="tab" href="#فعال" role="tab" aria-controls="contact" aria-selected="true">فعال </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-dark" id="profile-tab" data-toggle="tab" href="#منتهى" role="tab" aria-controls="profile" aria-selected="false">منتهى </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="home-tab" data-toggle="tab" href="#ملغى" role="tab" aria-controls="home" aria-selected="false">ملغى </a>
            </li>
        </ul>
        @if(count($orders) >0)
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="ملغى" role="tabpanel" aria-labelledby="home-tab">
                @foreach($orders as $order)
                    @if($order->status == 'ملغي')
                        <br>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{asset('public/front/images/accepted.png')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5>تم رفض الطلب </h5>
                                    <small class="text-muted">{{$order->updated_at}}</small>
                                </div>

                            </div>
                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade" id="منتهى" role="tabpanel" aria-labelledby="profile-tab">
                @foreach($orders as $order)
                    @if($order->status == 'منتهي')
                        <br>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{asset('public/front/images/tick.png')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5>تم استلام الطلب </h5>
                                    <small class="text-muted">{{$order->updated_at}}</small>
                                </div>

                            </div>

                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade show active" id="فعال" role="tabpanel" aria-labelledby="contact-tab">
                @foreach($orders as $order)
                    @if($order->status == 'فعال')
                        <br>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{asset('public/front/images/accepted.png')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5>تم تفعيل الطلب </h5>
                                    <small class="text-muted">{{$order->updated_at}}</small>
                                </div>

                            </div>
                    @endif
                @endforeach
            </div>
            <div class="tab-pane fade " id="منتظر" role="tabpanel" aria-labelledby="profile-tab">
                @foreach($orders as $order)
                    @if($order->status == 'منتظر')
                        <br>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="{{asset('public/front/images/accepted.png')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h5>الطلب في حاله الانتظار </h5>
                                    <small class="text-muted">{{$order->updated_at}}</small>
                                </div>

                            </div>
                    @endif
                @endforeach
            </div>
        </div>
        @else
            <div class="alert alert-danger text-center mt-5" role="alert">
                لا يوجد منتجات بهذا الاسم
            </div>
        @endif
    </section>

    @endsection