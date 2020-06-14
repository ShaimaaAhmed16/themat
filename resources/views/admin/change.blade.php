@extends('admin.home')
@section('page_title')
    تغيير كلمه المرور
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <div class="card-body">
                <div class="mt-3">
                    @include('flash::message')
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['url'=>route('change.password'),'method'=>'post']) !!}
                @include('admin.form')
                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </section>
@endsection