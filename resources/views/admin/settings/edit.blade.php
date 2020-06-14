@extends('admin.home')
@section('page')
    <a href="{{url(route('setting.index'))}}">الاعدادات</a>
@endsection
@section('page_title')
/ تعديل الاعدادات
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">

            <div class="card-body text-right">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                {!!  Form::model($setting,['action'=>['Dashboard\SettingController@update',$setting->id],
                'method'=>'post','files'=>true ]) !!}
                    @csrf
                @include('admin.settings.form')
                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
