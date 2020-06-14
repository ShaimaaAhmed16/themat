<div class="form-group ">
    <label for="name">اسم المنتج</label>
    {!!  Form::text('name',null,[
        'class'=>'form-control text-right',"value"=>"{{old('name')}}"
    ]) !!}
    <label for="price">سعر المنتج</label>
    {!!  Form::text('price',null,[
        'class'=>'form-control text-right',"value"=>"{{old('price')}}"
    ]) !!}

    <label for="wight">وزن المنتج</label>
    {!!  Form::text('wight',null,[
        'class'=>'form-control text-right',"value"=>"{{old('wight')}}"
    ]) !!}
    <label for="description">تفاصيل المنتج</label>
    {!!  Form::text('description',null,[
        'class'=>'form-control text-right',"value"=>"{{old('description')}}"
    ]) !!}
    @inject('categories','App\Models\Category')
    <label for="category_id">اختار التصنيف</label>
    {!!  Form::select('category_id',$categories->pluck('name','id')->toArray(),null,[
        'class'=>'form-control text-right'
    ]) !!}

    <label for="Image" class="btn-block">صوره المنتج</label>
    @if($model->image)
    <img src="<?php echo asset($model->image)?>" style="margin-bottom: 10px"/>
    @endif
    <br>
    {!!  Form::file('image',null,[
        'class'=>'form-control file_upload_preview '
    ]) !!}


</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">حفظ</button>
</div>