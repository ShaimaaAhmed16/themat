<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\activationRequest;
use App\Models\Client;
use App\Models\Order;
use App\Rules\StartWritePhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewRegister(){
        return view('front.register');
    }

    public function checkCodePage()
    {
        return view('front.send-code');
    }

    public function activationPage()
    {
        return view('front.activationPage');
    }

    public function activation(activationRequest $request)
    {
        $user = auth()->guard('client-web')->user();

        if($request->has('pin_code'))
        {
            if($user->pin_code == $request->pin_code)
            {
                $user->update(['status' => 1, 'pin_code' => null]);

                return redirect()->route('index');
            }

            return back()->with('error', trans('lang.activation_code'));
        }

        $code = rand('1111','9999');

        $user->update(['pin_code' => $code]);
        curl_send_jawalsms_message($user->mobile_number, trans('lang.Your_activation').$code);

        return back()->with('success', trans('lang.code_successfully'));
    }

    public function register(Request $request){
        $rules=[
            'first_name'=>'required',
            'second_name'=>'required',
            'address'=>'required',
            'email'=>'required|unique:clients',
            'password'=>'required|confirmed|min:6',
            'phone'=>['required',new StartWritePhone],
        ];
        $messages=[
            'first_name.required'=>trans('lang.first_name'),
            'second_name.required'=>trans('lang.family_name'),
            'address.required'=>trans('lang.neighborhood'),
            'email.required'=>trans('lang.email_correctly'),
            'password.required'=>trans('lang.write_password'),
            'phone.required'=>trans('lang.mobile_number'),
        ];

        $this->validate($request,$rules,$messages);
//        dd($request->all());

        $code = rand('1111','9999');

        $user = Client::create([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'address' => $request->address,
            'email' => $request->email,
            'pin_code' => $code,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        if ($user){
            $send = curl_send_jawalsms_message($user->mobile_number, trans('lang.Your_activation').$code);
            if ($send){
                auth('client-web')->login($user);
                return redirect()->route('activation-page');
           }
           else{
               flash()->error(trans('lang.mobile_number'));
               return back();
           }
        }
        else{
            flash()->error(trans('lang.error_data'));
            return back();
        }
    }

    public function viewLogin(){
        return view('front.login');
    }
    public function login(Request $request){
        $rules=[
            'phone'    => 'required',
            'password' => 'required',
        ];
        $messages=[
            'phone.required'=>trans('lang.phone'),
            'password.required'=>trans('lang.your_password'),
        ];
        $this->validate($request,$rules,$messages);
        $client = Client::where('phone', $request->input('phone'))->first();
        if ($client) {
            if (Auth::guard('client-web')->attempt($request->only('phone', 'password'))) {
                return redirect()->route('index');
            } else {
                flash()->error(trans('lang.error_password'));
                return back();
            }
        }
        flash()->error(trans('lang.error_phone'));
        return back();
    }

    public function resetPassword(){
        return view('front.reset-password');
    }

    public function sendMessage(Request $request)
    {
        $rules=[
            'phone'    => 'required',
        ];
        $messages=[
            'phone.required'=>trans('lang.mobile_number'),
        ];
        $this->validate($request,$rules,$messages);

        $send = Client::where('phone', $request->phone)->first();
        //dd($send);
        if ($send) {
            $code = rand('1111','9999');
            $update = $send->update(['pin_code' => $code]);
            if ($update) {
                //send sms
                curl_send_jawalsms_message($send->mobile_number,  trans('lang.password_reset').$code);
//                Mail::to($send->email)
//                    ->bcc('fruit@gmail.com')
//                    ->send(new ReaetPassword($code));
                flash()->message(trans('lang.check_mobile'));

                return  redirect()->route('checkCode', ['phone' => $request->phone]);
            } else {
                return back()->with('message',trans('lang.Try_again'));
            }
        } else {
            return back()->with('message',trans('lang.Try_again'));
        }
    }

    public function newPassword()
    {
        return view('front.change-password');
    }

    public function checkCode(Request $request){
        $this->validate($request, [
            'pin_code'=>'required',
        ]);
        $user = Client::where('pin_code',$request->pin_code)->first();
        if($user){
//            $user->pin_code = null;
            if($user->save()){
                return redirect()->route('newPassword');
            }
            else{
                flash()->message(trans('lang.error_occurred'));
                return back();
            }
        }
        else{
            flash()->message(trans('lang.code_incorrect'));
            return back();
        }

    }

    public function changePassword(Request $request){
        $rules=[
            'password'=>'required|confirmed',
        ];
        $messages=[
            'password.required'=>trans('lang.write_password'),
        ];
        $this->validate($request,$rules,$messages);

        $user = Client::update(bcrypt($request->password));
        if($user->save()){
            flash()->message(trans('lang.Password_changed'));
            return redirect()->route('login.client');
        }
        else{
            flash()->message(trans('lang.write_password'));
            return back();
        }
    }

    public function viewProfile(Request $request){
        $row = $request->user('client-web');
        return view('front.profileclient',compact('row'));
    }

    public function profile(Request $request)
    {
//        sometimes
        $user = $request->user('client-web');
        if ($request->input('password')){
//            dd('if');
            $request->merge(array('password' => bcrypt($request->password)));
            $user->update($request->except('image'));
            if ($request->hasFile('image')) {
                $path = public_path();
                $destinationPath = $path . '/uploads/image/client'; // upload path
                $logo = $request->file('image');
                $extension = $logo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                $logo->move($destinationPath, $name); // uploading file to given path
                $user->update(['image' => 'uploads/image/client/' . $name]);
            }
        }
        else{
//            dd('else');

            $user->update([

//            'password' =>$user->password,
                'first_name' =>   $request->first_name,
                'second_name' =>   $request->second_name,
                'phone' =>   $request->phone,
                'email' =>   $request->email,
                'address' =>   $request->address,

            ]);
            $user->update($request->except('image'));
            if ($request->hasFile('image')) {
                $path = public_path();
                $destinationPath = $path . '/uploads/image/client'; // upload path
                $logo = $request->file('image');
                $extension = $logo->getClientOriginalExtension(); // getting image extension
                $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                $logo->move($destinationPath, $name); // uploading file to given path
                $user->update(['image' => 'uploads/image/client/' . $name]);
            }
        }
        $user->save();
        if($user){
            flash()->success(trans('lang.modified_successfully'));
            return redirect()->route('index');
        }
        else{
            flash()->error(trans('lang.error_data'));
            return back();
        }
    }

    public function myAccount(Request $request){
        $orders = Order::all();
        $row = $request->user('client-web');
        return view('front.myaccount',compact('row','orders'));
    }




    public function logout()
    {
        auth()->guard('client-web')->logout();
        return redirect()->route('home');
    }

}
