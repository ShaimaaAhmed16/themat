<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Order::latest()->paginate(6);
        return view('admin.order.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record=Order::findOrFail($id);
        return view('admin.order.show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Order::findOrFail($id);
        $row = $record->delete();
        if ($row) {
            $record->update([
                $record->status => 'ملغي'
            ]);
            flash()->success('تم الحذف بنجاح');
            return redirect()->route('order.index');
        }
        else{
            flash()->success(' لم يتم الحذف بنجاح ');
            return redirect()->route('order.index');
        }

    }

    public function active($id){
        $record=Order::findOrFail($id);
        $record->status	 = "فعال";
        $record->save();
        flash()->success('تم التفعيل بنجاح');
        return redirect()->route('order.index');
    }

    public function deactive($id){
        $record=Order::findOrFail($id);
        $record->status='منتظر';
        $record->save();
        flash()->success(' المستخدم غير مفعل');
        return redirect()->route('order.index');
    }


    public function finish($id){
        $record=Order::findOrFail($id);
        $record->status='منتهي';
        $record->save();
        flash()->success('تم التفعيل بنجاح');
        return redirect()->route('order.index');
    }
    public function canceled($id){
        $record=Order::findOrFail($id);
        $record->status='ملغي';
        $record->save();
        flash()->success('تم الغاء الطلب');
        return redirect()->route('order.index');
    }
}
