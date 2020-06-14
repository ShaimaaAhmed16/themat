@extends('admin.home')
@section('page')
    <a href="{{route('product.index')}}">المنتج</a>
@endsection
@section('page_title')
/ تعديل المنتج
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
                {!!  Form::model($model,['action'=>['Dashboard\ProductController@update',$model->id],'method'=>'PUT',
                'files' =>true
                ]) !!}
                    @csrf
                @include('admin.product.form')
                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
