@extends('admin.home')
@section('page')
    <a href="{{url(route('contact.index'))}}">تواصل معنا</a>
@endsection
@section('page_title')
تواصل معنا
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">تعديل</h3>

            </div>
            <div class="card-body text-right">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                {!!  Form::model($model,['action'=>['Admin\ContactController@update',$model->id],'method'=>'PUT',
                'files' =>true
                ]) !!}
                    @csrf
                @include('admin.contact.form')
                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
