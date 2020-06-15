@extends('admin.home')
@inject('model','App\Models\Client')
@section('page_title')
    عرض المستخدمين
@endsection
@section('content')
    <!-- Main content -->
    <section class="content ">
        <!-- Default box -->
        <div class="card">
            <div class="row margin-bottom">
                <div class="col-sm-6 ">
                    <a href="{{route('client.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافه مستخدم جديد</a>

                </div>
                <div class="text-right col-sm-6">
                    {!! Form::open(['action'=>'Dashboard\ClientController@index','method'=>'get']) !!}
                    <input type="text" name="name" placeholder="الاسم" class="text-right">
                    <button class="btn btn-primary " type="submit"><i class="fa fa-search"></i> بحث</button>
                    {!! Form::close() !!}

                </div>
            </div>
            <div class="card-body ">
                <div class="mt-3 text-right mb-5">
                    @include('flash::message')
                </div>
                @if(count($records))
                    <div class="table table-responsive">
                        <table class="table table-bordered text-center">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>الاسم</th>
                                   <th>رقم الهاتف</th>
                                   <th>البريد</th>
                                   <th>الصوره</th>
                                   <th>عرض</th>
                                   <th>الحاله</th>
                                   <th>تعديل</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr id="removable{{$record->id}}">
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->first_name.$record->second_name}}</th>
                                        <th>{{$record->phone}}</th>
                                        <th>{{$record->email}}</th>
                                        <th>
                                            @if($record->image)
                                            <img  style="height: 70px;width: 70px;" src="{{asset($record->image)}}" >
                                             @else
                                            <span>لايوجد صوره</span>
                                                @endif
                                        </th>
                                        <th> <a href="{{url(route('client.show',$record->id))}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
                                        </th>
                                        <th>
                                            @if($record->status == 0)
                                                <a href="client/{{$record->id}}/active" class="btn btn-danger btn-xs">منتظر</a>
                                                @else
                                                <a href="client/{{$record->id}}/deactive" class="btn btn-success btn-xs" >مفعل</a>
                                                @endif
                                        </th >
                                        <th>
                                            <a href="{{url(route('client.edit',$record->id))}}" class="btn btn-warning btn-xs" alt="تعديل المنتج"><i class="fa fa-edit"></i></a>
                                        </th >
                                        <th>

                                            <button class="btn btn-danger" data-catid={{$record->id}} data-toggle="modal" data-target="#{{$record->id}}"><i class="fa fa-trash"></i></button>

                                        </th>
                                    </tr>

                                    <div class="modal modal-danger fade" id="{{$record->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="myModalLabel">تاكيد الحذف</h4>
                                                </div>
                                                {!! Form::open(['action'=>['Dashboard\ClientController@destroy',$record->id],'method'=>'delete']) !!}
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
                        لا يوجد مستخدم بهذا الاسم
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
