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
//        $this->mainRedirect = 'admin.pages.';
    }

    public function index()
    {
        $pages = Page::latest()->paginate(6);
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'ar_name' => 'required',
            'en_name' => 'required',
            'ar_text' => 'required',
            'en_text' => 'required',
        ];
        $messages = [
            'ar_name.required' => 'يرجي كتابه اسم الصفحه',
            'en_name.required' => 'يرجي كتابه اسم الصفحه',
            'ar_text.required' => 'يرجي كتابه محتوي الصفحه',
            'en_text.required' => 'يرجي كتابه محتوي الصفحه',
        ];
        $this->validate($request, $rules, $messages);
        $data = [
            'en' => ['text' => $request->en_text,'name' => $request->en_name],
            'ar' => ['text' => $request->ar_text,'name' => $request->ar_name],
        ];
        $record = Page::create($data);

//        dd($request->all());

       if ($record->save()){
           flash()->success("تم الاضافه بنجاح");
           return redirect()->route('page.index');
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
        $record=Page::findOrFail($id);
        return view('admin.pages.show',compact('record'));
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
        return view('admin.pages.edit', compact('model'));
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
        $data = [
            'en' => ['text' => $request->en_text,'name' => $request->en_name],
            'ar' => ['text' => $request->ar_text,'name' => $request->ar_name],
        ];
        $record->update($data);

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
