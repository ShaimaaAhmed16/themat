<div class="form-group">
    <label for="oldPassword">كلمه السر القديمه</label>
    {!!  Form::password('oldPassword',[
        'class'=>'form-control'
    ]) !!}
    <label for="password">كلمه السر الجديده</label>
    {!!  Form::password('password',[
        'class'=>'form-control'
    ]) !!}
    <label for="confirmed">تاكيد كلمه السر</label>
    {!!  Form::password('password_confirmation',[
        'class'=>'form-control'
    ]) !!}
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">تغيير كلمه السر</button>
</div>