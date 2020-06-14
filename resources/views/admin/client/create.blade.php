@extends('admin.home')
@inject('model','App\Models\Client')
@section('page')
    <a href="{{url(route('client.index'))}}">مستخدمين</a>
    @endsection
@section('page_title')
  /  اضافه مستخدم
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            {{--<div class="card-header">--}}
                {{--<h3 class="card-title">اضافه مستخدم</h3>--}}

            {{--</div>--}}
            <div class="card-body text-right">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
               {!!  Form::model($model,['action'=>'Dashboard\ClientController@store',
               'method' => 'post']) !!}

                    @include('admin.client.form')

                {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
