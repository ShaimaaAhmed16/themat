@extends('admin.home')
@section('page')
    <a href="{{route('client.index')}}">مستخدمين</a>
@endsection
@section('page_title')
/ تعديل مستخدم
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
                {!!  Form::model($model,['action'=>['Dashboard\ClientController@update',$model->id],'method'=>'PUT',
                'files' =>true
                ]) !!}
                    @csrf
                @include('admin.client.form')
                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
