<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request){
        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=".Cart::total().
            "&currency=EUR" .
//            "&currency=SAR" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);

        $res = json_decode($responseData, true);

        $view = view('front.ajax.form')->with(['responseData' => $res ])
            ->renderSections();

        return response()->json([
            'status' => true,
            'content' => $view['main']
        ]);
//        return $responseData;
    }



    public function done(){
        if (request('id') && request('resourcePath')) {
            $payment_status = $this->getPaymentStatus(request('id'), request('resourcePath'));
            if (isset($payment_status['id'])) { //success payment id -> transaction bank id
                $showSuccessPaymentMessage = true;

                //save order in orders table with transaction id  = $payment_status['id']
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

                //end save
                return view('front.done')-> with(['success' =>  'تم الدفغ بنجاح']);
            } else {
                $showFailPaymentMessage = true;
                return redirect()->route('map')->with(['fail'  => 'فشلت عملية الدفع']);
            }

        }


    }
    private function getPaymentStatus($id, $resourcepath)
    {
        $url = "https://test.oppwa.com/";
        $url .= $resourcepath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData, true);

    }


}
