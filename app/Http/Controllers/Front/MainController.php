<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Link;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Page;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function homeClient(){
        return view('front.home-client');
    }


    public function index(Request $request){
        $rows = Product::where(function ($query) use ($request) {
            if ($request->name) {
                $query->whereTranslationLike('name', '%'.$request->name.'%');
            }
            elseif ($request->category_id) {
                $query->where('category_id', $request->category_id);
            }
        })->get();

        $categories =Category::all();
        if(request()->sort == 'low_high') {
            $rows = Product::orderBy('price')->get();
        } elseif (request()->sort == 'high_low') {
            $rows = Product::orderBy('price', 'desc')->get();
        }
        elseif (request()->sort == 'num_of_views') {
            $rows = Product::orderBy('num_of_views', 'desc')->get();
        }

        elseif (request()->sort == 'num_of_orders') {
            $rows = Order::orderBy('num_of_orders', 'desc')->get();
            if ($rows){
                flash()->success('لايوجد بيانات');
                return back();
            }
        }


        return view('front.index' ,compact('rows','categories'));
    }


    public function main(Request $request){
        $categories =Category::all();
        $rows = Product::where('name', 'like', '%'.$request->name.'%')->paginate(8);
//        $rows = Product::where('name', 'like', '%'.$request->name.'%')->paginate(8);
        if(request()->sort == 'low_high') {
            $rows = Product::orderBy('price')->paginate(8);
        } elseif (request()->sort == 'high_low') {
            $rows = Product::orderBy('price', 'desc')->paginate(8);
        }
        elseif (request()->sort == 'num_of_views') {
            $rows = Product::orderBy('num_of_views', 'desc')->paginate(8);
        }

        elseif (request()->sort == 'num_of_orders') {
            $rows = Order::orderBy('num_of_orders', 'desc')->paginate(8);
        }
        else {
            $rows = Product::paginate(8);
        }

        if ($request->category_id) {
            $categories->where('category_id', $request->category_id);
        }

        return view('front.main' ,compact('rows','categories'));
    }
    public function viewContact(){
        $rows =Link::all();
//        dd($rows);
        return view('front.contact',compact('rows'));
    }

    public function contact(Request $request){
        $rules=[
            'name'=>'required',
            'email'=>'required|unique:contacts',
            'phone'=>'required',
            'message'=>'required',
        ];
        $messages=[
            'name.required'=>'يرجي كتابه الاسم بالكامل',
            'email.required'=>'يرجي كتابه البريد الالكتروني بطريقه صحيحه',
            'phone.required'=>'يرجي كتابه رقم الجوال',
            'message.required'=>'يرجي كتابه الرساله ',
        ];
        $this->validate($request,$rules,$messages);
        $user = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,

        ]);
        if ($user){
            return redirect()->route('index');
        }else{
            return back();
        }
    }
    public function viewFilter(){
        return view('front.filter');
    }


    public function detailsProduct($id){
        $row = Product::findOrFail($id);
        $rows = Product::where('price','<=',$row->price)->paginate(2);
        $row->num_of_views +=1;
        $row->update();
        if (Cart::content()){
            foreach (Cart::content() as $item){
                if ($item->id ==$id){
//            return $item;
                    $product_qty = $item->qty;
                    return view('front.details',compact('row','rows','product_qty'));
//                return $product_qty;
                }
                else{
                    $product_qty = 0 ;
                    return view('front.details',compact('row','rows','product_qty'));
                }
            }
        }

        return view('front.details',compact('row','rows'));
//
//        return view('front.details',compact('row','rows'));
    }

    public function about(){
        $abouts=Page::get();
//        where(getTranslation('ar')->name,'من نحن')->first();
        return view('front.about',compact('abouts'));
    }

    public function usePolicy(){
        $policies=Page::get();
//        where('name','سياسه الاستخدام')->orWhere('name','الشروط والاحكام')->first();
        return view('front.use-policy',compact('policies'));
    }

    public function viewMap(){
        return view('front.map');
    }

    public function map(Request $request){
        $rules=[
            'address_details'=>'required',
            'nearby'=>'required',
            'additional_mobile'=>'required',
        ];
        $messages=[
            'address_details.required'=>'يرجي كتابه العنوان بالتفصيل',
            'nearby.required'=>'يرجي كتابه مكان قريب منك',
            'additional_mobile.required'=>'يرجي كتابه رقم الجوال اخر للتواصل مع المندوب',
        ];
        $this->validate($request,$rules,$messages);
        $user=$request->user('client-web');
        $user ->update([
            'address_details' => $request->address_details,
            'nearby' => $request->nearby,
            'additional_mobile' => $request->additional_mobile,

        ]);
        if ($user){
            return redirect()->route('addorder');
//            return back();

        }else{
            flash()->error('يوجد بيانات خطأ يرجي المحاوله مره اخري');
            return back();
        }
    }



    public function myOrder(){
        $orders = Order::all();
//        dd($orders);
        return view('front.orders',compact('orders'));
    }
    public function addOrder(Request $request){
        $order = Order::create([
            'client_id' => auth('client-web')->user()->id,
            'status' => 'منتظر',
            'total' => Cart::total(),
        ]);
        $order->num_of_orders +=1;
        $order->update();
        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }
        Cart::instance('default')->destroy();
        session()->forget('coupon');
//        return back();
//        flash()->success('تم ارسال الطلب ,الطلب في حاله الانتظار ويتم الدفع عند الاستلام');
        return redirect()->route('done');
    }
    public function done(){
        return view('front.done');
    }


}
