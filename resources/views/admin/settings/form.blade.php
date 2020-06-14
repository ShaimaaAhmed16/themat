<div class="form-group ">
    <label for="name">اسم التصبيق</label>
    {!!  Form::text('app_name',null,[
        'class'=>'form-control text-right',"placeholder"=>"اسم التصبيق","value"=>"{{old('app_name')}}"
    ]) !!}
    <div class="form-group">
        <label>صوره التطيبق</label>
        <input type="file" class="form-control image " name="image">
        <br>
    @if($setting->image)
        <img src="<?php echo asset($setting->image)?>" style="margin-bottom: 10px" width="100"/>
    @endif

</div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">حفظ</button>
</div>