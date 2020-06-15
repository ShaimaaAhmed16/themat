@extends('admin.home')
@section('page_title')
    الاعدادات
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
                <div class="mt-3 text-right mb-5">
                    @include('flash::message')
                </div>

                @if($setting)
                    <div class="row ">
                    <div class="table table-responsive">
                        <table class="table table-bordered text-center">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>الاسم</th>
                                   <th>صوره</th>
                                   <th>تعديل</th>
                               </tr>
                           </thead>
                            <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>{{$setting->app_name}}</th>
                                        <th><img src="{{asset('public/'.$setting->image)}}" width="70"></th>
                                        <th>
                                            <a href="{{route('setting.edit',$setting->id)}}" class="btn btn-warning btn-xs" alt="تعديل "><i class="fa fa-edit"></i></a>
                                        </th >
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                       لا يوجد بيانات
                    </div>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>


@endsection
