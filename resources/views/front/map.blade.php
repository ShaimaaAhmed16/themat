@extends('front.app')
@section('title', 'الثمار الوطنية')

@section('content')
    <header class="header fixed-top bg-light-green">
        <div class="container pt-2">
            <div class="row">
                <div class="col-4 text-right">
                    <a href="#" class="text-white">
                        <i class="fas fa-bars" onclick="openNav()"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h4 class="text-right text-white" style="margin: 0 10%;">
                        الثمار الوطنية
                    </h4>
                </div>
               @include('front.header')
            </div>
        </div>
    </header>
    <div class="container mt-5 pt-3 mb-3">
        <p class="text-right"><b> طرق الدفع : </b></p>
        <div class="d-flex justify-content-center text-right">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"  style="margin-left: -10px;">
                <label class="form-check-label mt-1" for="exampleRadios1">
                    <a href="#" class="mr-3">
                        <img src="{{asset('public/front/images/mada.png')}}" width="40" alt="" />
                    </a>
                </label>

            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" style="margin-left: -10px;">
                <label class="form-check-label" for="exampleRadios2">
                    <a href="#" class="mr-4">
                        <img src="{{asset('public/front/images/mastercard.png')}}" width="40" alt="" />
                    </a>
                </label>

            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" style="margin-left: -10px;">
                <label class="form-check-label mt-1" for="exampleRadios3">
                    <a href="#" class="mr-3">
                        <img src="{{asset('public/front/images/visa.png')}}" width="40" alt="" />
                    </a>
                </label>

            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4" checked style="margin-left: -10px;">
                <label class="form-check-label mt-1" for="exampleRadios4">
                    <a href="#" class="mr-3">
                        <img src="{{asset('public/front/images/kisspng_sadad_payment_system_s.png')}}" width="40" alt=""/>
                    </a>
                </label>

            </div>




        </div>
    </div>

    <section class="map">
        <div class="row">
            <div class="col-12">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d950645.7063804097!2d39.77166654999316!3d21.450468415099117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2z2KzYr9ipINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1591455109388!5m2!1sar!2seg"
                        width="100%"
                        height="545"
                        frameborder="0"
                        style="border: 0;"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0"
                ></iframe>
            </div>
        </div>
    </section>

    <section class="container mb-5 pb-3">
        <form class="text-right" method="post" action="{{route('map')}}">
            @csrf
            <div class="form-group">
                <label> العنوان بالتفصيل: </label>
                <input type="text" class="form-control" name="address_details"/>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"> معلم قريب : </label>
                <input type="text" class="form-control" name="nearby" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"
                ><span class="text-danger">*</span> رقم جوال اضافى للتواصل مع
                    المندوب
                </label>
                <input type="text" class="form-control" name="additional_mobile" required />
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">اعتماد الطلب</button>
            </div>
        </form>
    </section>
@endsection