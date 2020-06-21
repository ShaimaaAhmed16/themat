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
                <div class="form-group">
                    <label for="ar_name">اسم المنتج بالعربي</label>
                    <input type="text" name="ar_name" id="ar_name" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('ar')->name : '' }} ">
                </div>

                <div class="form-group">
                    <label for="en_name">اسم المنتج بالانجليزيه</label>
                    <input type="text" name="en_name" id="en_name" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('en')->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="ar_wight">وزن المنتج بالعربي</label>
                    <input type="text" name="ar_wight" id="ar_wight" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('ar')->wight : '' }}">
                </div>

                <div class="form-group">
                    <label for="en_wight">وزن المنتج بالانجليزيه</label>
                    <input type="text" name="en_wight" id="en_wight" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('en')->wight : '' }}">
                </div>

                <div class="form-group">
                    <label for="ar_description">تفاصيل المنتج بالعربي</label>
                    <input type="text" name="ar_description" id="ar_description" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('ar')->description : '' }}">
                </div>

                <div class="form-group">
                    <label for="en_description">تفاصيل المنتج بالانجليزيه</label>
                    <input type="text" name="en_description" id="en_description" class="form-control text-right" value="{{ isset($model) ? $model->getTranslation('en')->description : '' }}">
                </div>


                <div class="form-group">
                    <label for="price">سعر المنتج</label>
                    <input type="text" name="price" id="price" class="form-control text-right" value="{{ isset($model) ? $model->price : '' }}">
                </div>
                    <div class="form-group">
                        <label for="tax_price">القيمه المضافه لهذا المنتج</label>
                        <input type="text" name="tax_price" id="tax_price" class="form-control text-right" value="{{ isset($model) ? $model->tax_price : '' }}">
                    </div>

                <div class="form-group">
                    <label for="price">اختار القسم</label>
                    <select class="form-control text-right" name="category_id">
                        <option>اختار القسم</option>
                        @foreach ($categories as $category)
                            <option value="{{$category ->getTranslation('ar')->category_id}}" {{ $category ->getTranslation('ar')->category_id === $model->category_id ? ' selected' : '' }} >{{$category ->getTranslation('ar')->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">صوره المنتج</label>
                    @if($model->image)
                        <img src="<?php echo asset('public/'.$model->image)?>" style="margin-bottom: 10px" width="100" height="100"/>
                    @endif
                    <br>
                    <input type="file" name="image" id="image" placeholder="اختار صوره">
                </div>

                <input type="submit" class="form-control text-center " value="حفظ" style="width:40%;background-color: limegreen ;border-radius: 10px">
                {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
