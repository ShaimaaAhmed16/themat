@extends('admin.home')
@inject('model','App\Models\Product')
@section('page')
    <a href="{{url(route('product.index'))}}">منتجات</a>
    @endsection
@section('page_title')
   / اضافه منتج
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
               {!!  Form::model($model,['action'=>'Dashboard\ProductController@store',
               'method' => 'post',
               'files'=>true]) !!}

                    @include('admin.product.form')

                {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
