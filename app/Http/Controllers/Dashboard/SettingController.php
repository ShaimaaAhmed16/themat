<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->mainRedirect = 'admin.settings.';
    }

    public function index()
    {
        $setting = Setting::find(1);
        return view($this->mainRedirect .'index', compact('setting'));
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view($this->mainRedirect .'edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $record = Setting::findOrFail($id);
        $record->update($request->except('image'));
        if ($request->hasFile('image')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/image/settings'; // upload path
            $logo = $request->file('image');
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $logo->move($destinationPath, $name); // uploading file to given path
            $record->update(['image' => 'uploads/image/settings/' . $name]);
        }
        $record->save();
        flash()->success('تم التعديل بنجاح');
        return redirect()->route('setting.index');
    }


}
