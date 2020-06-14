@extends('admin.home')
@section('page_title')
   عرض منتجات
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">


                @if(count($records))
                    <div class="row">
                    <div class="table table-responsive">
                        <table class="table table-bordered text-center">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>السعر</th>
                                   <th>اسم المستخدم</th>
                                   <th>عرض</th>
                                   <th>حاله الطلب</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->total}} ر.س</th>
                                        <th>{{optional($record->client)->full_name}}</th>
                                        <th> <a href="{{url(route('order.show',$record->id))}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
                                        </th>
                                        {{--<th>--}}
                                            {{--@if($record->status == "منتظر")--}}
                                                {{--<a href="order/{{$record->id}}/active" class="btn btn-danger btn-xs">منتظر</a>--}}
                                            {{--@else--}}
                                                {{--<a href="order/{{$record->id}}/deactive" class="btn btn-success btn-xs" >مفعل</a>--}}
                                            {{--@endif--}}
                                        {{--</th >--}}
                                        <th>
                                            @if($record->status == 'ملغي')
                                                <button  class="btn btn-danger btn-xs" >تم الغاء الطلب</button>
                                            @else
                                                @if($record->status == 'منتظر')
                                                    <a href="order/{{$record->id}}/canceled" class="btn btn-danger btn-xs">الغاء</a>
                                                    <a href="order/{{$record->id}}/active" class="btn btn-danger btn-xs">منتظر</a>
                                                @else
                                                    <a href="order/{{$record->id}}/deactive" class="btn btn-success btn-xs" >مفعل</a>

                                                    @if($record->status == 'فعال')
                                                        <a  class="btn btn-success btn-xs" >جاري التوصيل</a>
                                                        @if($record->status == 'منتهي')
                                                            <a href="order/{{$record->id}}/finished" class="btn btn-danger btn-xs" >منتظر</a>
                                                        @else
                                                            <a  class="btn btn-success btn-xs" >تم التوصيل</a>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        </th >
                                        <th>
                                            <button class="btn btn-danger" data-catid={{$record->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                        <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-center" id="myModalLabel">تاكيد الحذف</h4>
                                    </div>
                                    {!! Form::open(['action'=>['Dashboard\OrderController@destroy',$record->id],'method'=>'delete']) !!}
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

                        @else
                    <div class="alert alert-danger" role="alert">
                        لايوجد بيانات
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
