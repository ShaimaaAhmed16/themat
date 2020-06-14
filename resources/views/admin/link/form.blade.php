<div class="form-group ">
    <label for="country">اسم الدوله  </label>
    {!!  Form::text('country',null,[
        'class'=>'form-control text-right',"value"=>"{{old('country')}}"
    ]) !!}
    <label for="city">اسم المدينه  </label>
    {!!  Form::text('city',null,[
        'class'=>'form-control text-right',"value"=>"{{old('city')}}"
    ]) !!}
    <label for="phone">رقم الهاتف</label>
    {!!  Form::text('phone',null,[
        'class'=>'form-control text-right',"value"=>"{{old('phone')}}"
    ]) !!}

    <label for="email">البريد</label>
    {!!  Form::text('email',null,[
        'class'=>'form-control text-right',"value"=>"{{old('email')}}"
    ]) !!}
    <label for="watsUp" class="btn-block">رفم الواتس</label>
    {!!  Form::text('watsUp',null,[
        'class'=>'form-control text-right',"value"=>"{{old('watsUp')}}"
    ]) !!}


</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">حفظ</button>
</div>