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

            return back()->with('error', 'عفوا كود التفعيل غير صحيح');
        }

        $code = rand('1111','9999');

        $user->update(['pin_code' => $code]);

        curl_send_jawalsms_message($user->phone, "كود التفعيل الخاص بك هو $code");

        return back()->with('success', 'تم إرسال الكود بنجاح');
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
            'first_name.required'=>'يرجي كتابه الاسم الاول',
            'second_name.required'=>'يرجي كتابه اسم العائله',
            'address.required'=>'يرجي كتابه اسم الحي',
            'email.required'=>'يرجي كتابه البريد الالكتروني بطريقه صحيحه',
            'password.required'=>'يرجي كتابه كلمه السر لاتقل عن 6احرف',
            'phone.required'=>'يرجي كتابه رقم الجوال********9665',
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
            $send = curl_send_jawalsms_message($request->phone, "كود التفعيل الخاص بك هو $code");
           if ($send){
                auth('client-web')->login($user);
                return redirect()->route('activation-page');
           }
           else{
               flash()->error('يوجد كتابه رقم الجوال بطريقه صحيحه ********9665');
               return back();
           }
        }
        else{
            flash()->error('يوجد خطا في البيانات');
            return back();
        }
    }

    public function viewLogin(){
        return view('front.login');
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
        $client = Client::where('email', $request->input('email'))->first();
        if ($client) {
            if (Auth::guard('client-web')->attempt($request->only('email', 'password'))) {
                return redirect()->route('index');
            } else {
                flash()->error('يوجد خطا في الباسورد او الايميل');
                return back();
            }
        }
        flash()->error('يوجد خطا في الباسورد او الايميل');
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
            'phone.required'=>'يرجي كتابه رقم الجوال بطريقه صحيحه',
        ];
        $this->validate($request,$rules,$messages);

        $send = Client::where('phone', $request->phone)->first();
        //dd($send);
        if ($send) {
            $code = rand('1111','9999');
            $update = $send->update(['pin_code' => $code]);
            if ($update) {
                //send sms
                curl_send_jawalsms_message($request->phone, "كود إعادة تعين كلمة المرور الخاص بك هو $code");
//                Mail::to($send->email)
//                    ->bcc('fruit@gmail.com')
//                    ->send(new ReaetPassword($code));
                flash()->message('تم إرسال الكود بنجاح - برجاء فحص الموبايل');

                return  redirect()->route('checkCode', ['phone' => $request->phone]);
            } else {
                return back()->with('message','حاول مره اخري');
            }
        } else {
            return back()->with('message','حاول مره اخري');
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
            $user->pin_code = null;
            if($user->save()){
                return redirect()->route('newPassword');
            }
            else{
                flash()->message('حدث خطا, حاول مره اخري');
                return back();
            }
        }
        else{
            flash()->message('هذا الكود غير صحيح');
            return back();
        }

    }

    public function changePassword(Request $request){
        $rules=[
            'password'=>'required|confirmed',
        ];
        $messages=[
            'password.required'=>'يرجي كتابه كلمه السر',
        ];
        $this->validate($request,$rules,$messages);

        $user = Client::update(bcrypt($request->password));
        if($user->save()){
            flash()->message('تم تغيير كلمه السر بنجاح');
            return redirect()->route('login.client');
        }
        else{
            flash()->message('لم يتم كتابه كلمه السر بشكل صحيح');
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
            flash()->success('تم تعديل البانات الشخصيه بنجاح');
            return redirect()->route('index');
        }
        else{
            flash()->error('يوجد خطا في البيانات');
            return back();
        }
    }

    public function myAccount(Request $request){
        $orders = Order::all();
        $row = $request->user('client-web');
        return view('front.myaccount',compact('row','orders'));
    }

//    public function redirectToProvider($provider)
//    {
//        return Socialite::driver($provider)->redirect();
//    }
//
//    public function handleProviderCallback($provider)
//    {
//        try
//        {
//            $socialUser = Socialite::driver($provider)->user();
//        }
//        catch(\Exception $e)
//        {
//            return redirect()->route('register');
//        }
//        //check if we have logged provider
//        $socialProvider = Social::where('provider_id',$socialUser->getId())->first();
//        if(!$socialProvider)
//        {
//            //create a new user and provider
//            $user = Client::firstOrCreate(
//                ['email' => $socialUser->getEmail()],
//                ['name' => $socialUser->getName()]
//            );
//
//            $user->socialProviders()->create(
//                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
//            );
//
//        }
//        else
//            $user = $socialProvider->user;
//
//        auth()->guard('client-web')->login($user);
//
//        return redirect()->route('index');
//
//    }


    public function logout()
    {
        auth()->guard('client-web')->logout();
        return redirect()->route('home');
    }

}
