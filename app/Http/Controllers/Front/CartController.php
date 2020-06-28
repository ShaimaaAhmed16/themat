<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('front.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->qty ==0){
            if($request->qty1){
                Cart::add($request->id, $request->name,$request->qty1/1000, $request->price, 550 )->associate('App\Models\Product');
                return redirect()->route('index')->with('success_message',trans('lang.Added_basket'));

            }
            flash()->error(trans('lang.choose_weight'));
            return back();
        }
        else{
            if(($request->qty)&&($request->qty1)){
                Cart::add($request->id, $request->name,$request->qty+$request->qty1/1000, $request->price, 550 )->associate('App\Models\Product');
                return redirect()->route('index')->with('success_message',trans('lang.Added_basket'));

            }
            if($request->qty){
                Cart::add($request->id, $request->name,$request->qty, $request->price, 550 )->associate('App\Models\Product');
                return redirect()->route('index')->with('success_message',trans('lang.Added_basket'));
            }
            if($request->qty1){
                Cart::add($request->id, $request->name,$request->qty1/1000, $request->price, 550 )->associate('App\Models\Product');
                return redirect()->route('index')->with('success_message',trans('lang.Added_basket'));

            }
        }

    }

    public function empty(){
        Cart::destroy();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator= $this->validate($request, [
            'quantity' => 'required|numeric|between:1,10',
        ]);
        Cart::update($id, $request->quantity);
//        flash()->message('quantity update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message',trans('lang.deletion_successful'));
    }
}
