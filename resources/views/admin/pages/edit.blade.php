@extends('admin.home')
@section('page')
    <a href="{{url(route('page.index'))}}">الصفحات</a>
@endsection
@section('page_title')
/ تعديل الصفحه
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
                {!!  Form::model($model,['action'=>['Dashboard\PageController@update',$model->id],
                'method'=>'PUT','files'=>true ]) !!}
                    @csrf
                    <div class="form-group">
                        <label for="ar_name">اسم الصفحه بالعربي</label>
                        <input type="text" name="ar_name" id="ar_name" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('ar')->name : '' }} ">
                    </div>

                    <div class="form-group">
                        <label for="en_name">اسم الصفحه بالانجليزيه</label>
                        <input type="text" name="en_name" id="en_name" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('en')->name : '' }} ">
                    </div>

                    <div class="form-group">
                        <label for="ar_text">محتوي الصفحه بالعربي</label>
                        <textarea type="text" name="ar_text" id="ar_text" class="form-control text-right">{{ isset($model) ? $model->getTranslation('ar')->text : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="en_text">محتوي الصفحه بالانجليزيه</label>
                        <textarea type="text" name="en_text" id="en_text" class="form-control text-right">{{ isset($model) ? $model->getTranslation('en')->text : '' }}</textarea>
                    </div>


                    <input type="submit" class="form-control text-center " value="حفظ" style="width:40%;background-color: limegreen ;border-radius: 10px">

                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
