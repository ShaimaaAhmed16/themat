@extends('admin.home')
@section('page')
    <a href="{{url(route('link.index'))}}">بيانات التواصل</a>
@endsection
@section('page_title')
/ تعديل بيانات التواصل
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
                {!!  Form::model($model,['action'=>['Dashboard\LinkController@update',$model->id],'method'=>'PUT',
                'files' =>true
                ]) !!}
                    @csrf
                    <div class="form-group">
                        <label for="ar_country">اسم الدوله بالعربي</label>
                        <input type="text" name="ar_country" id="ar_country" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('ar')->country : '' }} ">
                    </div>

                    <div class="form-group">
                        <label for="en_country">اسم الدوله بالانجليزيه</label>
                        <input type="text" name="en_country" id="en_country" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('en')->country : '' }} ">
                    </div>

                    <div class="form-group">
                        <label for="ar_city">اسم المدينه بالعربي</label>
                        <input type="text" name="ar_city" id="ar_city" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('ar')->city : '' }} ">
                    </div>

                    <div class="form-group">
                        <label for="en_city">اسم المدينه بالانجليزيه</label>
                        <input type="text" name="en_city" id="en_city" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('en')->city : '' }} ">
                    </div>

                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text" name="phone" id="phone" class="form-control text-right" value="{{ isset($model) ? $model->phone : '' }} ">
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email" name="email" id="email" class="form-control text-right" value="{{ isset($model) ? $model->email : '' }} ">
                    </div>

                    <div class="form-group">
                        <label for="watsUp">رفم الواتس</label>
                        <input type="text" name="watsUp" id="watsUp" class="form-control text-right" value="{{ isset($model) ? $model->watsUp : '' }} ">
                    </div>

                    <input type="submit" class="form-control text-center " value="حفظ" style="width:40%;background-color: limegreen ;border-radius: 10px">

                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
