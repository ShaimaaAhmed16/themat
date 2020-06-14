@extends('admin.home')
@inject('client','App\Models\Client')
@inject('product','App\Models\Product')
@inject('category','App\Models\Category')
@inject('contact','App\Models\Contact')

@section('page_title')
    لوحه التحكم
@endsection
@section('small_title')
    الاحصائيات
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span >مستخدمين</span>
                        <span class="info-box-number">{{$client->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon"> <i class="fa fa-book"></i></span>

                    <div class="info-box-content">
                        <span >منتجات</span>
                        <span class="info-box-number">{{$product->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon"> <i class="fa fa-align-justify"></i></span>

                    <div class="info-box-content">
                        <span >التصنيف</span>
                        <span class="info-box-number">{{$category->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon"> <i class="fa fa-envelope-square"></i></span>

                    <div class="info-box-content">
                        <span >التواصل بنا</span>
                        <span class="info-box-number">{{$contact->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
    </section>
@endsection
