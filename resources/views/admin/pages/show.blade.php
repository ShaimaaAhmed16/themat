@extends('admin.home')
@section('page')
    <a href="{{url(route('page.index'))}}">الصفحات</a>
@endsection
@section('page_title')
    / عرض الصفحه
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
                {!!  Form::open(['action'=>['Dashboard\PageController@show',$record->id],'method'=>'put']) !!}
                <div class="row ">
                    <div class="col-12   order-md-first mt-3 mt-md-0 ">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold">
                                            الاسم الصفحه :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->name}}</p>
                                    </div>


                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold">
                                            محتوي الصفحه :
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="m-0">{{$record->text}}</p>
                                        {{--<p class="m-0">{{\Illuminate\Support\Str::limit(strtolower($record->text), 30) }}</p>--}}
                                    </div>


                                </div>
                            </li>

                            <li class="list-group-item list-group-item-action">
                                <div class="row text-right">
                                    <div class="col-12 col-md-3">
                                        <p class="m-0 font-weight-bold ">
                                              صوره الصفحه :
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
