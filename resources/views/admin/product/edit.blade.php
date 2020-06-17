@extends('admin.home')
@section('page')
    <a href="{{route('product.index')}}">المنتجات</a>
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
                    {{--<div class="form-group ">--}}
                        {{--<label for="name">اسم المنتج</label>--}}
                        {{--{!!  Form::text('name',null,[--}}
                            {{--'class'=>'form-control text-right',"value"=>"{{old('name')}}"--}}
                        {{--]) !!}--}}
                        {{--<label for="price">سعر المنتج</label>--}}
                        {{--{!!  Form::text('price',null,[--}}
                            {{--'class'=>'form-control text-right',"value"=>"{{old('price')}}"--}}
                        {{--]) !!}--}}

                        {{--<label for="wight">وزن المنتج</label>--}}
                        {{--{!!  Form::text('wight',null,[--}}
                            {{--'class'=>'form-control text-right',"value"=>"{{old('wight')}}"--}}
                        {{--]) !!}--}}
                        {{--<label for="description">تفاصيل المنتج</label>--}}
                        {{--{!!  Form::text('description',null,[--}}
                            {{--'class'=>'form-control text-right',"value"=>"{{old('description')}}"--}}
                        {{--]) !!}--}}
                        {{--@inject('categories','App\Models\Category')--}}
                        {{--<label for="category_id">اختار التصنيف</label>--}}
                        {{--{!!  Form::select('category_id',$categories->pluck('name','id')->toArray(),null,[--}}
                            {{--'class'=>'form-control text-right'--}}
                        {{--]) !!}--}}

                        {{--<div>--}}
                            {{--<div>--}}
                                {{--<label for="wight">القيمه المضافه للمنتج</label>--}}
                            {{--</div>--}}
                            {{--<div style="display: flex;justify-content: start">--}}
                                {{--{!!  Form::text('tax_price',null,[--}}
                                {{--'class'=>'form-control text-right ',"value"=>"{{old('tax_price')}}","style" =>"width : 15%"--}}
                                {{--]) !!}--}}
                                {{--@if($model->tax_status == 0)--}}
                                    {{--<a href="product/{{$model->id}}/active" class="btn btn-danger btn-sm" style="margin-right: 10px;">تفعيل</a>--}}
                                {{--@else--}}
                                    {{--<a href="product/{{$model->id}}/deactive" class="btn btn-danger btn-sm" style="margin-right: 10px;">فعال</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div style="clear: both;"></div>--}}
                        {{--<label for="Image" class="btn-block">صوره المنتج</label>--}}
                        {{--@if($model->image)--}}
                            {{--<img src="{{ $model->image_url }}" width="100" height="100" style="margin-bottom: 10px"/>--}}
                        {{--@endif--}}
                        {{--<br>--}}
                        {{--{!!  Form::file('image',null,[--}}
                            {{--'class'=>'form-control file_upload_preview '--}}
                        {{--]) !!}--}}


                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<button class="btn btn-primary" type="submit">حفظ</button>--}}
                    {{--</div>--}}
                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
