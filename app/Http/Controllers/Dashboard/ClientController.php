<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records =Client::where('first_name', 'like', '%'.$request->name.'%')->latest()->paginate(6);
        return view('admin.client.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
            'first_name' => 'required',
            'second_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:clients',
            'address' => 'required',
            'password' => 'required|min:6',
        ];
        $messages = [
            'first_name.required' => 'يرجي كتابه اسم الاول',
            'second_name.required' => 'يرجي كتابه اسم العائله',
            'phone.required' => 'يرجي كتابه رقم الهاتف',
            'email.required' => 'يرجي كتابه الاميل',
            'address.required' => 'يرجي كتابه العنوان',
            'password.required' => 'يرجي كتابه كلمه السر',

        ];
        $this->validate($request, $rules, $messages);
        $record = Client::create([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 1,
            'password' => Hash::make($request->password),
        ]);
        if($record){
            flash()->success("تم الاضافه بنجاح");
            return redirect()->route('client.index');
        }
        else{
            flash()->error("حدث خطا");
            return redirect()->route('client.index');
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
        $record=Client::findOrFail($id);
        return view('admin.client.show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Client::findOrFail($id);
        return view('admin.client.edit', compact('model'));
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
        $record = Client::findOrFail($id);
        if ($request->has('password')){
            $request->merge(array('password' => bcrypt($request->password)));
            $record->update($request->all());
        }
        else{
            $record->update([

                'password' =>$record->password,
                'first_name' =>   $request->full_name,
                'phone' =>   $request->phone,
                'email' =>   $request->email,
            ]);
        }
        $record->save();
        flash()->success('تم التعديل بنجاح');
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id )
    {
        $record=Client::findOrFail($id);
        $record->delete();
        flash()->success(' تم الحذف بنجاح');
        return redirect()->route('client.index');

    }

    public function active($id){
        $record=Client::findOrFail($id);
        $record->status=1;
        $record->save();
        flash()->success('تم التفعيل بنجاح');
        return redirect()->route('client.index');
    }

    public function deactive($id){
        $record=Client::findOrFail($id);
        $record->status=0;
        $record->save();
        flash()->success(' المستخدم غير مفعل');
        return redirect()->route('client.index');
    }


}
