@extends('admin.home')
@section('page_title')
    بيانات التواصل
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="row margin-bottom">
                <div class="col-sm-6 " style="margin-bottom: 10px">
                    <a href="{{url(route('link.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                        اضافه بيانات التواصل
                    </a>
                </div>
            </div>
            <div class="card-body">

                <div class="mt-3 text-right">
                    @include('flash::message')
                </div>

                @if(count($records) >0)
                    <div class="row">
                    <div class="table table-responsive">
                        <table class="table table-bordered text-center">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>اسم الدوله</th>
                                   <th>المدينه</th>
                                   <th>رقم التلفون</th>
                                   <th>البريد</th>
                                   <th>رقم الواتس</th>
                                   <th>تعديل</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->country}}</th>
                                        <th>{{$record->city}}</th>
                                        <th>{{$record->phone}}</th>
                                        <th>{{$record->email}}</th>
                                        <th>
                                            {{$record->watsUp}}
                                        </th>
                                        <th>
                                            <a href="{{url(route('link.edit',$record->id))}}" class="btn btn-warning btn-xs" alt="تعديل "><i class="fa fa-edit"></i></a>
                                        </th >
                                        <th>
                                            <button class="btn btn-danger" data-catid={{$record->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                        </th>
                                    </tr>

                                    <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="myModalLabel">تاكيد الحذف</h4>
                                                </div>
                                                {!! Form::open(['action'=>['Dashboard\LinkController@destroy',$record->id],'method'=>'delete']) !!}

                                                <div class="modal-body">
                                                    <p class="text-center">
                                                        هل انت متاكد من الحذف؟
                                                    </p>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">لا</button>
                                                    <button type="submit" class="btn btn-warning">نعم,حذف</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
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

    <div class="text-center">
        {{$records->render()}}
    </div>
   @endsection
