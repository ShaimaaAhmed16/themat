@extends('admin.home')
@inject('model','App\Models\Link')
@section('page')
    <a href="{{url(route('link.index'))}}">بيانات التواصل</a>
    @endsection
@section('page_title')
   /  بيانات التواصل
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">اضافه بيانات التواصل</h3>
            </div>
            <div class="card-body text-right">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
               {!!  Form::model($model,['action'=>'Dashboard\LinkController@store',
               'method' => 'post']) !!}

                    @include('admin.link.form')

                {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
