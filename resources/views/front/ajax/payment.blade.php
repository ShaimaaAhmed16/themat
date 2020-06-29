@extends('front.app')
@section('title')
    {{trans('lang.national_fruits')}}
@endsection

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
                        {{trans('lang.national_fruits')}}
                    </h4>
                </div>
                @include('front.header')
            </div>
        </div>
    </header>
    @if(isset($fail))
        <div class="alert alert-danger text-center">
            فشلت عملية الدفع
        </div>
    @endif
    <div style="margin-top: 100px; direction: {{app()->isLocale('ar')?'rtl':'ltr' }}" class="text-center">
        <button id="checkout" class="btn btn-success text-center mb-5 " >متابعه الطلب</button>
    </div>
    <div id="showPayForm" style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }}" ></div>
@endsection

@section('scripts')

    <script>
        $(document).on('click', '#checkout', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: "{{route('payment')}}",
                data: {
                    phone: $('#phone').text(),
                    {{--offer_id: '{{$offer -> id}}',--}}
                },
                success: function (data) {
                    if (data.status == true) {

                        $('#showPayForm').empty().html(data.content);

                    } else {
                    }
                }, error: function (reject) {
                }
            });
        });
    </script>
@stop