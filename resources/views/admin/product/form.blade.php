<div class="form-group">
    <label for="ar_name">اسم المنتج بالعربي</label>
    <input type="text" name="ar_name" id="ar_name" class="form-control text-right" >
</div>

<div class="form-group">
    <label for="en_name">اسم المنتج بالانجليزيه</label>
    <input type="text" name="en_name" id="en_name" class="form-control text-right" >
</div>

<div class="form-group">
    <label for="ar_wight">وزن المنتج بالعربي</label>
    <input type="text" name="ar_wight" id="ar_wight" class="form-control text-right" >
</div>

<div class="form-group">
    <label for="en_wight">وزن المنتج بالانجليزيه</label>
    <input type="text" name="en_wight" id="en_wight" class="form-control text-right" >
</div>

<div class="form-group">
    <label for="ar_description">تفاصيل المنتج بالعربي</label>
    <input type="text" name="ar_description" id="ar_description" class="form-control text-right" >
</div>

<div class="form-group">
    <label for="en_description">تفاصيل المنتج بالانجليزيه</label>
    <input type="text" name="en_description" id="en_description" class="form-control text-right" >
</div>


<div class="form-group">
    <label for="price">سعر المنتج</label>
<<<<<<< HEAD
    <input type="text" name="price" id="price" class="form-control text-right" >
</div>

<div class="form-group">
    <label for="price">اختار القسم</label>
    <select class="form-control text-right" name="category_id">
        <option>اختار القسم</option>
        @foreach ($categories as $category)
            <option value="{{$category ->getTranslation('ar')->category_id}}">{{$category ->getTranslation('ar')->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="image">صوره المنتج</label>
    <input type="file" name="image" id="image" placeholder="اختار صوره">
</div>

<input type="submit" class="form-control text-center " value="حفظ" style="width:40%;background-color: limegreen ;border-radius: 10px">

=======
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

    <div>
        <label for="wight">القيمه المضافه للمنتج</label>
            {!!  Form::text('tax_price',null,[
            'class'=>'form-control text-right ',"value"=>"{{old('tax_price')}}"
            ]) !!}
    <label for="Image" class="btn-block">صوره المنتج</label>
    @if($model->image)
        <img src="{{ $model->image_url }}" width="100" height="100" style="margin-bottom: 10px"/>
    @endif
    <br>
    {!!  Form::file('image',null,[
        'class'=>'form-control file_upload_preview '
    ]) !!}


</div>

<div class="form-group " style="margin-top: 10px">
    <button class="btn btn-primary" type="submit">حفظ</button>
</div>
</div>
>>>>>>> 0fb5e22da4937ec1de123a5135a10e24c5a457a9
