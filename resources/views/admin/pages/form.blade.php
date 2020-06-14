<div class="form-group ">
    <label for="name">اسم الصفحه</label>
    {!!  Form::text('name',null,[
        'class'=>'form-control text-right',"value"=>"{{old('name')}}"
    ]) !!}
    <label for="name">محتوي الصفحه </label>
    {!!  Form::textarea('text',null,[
        'class'=>'form-control text-right',"value"=>"{{old('text')}}"
    ]) !!}
    <div class="form-group">
        <label>صوره</label>
        <input type="file" class="form-control image " name="image">
        <br>
    @if($model->image)
        <img src="<?php echo asset($model->image)?>" style="margin-bottom: 10px" width="100"/>
    @endif

</div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">حفظ</button>
</div>