<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function viewLogin(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $rules=[
            'email'    => 'required',
            'password' => 'required',
        ];
        $messages=[
            'email.required'=>'يرجي كتابه البريد الالكتروني بطريقه صحيحه',
            'password.required'=>'يرجي كتابه كلمه السر الخاصه بك',
        ];
        $this->validate($request,$rules,$messages);
        $client = User::where('email', $request->input('email'))->first();
        if ($client) {
            if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                auth('admin')->login($client);
                return redirect()->route('dashboard.index');
            } else {
                flash()->error('يوجد خطا في الباسورد او الايميل');
                return back();
            }
        }
        flash()->error('يوجد خطا في الباسورد او الايميل');
        return back();
    }


    public function index()
    {
        $records=User::latest()->paginate(6);
        return view('user.index',compact('records'));
    }

    public function viewProfileUser(){
        return view('admin.profile.profileuser');
    }
    public function profileUser(Request $request){
        $user = $request->user('admin');
        $user ->update($request->all());
        if(  $user ->save()){
            return redirect()->route('dashboard.index');
        }
        else{
            flash()->error('حدث خطا يرجي المحاوله مره اخري ');
            return back();
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login');
    }

    public function changePasswordView()
    {
        return view('admin.change');
    }
    public function changePassword(Request $request)
    {
        $rules=[
            'oldPassword'=>'required',
            'password'=>'required|confirmed',];
        $messages=[
            'oldPassword.required'=>'من فضلك اكتب كلمه السر القديمه',
            'password.required'=>'من فضلك اكتب كلمه السر الجديده',
        ];
        $this->validate($request,$rules,$messages);
        $user= auth()->guard('admin')->user();
//        dd(auth()->guard('admin')->user());
        if(Hash::check($request->oldPassword,$user->password) ){
            $user->password = bcrypt($request->password);
            $user->save();
            flash()->success("تم تغيير كلمه السر");
            return redirect()->route('dashboard.index');
        }
        else{
            flash()->error("كلمه المرور خطا");
            return back();
        }
    }
}
