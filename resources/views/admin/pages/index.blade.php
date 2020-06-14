@extends('admin.home')
@section('page_title')
    الصفحات
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div  style="margin-bottom: 10px">
                <a href="{{url(route('page.create'))}}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i>  اضافه جديده </a>
            </div>
                <div class="mt-3 text-right mb-5">
                    @include('flash::message')
                </div>

                @if(count($pages))
                    <div class="row ">
                    <div class="table table-responsive">
                        <table class="table table-bordered text-center">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>الاسم</th>
                                   <th>محتوي الصفحه</th>
                                   <th>صوره</th>
                                   <th>عرض</th>
                                   <th>تعديل</th>
                                   <th>حذف</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$page->name}}</th>
                                        <th>{{\Illuminate\Support\Str::limit(strtolower($page->text), 50)}}</th>
                                        <th>
                                            @if($page->image)
                                            <img src="{{asset($page->image)}}" width="70">
                                                @else
                                                <span>لايوجد صوره</span>
                                            @endif
                                        </th>
                                        <th>
                                            <a href="{{url(route('page.show',$page->id))}}" class="btn btn-warning btn-xs" alt="عرض "><i class="fa fa-eye"></i></a>
                                        </th >
                                        <th>
                                            <a href="{{url(route('page.edit',$page->id))}}" class="btn btn-warning btn-xs" alt="تعديل "><i class="fa fa-edit"></i></a>
                                        </th >
                                        <th>
                                            <button class="btn btn-danger" data-catid={{$page->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                            {{--{!! Form::open(['action'=>['Admin\CategoryController@destroy',$record->id],'method'=>'delete']) !!}--}}
                                            {{--<button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>--}}
                                            {{--{!! Form::close() !!}--}}
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
                                    {!! Form::open(['action'=>['Dashboard\PageController@destroy',$page->id],'method'=>'delete']) !!}
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
        {{$pages->render()}}
    </div>

@endsection
