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
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'wight' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image'=>'required',
            'tax_price'=>'required',
//            'image'=>'required|mimes:jpg,png,jpeg',
        ];
        $messages = [
            'name.required' => 'يرجي كتابه اسم المنتج',
            'price.required' => 'يرجي كتابه سعر المنتج',
            'wight.required' => 'يرجي كتابه الوزن',
            'description.required' => 'يرجي كتابه تفاصيل المنتج',
            'tax_price.required' => 'يرجي كتابه القيمه المضافه للمنتج',
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
        $record = Product::create($request->all());

        $record->image = 'uploads/image/products/' . $name;
        $record->save();
//            dd($record);


        flash()->success("تم الاضافه بنجاح");
        return redirect()->route('product.index');
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
        $model = Product::findOrFail($id);
        return view('admin.product.edit', compact('model'));
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
        $record->update($request->except('image'));
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
