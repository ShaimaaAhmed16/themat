<div class="form-group ">
    <label for="name">اسم التصنيف</label>
    {!!  Form::text('name',null,[
        'class'=>'form-control text-right',"value"=>"{{old('name')}}"
    ]) !!}

</div>
<label for="Image" class="btn-block">صوره القسم</label>
@if($model->image)
    <img src="<?php echo asset('public/'.$model->image)?>" style="margin-bottom: 10px"/>
@endif
<br>
{!!  Form::file('image',null,[
    'class'=>'form-control file_upload_preview '
]) !!}

<div class="form-group " style="margin-top: 10px">
    <button class="btn btn-primary" type="submit">حفظ</button>
</div>