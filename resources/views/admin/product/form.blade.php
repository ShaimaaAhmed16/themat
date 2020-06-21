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
    <input type="text" name="price" id="price" class="form-control text-right" >
</div>
<div class="form-group">
    <label for="tax_price">القيمه المضافه لهذا المنتج</label>
    <input type="text" name="tax_price" id="tax_price" class="form-control text-right" >
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

