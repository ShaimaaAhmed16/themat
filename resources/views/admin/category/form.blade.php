<div class="form-group">
    <label for="ar[name]">الاسم بالعربي</label>
    <input type="text" name="ar_name" id="ar[name]" class="form-control text-right" >
           {{--value="{{ isset($model) ? $model->getTranslation('ar')->name : '' }}">--}}
</div>

<div class="form-group">
    <label for="en[name]">الاسم بالانجليزيه</label>
    <input type="text" name="en_name" id="en[name]" class="form-control text-right" >
           {{--value="{{ isset($model) ? $model->getTranslation('en')->name: '' }}">--}}
</div>

<div class="form-group">
    <label for="image">صوره القسم</label>
    <input type="file" name="image" id="image" placeholder="اختار صوره">
</div>

<input type="submit" class="form-control text-center " value="حفظ" style="width:40%;background-color: limegreen ;border-radius: 10px">


