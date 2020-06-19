<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Product::latest()->paginate(6);
        return view('admin.product.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
//        dd($categories);
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $rules = [
            'ar_name' => 'required',
            'en_name' => 'required',
            'price' => 'required',
            'ar_wight' => 'required',
            'en_wight' => 'required',
            'ar_description' => 'required',
            'en_description' => 'required',
            'category_id' => 'required',
            'image'=>'required',
            'tax_price'=>'required',
//            'image'=>'required|mimes:jpg,png,jpeg',
        ];
        $messages = [
            'ar_name.required' => 'يرجي كتابه اسم المنتج باللغه العربيه',
            'en_name.required' => 'يرجي كتابه اسم المنتج باللغه الانجليزيه',
            'price.required' => 'يرجي كتابه سعر المنتج',
<<<<<<< HEAD
            'ar_wight.required' => 'يرجي كتابه الوزن باللغه العربيه',
            'en_wight.required' => 'يرجي كتابه الوزن باللغه الانجليزيه',
            'ar_description.required' => 'يرجي كتابه تفاصيل المنتج باللغه العربيه',
            'en_description.required' => 'يرجي كتابه تفاصيل المنتج باللغه الانجليزيه',
=======
            'wight.required' => 'يرجي كتابه الوزن',
            'description.required' => 'يرجي كتابه تفاصيل المنتج',
            'tax_price.required' => 'يرجي كتابه القيمه المضافه للمنتج',
>>>>>>> 0fb5e22da4937ec1de123a5135a10e24c5a457a9
            'category_id.required' => 'يرجي اختيار التصنيف',
            'image.required'=>'يرجي اضافه صوره للمنتج'
        ];
        $this->validate($request, $rules, $messages);
//        dd($request->category_id);
        $image = $request->file('image');
        $directionPath = public_path() . '/uploads/image/products/';
        $extension = $image->getClientOriginalExtension();
        $name = rand('11111', '99999') . '.' . $extension;
        $image->move($directionPath, $name);
//        dd($request->all());
        $data = [
            'image' => $request->image,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'en' => ['name' => $request->en_name,'wight' => $request->en_wight,'description' => $request->en_description],
            'ar' => ['name' => $request->ar_name,'wight' => $request->ar_wight,'description' => $request->ar_description],
        ];
        $record = Product::create($data);

        $record->image = 'uploads/image/products/' . $name;
        $record->save();
//            dd($record);

        if ($record){
            flash()->success("تم الاضافه بنجاح");
            return redirect()->route('product.index');
        }
        else{
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $model = Product::findOrFail($id);
        return view('admin.product.edit', compact('model','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Product::findOrFail($id);
        $data = [
            'image' => $request->image,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'en' => ['name' => $request->en_name,'wight' => $request->en_wight,'description' => $request->en_description],
            'ar' => ['name' => $request->ar_name,'wight' => $request->ar_wight,'description' => $request->ar_description],
        ];
        $record->update($data,$request->except('image'));
        if ($request->hasFile('image')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/image/products'; // upload path
            $logo = $request->file('image');
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $logo->move($destinationPath, $name); // uploading file to given path
            $record->update(['image' => 'uploads/image/products/' . $name]);
        }
        $record->save();
        flash()->success('تم التعديل بنجاح');
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Product::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect()->route('product.index');
    }

    public function active($id){
        $record=Product::findOrFail($id);
        $record->tax_status=1;
        $record->save();
        flash()->success('تم التفعيل بنجاح');
        return back();
    }

    public function deactive($id){
        $record=Product::findOrFail($id);
        $record->tax_status=0;
        $record->save();
        flash()->success(' تم الغاء القيمه المضافه ');
        return back();
    }
}
