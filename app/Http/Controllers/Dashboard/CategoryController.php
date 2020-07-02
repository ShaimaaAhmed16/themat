<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Category::latest()->paginate(6);
        return view('admin.category.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        $rules = [
//            'name' => 'required',
//            'image'=>'required',
//        ];
//        $messages = [
//            'name.required' => 'يرجي كتابه اسم التصنيف',
//            'image.required' => 'يرجي اختيار الصوره بامتداد jpg,png,jpeg',
//        ];
//        $this->validate($request, $rules, $messages);
//
//        $image = $request->file('image');
//        $directionPath = public_path() . '/uploads/image/categories/';
//        $extension = $image->getClientOriginalExtension();
//        $name = rand('11111', '99999') . '.' . $extension;
//        $image->move($directionPath, $name);
//        $record = Category::create($request->all());
//        $record->image = 'uploads/image/categories/' . $name;
//        $record->save();
//
//        flash()->success("تم الاضافه بنجاح");
//        return redirect()->route('category.index');
//    }

    public function store(Request $request)
    {
//dd($request->all());
        $rules = [
            'ar_name' => 'required',
            'en_name' => 'required',
            'image'=>'required',
        ];
        $messages = [
            'ar_name.required' => ' يرجي كتابه اسم التصنيف باللغه العربيه',
            'en_name.required' => 'يرجي كتابه اسم التصنيف بالغه الانجليزيه',
            'image.required' => 'يرجي اختيار الصوره بامتداد jpg,png,jpeg',
        ];

        $this->validate($request, $rules,$messages);

        $image = $request->file('image');
        $directionPath = public_path() . '/uploads/image/categories/';
        $extension = $image->getClientOriginalExtension();
        $name = rand('11111', '99999') . '.' . $extension;
        $image->move($directionPath, $name);
//        $record = Category::create([]); dd($request->all());

//        $rules = [
//            'ar_name' => 'required',
//            'en_name' => 'required',
//            'image'=>'required',
//        ];
////        dd($request->en['name']);
//        $messages = [
//            'ar_name.required' => ' يرجي كتابه اسم التصنيف باللغه العربيه',
//            'en_name.required' => 'يرجي كتابه اسم التصنيف بالغه الانجليزيه',
//            'image.required' => 'يرجي اختيار الصوره بامتداد jpg,png,jpeg',
//        ];
//
//        $this->validate($request, $rules,$messages);
        $data = [
            'image' => $request->image,
            'en' => ['name' => $request->en_name],
            'ar' => ['name' => $request->ar_name],
        ];
//        dd($data);
        $record = Category::create($data);

//        $record = Category::create($request->all());
        $record->image = 'uploads/image/categories/' . $name;
        $record->save();
    if ($record){
        flash()->success("تم الاضافه بنجاح");
        return redirect()->route('category.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Category::findOrFail($id);
        return view('admin.category.edit', compact('model'));
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
        $record = Category::findOrFail($id);
        $data = [
            'en' => ['name' => $request->en_name],
            'ar' => ['name' => $request->ar_name],
        ];
        $record->update($data,$request->except('image'));
        if ($request->hasFile('image')) {
            File::delete('public/uploads/image/categories'.$record->image);
            $path = public_path();
            $destinationPath = $path . '/uploads/image/categories'; // upload path
            $logo = $request->file('image');
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $logo->move($destinationPath, $name); // uploading file to given path
            $record->update(['image' => 'uploads/image/categories/' . $name]);
        }
        $record->save();

        flash()->success('تم التعديل بنجاح');
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Category::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect()->route('category.index');
    }
}
