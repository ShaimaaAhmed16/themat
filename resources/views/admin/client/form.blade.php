<div class="form-group ">
    <label for="first_name">الاسم الاول  </label>
    {!!  Form::text('first_name',null,[
        'class'=>'form-control text-right',"value"=>"{{old('full_name')}}"
    ]) !!}
    <label for="second_name">اسم العائله </label>
    {!!  Form::text('second_name',null,[
        'class'=>'form-control text-right',"value"=>"{{old('full_name')}}"
    ]) !!}
    <label for="phone">رقم الهاتف</label>
    {!!  Form::text('phone',null,[
        'class'=>'form-control text-right',"value"=>"{{old('phone')}}"
    ]) !!}

    <label for="email">البريد</label>
    {!!  Form::text('email',null,[
        'class'=>'form-control text-right',"value"=>"{{old('email')}}"
    ]) !!}
    <label for="address">الحي </label>
    {!!  Form::text('address',null,[
        'class'=>'form-control text-right',"value"=>"{{old('full_name')}}"
    ]) !!}

    <label for="password">كلمه السر</label>
    <input type="password" name="password" class="form-control text-right" >
</div>

<input type="submit" class="form-control text-center " value="حفظ" style="width:40%;background-color: limegreen ;border-radius: 10px">
{{--<div class="form-group">--}}
    {{--<button class="btn btn-primary" type="submit">حفظ</button>--}}
{{--</div>--}}