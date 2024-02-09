<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Monolog\SignalHandler;
use Razorpay\Api\Api;
use Razorpay\Api\Payment;
use Razorpay\Api\Errors\SignatureVerificationError;

class OrderController extends Controller
{
    // ----------------  my order  list-----------------

    public function my_order(){
        $order = Order::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(10);
        return view('profile.orders',\compact('order'));
    }

    // ------------------ view my  order --------------
    
    public function view_order($orderid){
        $order = Order::where('id',$orderid)->where('user_id',Auth::id())->first();
        return view('order.view-order',\compact('order'));
    }


    // ----------------- place order -----------------
    // public function place_order(Request $req){


    //     $order = new Order();
    //     $order->user_id = Auth::id();
    //     $order->address_id = $req->addr_id;
    //     $order->tracking_no = 'shirt_inc-'.rand(1111,9999);
    //     $order->payment_mode = $req->payment_mode;
    //     $order->payment_id = $req->payment_id;

    //     // ----------- to calculate a total price --------------
    //     $tot_price = Cart::where('user_id',Auth::id())->get();
    //     $total = 0;
    //     foreach($tot_price as $price){
    //         $total += $price->product->selling_price;
    //     }
    //     $order->total_price = $total;

    //     $order->save();


    //     $cartItem =  Cart::where('user_id',Auth::id())->get();

    //     foreach($cartItem as $item){
    //         $data = [
    //             'order_id' => $order->id,
    //             'product_id'=> $item->product_id,
    //             'quantity' => $item->product_qty,
    //             'price' => $item->product->selling_price,
    //             'size' => $item->product_size,
    //             'mens_size' => $item->mens_size,
    //             'womens_size' => $item->womens_size,
    //         ];

    //         Order_item::create($data);

    //         // ---------- reduce a product quantity ----------------

    //         $product_qty  = Product::where('id', $item->product_id)->first();
            
    //         $product_qty->quantity = $product_qty->quantity - $item->product_qty;
    //         $product_qty->update();
         
    //     }

        
    //     // ---------- delete a cart item -------------
    //     $cartItem =  Cart::where('user_id',Auth::id())->get();
    //     Cart::destroy($cartItem);

    //     if($req->payment_mode == 'Paid By DebitCard'){
    //         return \response()->json(['message'=> 'Order placed successfully','status'=>'success']);
    //     }

    //     // return \redirect('/')->with('status','Order placed successfully');
        
    // }


    // ------ new gateway ------------------
    public function place_order(Request $request){
       $error = "Payment failed";
       $data = $request->all();

       if(count($data) > 0){
     
        // $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        // $user->payment_done = true;
        // $user->razorpay_id = $data['razorpay_payment_id'];

        $api = new Api('rzp_test_gMw9oGZr3d5DEF', 'GnFU8ebvQ191kdbnEruU8isu');
    //   $payment_method =  $api->payment->fetch($data['razorpay_payment_id']);
    //   return $payment_method;

        try{
        $attributes = array(
             'razorpay_signature' => $data['razorpay_signature'],
             'razorpay_payment_id' => $data['razorpay_payment_id'],
             'razorpay_order_id' => $data['razorpay_order_id']
        );
        $order = $api->utility->verifyPaymentSignature($attributes);
        $success = true;
    }catch(SignatureVerificationError $e){

        $succes = false;
        $error = 'Razorpay Error  :' . $e->getMessage();
    }

        
    if($success){
        // $user->save();
              
        $order = new Order();
        $order->user_id = Auth::id();
        $order->address_id =  $data['addr_id'];
        $order->tracking_no = 'shirt_inc-'.rand(1111,9999);
        $order->payment_mode = $data['razorpay_order_id'];
        $order->payment_id = $data['razorpay_payment_id'];

        // ----------- to calculate a total price --------------
        $tot_price = Cart::where('user_id',Auth::id())->get();
        $total = 0;
        foreach($tot_price as $price){
            $total += $price->product->selling_price;
        }
        $order->total_price = $total;
        $order->save();


        $cartItem =  Cart::where('user_id',Auth::id())->get();

        foreach($cartItem as $item){
            $data = [
                'order_id' => $order->id,
                'product_id'=> $item->product_id,
                'quantity' => $item->product_qty,
                'price' => $item->product->selling_price,
                'size' => $item->product_size,
                'mens_size' => $item->mens_size,
                'womens_size' => $item->womens_size,
            ];

            Order_item::create($data);

            // ---------- reduce a product quantity ----------------

            $product_qty  = Product::where('id', $item->product_id)->first();
            
            $product_qty->quantity = $product_qty->quantity - $item->product_qty;
            $product_qty->update();
         
        }

        
        // ---------- delete a cart item -------------
        $cartItem =  Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItem);
        // ---- destroy a session ----
       Session::forget('total');
       Session::forget('addr_id');
     

        return redirect('/my-order');
    }else{
   
        return redirect()->back()->with('status',$error);
    }

      
}
       

    }


}
