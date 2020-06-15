<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
//        $this->mainRedirect = 'admin.Pages.';
    }

    public function index()
    {
        $pages = Page::latest()->paginate(6);
        return view('admin.Pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pages.create');
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
            'text' => 'required',
            'image' => 'sometimes',
        ];
        $messages = [
            'name.required' => 'يرجي كتابه اسم الصفحه',
            'text.required' => 'يرجي كتابه محتوي الصفحه',
            'image.sometimes' => 'تحميل صوره الصفحه',
        ];
        $this->validate($request, $rules, $messages);
        if ($request->image != null){
            $image = $request->file('image');
            $directionPath = public_path() . '/uploads/image/pages/';
            $extension = $image->getClientOriginalExtension();
            $name = rand('11111', '99999') . '.' . $extension;
            $image->move($directionPath, $name);
            $record = Page::create($request->all());
            $record->image = 'uploads/image/pages/' . $name;
            $record->save();
//        dd($request->all());

        }
        else{
            $record = Page::create($request->all());
            $record->save();
        }
        flash()->success("تم الاضافه بنجاح");
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record=Page::findOrFail($id);
        return view('admin.Pages.show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $model = Page::findOrFail($id);
        return view('admin.Pages.edit', compact('model'));
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
        $record = Page::findOrFail($id);
        $record->update($request->except('image'));
        if ($request->hasFile('image')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/image/pages'; // upload path
            $logo = $request->file('image');
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $logo->move($destinationPath, $name); // uploading file to given path
            $record->update(['image' => 'uploads/image/pages/' . $name]);
        }
        $record->save();
        flash()->success('تم التعديل بنجاح');
        return redirect()->route('page.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Page::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect()->route('page.index');
    }
}
