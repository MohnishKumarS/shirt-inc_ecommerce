<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Monolog\SignalHandler;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Session;


class PaymentController extends Controller
{
     
    public function payment(Request $req){

        $cartitem = Cart::where('user_id',Auth::id())->get();

        // ----total price ------
        $total = 0;
        foreach($cartitem as $val){
            $total += $val->product->selling_price * $val->product_qty;
        }

        // // ------ create api order id ---
        $api = new Api('rzp_test_gMw9oGZr3d5DEF', 'GnFU8ebvQ191kdbnEruU8isu');
        $order  = $api->order->create(array('receipt' => '123', 'amount' => $total * 100 , 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; 

        $data = [
            'total' => $total,
            'order_id' => $orderId,
            'addr_id' => $req->addr_id
        ];

     Session::put('total',100);
     Session::put('order_id',$orderId);
     Session::put('addr_id',$req->addr_id);
        // return redirect('/checkout')->with('data', $data);
       
        

        // return \response()->json($data);


    }
}
