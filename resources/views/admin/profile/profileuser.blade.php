@extends('admin.home')
@section('page_title')
    عرض الملف الشخصي
@endsection

@section('content')

<section class="update container text-center">
    <div class="card">
        <div class="card-body ">
        {{--<div class="row">--}}
            {{--<div class="col-12">--}}
                {{--@if(auth()->guard('admin')->user()->image)--}}
                    {{--<img src="{{asset(auth()->guard('admin')->user()->image)}} " alt="" width="100">--}}
                {{--@else--}}
                    {{--<img src="{{asset('front/images/user-icon.png')}}" alt="" width="100">--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}

        <form method="post" action="{{route('profile.user',auth()->guard('admin')->user()->id)}}">
            @csrf
            <div class="form-group text-right">
                <label for="Name" class="text-light-green">الاسم</label>
                {!!  Form::text('name',auth()->guard('admin')->user()->name,[
                'class'=>'form-control ',
                ]) !!}
            </div>

            <div class="form-group text-right">
                <label for="email" class="text-light-green">البريد الالكترونى</label>
                {!!  Form::text('email',auth()->guard('admin')->user()->email,[
                 'class'=>'form-control ',
                ]) !!}
            </div>
            <button type="submit" class="btn btn-block btn-success text-white">تحديث</button>
        </form>

        </div>
    </div>
</section>

    @endsection