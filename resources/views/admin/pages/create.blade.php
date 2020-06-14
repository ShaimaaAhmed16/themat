@extends('admin.home')
@inject('model','App\Models\Page')
@section('page')
    <a href="{{route('page.index')}}">الصفحات</a>
    @endsection
@section('page_title')
   / اضافه صفحه
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
               {!!  Form::model($model,['action'=>'Dashboard\PageController@store',
               'method' => 'post', 'files'=>true]) !!}


                    @include('admin.pages.form')

                {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
