<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Link::latest()->paginate(6);
        return view('admin.link.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
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
            'ar_country' => 'required',
            'en_country' => 'required',
            'ar_city' => 'required',
            'en_city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'watsUp'=>'required',
        ];
        $messages = [
            'ar_country.required' => 'يرجي كتابه اسم الدوله باللغه العربيه',
            'en_country.required' => 'يرجي كتابه اسم الدوله باللغه الانجليزيه',
            'ar_city.required' => 'يرجي كتابه اسم المدينه باللغه العربيه',
            'en_city.required' => 'يرجي كتابه اسم المدينه باللغه الانجليزيه',
            'phone.required' => 'يرجي كتابه رقم الهاتف',
            'email.required' => 'يرجي كتابه البريد',
            'watsUp.required'=>'يرجي اضافه رقم الوتس '
        ];
        $this->validate($request, $rules, $messages);
        $data = [
            'phone' => $request->phone,
            'email' => $request->email,
            'watsUp' => $request->watsUp,
            'en' => ['country' => $request->en_country,'city' => $request->en_city],
            'ar' => ['country' => $request->ar_country,'city' => $request->ar_city],
        ];

        $record = Link::create($data);

        if ($record->save()){
            flash()->success("تم الاضافه بنجاح");
            return redirect()->route('link.index');
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
        $model = Link::findOrFail($id);
        return view('admin.link.edit', compact('model'));
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
        $record = Link::findOrFail($id);
        $data = [
            'phone' => $request->phone,
            'email' => $request->email,
            'watsUp' => $request->watsUp,
            'en' => ['country' => $request->en_country,'city' => $request->en_city],
            'ar' => ['country' => $request->ar_country,'city' => $request->ar_city],
        ];
        $record->update($data);
        $record->save();
        flash()->success('تم التعديل بنجاح');
        return redirect()->route('link.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Link::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect()->route('link.index');
    }
}
