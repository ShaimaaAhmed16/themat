@extends('admin.home')
@section('page')
    <a href="{{url(route('category.index'))}}">التصنيف</a>
@endsection
@section('page_title')
    / عرض الستخدم
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!!  Form::open(['action'=>['Dashboard\ClientController@show',$record->id],'method'=>'put']) !!}
                <div class="row ">
                    <div class="col-12   order-md-first mt-3 mt-md-0 ">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold">
                                            الاسم الاول :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->first_name}}</p>
                                    </div>


                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold">
                                            اسم العائله :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->second_name}}</p>
                                    </div>


                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold">
                                            رقم الهاتف :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->phone}}</p>
                                    </div>


                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold ">
                                            البريد الالكتروني :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->email}}</p>
                                    </div>

                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold ">
                                              صوره المستخدم :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        @if($record->image)
                                            <p class="m-0"><img  style="height: 100px;width: 100px;" src="{{asset('public/'.$record->image)}}" ></p>
                                        @else
                                            <p class="m-0">لايوجد صوره</p>
                                        @endif

                                    </div>


                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row ">
                                    <div class="col-12 col-md-3  text-right">
                                        <p class="m-0 font-weight-bold ">
                                             العنوان :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9 ">
                                        <p class="m-0">{{$record->address}}</p>
                                    </div>

                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row ">
                                    <div class="col-12 col-md-3  text-right">
                                        <p class="m-0 font-weight-bold ">
                                            الحاله :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9 ">
                                        <p class="m-0">{{$record->status?'المستخدم مفعل':'المستخدم غير مفعل'}}</p>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
