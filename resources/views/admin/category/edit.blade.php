@extends('admin.home')
@section('page')
    <a href="{{url(route('category.index'))}}">التصنيف</a>
@endsection
@section('page_title')
/ تعديل التصنيف
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
                {!!  Form::model($model,['action'=>['Dashboard\CategoryController@update',$model->id],
                'method'=>'PUT' , 'files' =>true ]) !!}
                    @csrf
                    <div class="form-group">
                        <label for="ar[name]">الاسم بالعربي</label>
                        <input type="text" name="ar_name" id="ar[name]" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('ar')->name : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="en[name]">الاسم بالانجليزيه</label>
                        <input type="text" name="en_name" id="en[name]" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('en')->name: '' }}">
                    </div>

                    <div class="form-group">
                        <label for="image">صوره القسم</label>
                        <input type="file" name="image" id="image" >
                    </div>

                    @if($model->image)
                        <img src="<?php echo asset('public/'.$model->image)?>" style="margin-bottom: 10px" width="100" height="100"/>
                    @endif
                    <input type="submit" class="form-control text-center " value="حفظ" style="width:40%;background-color: limegreen ;border-radius: 10px">

                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
