<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Monolog\SignalHandler;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;



class PaymentController extends Controller
{
      // PhonePe Integration
      public function makePhonePePayment(Request $request,$addr_id)
      {
        try {
          Session::put('addr_id',$addr_id);
          // --- total price ---
          $tot_price = Cart::where('user_id',Auth::id())->get();
  
          $total = 0;
          foreach($tot_price as $price){
              $total += $price->product->selling_price * $price->product_qty;
          }
          
            $data = array (
              'merchantId' => 'PGTESTPAYUAT101',
              'merchantTransactionId' => uniqid(),
              'merchantUserId' => 'MUID123',
              'amount' => 1 * 100,
              'redirectUrl' => route('phonepe.payment.callback'),
              'redirectMode' => 'POST',
              'callbackUrl' => route('phonepe.payment.callback'),
              'mobileNumber' => '9999999999',
              'paymentInstrument' => 
              array (
                'type' => 'PAY_PAGE',
              ),
            );
    
            $encode = base64_encode(json_encode($data));
    
            $saltKey = '4c1eba6b-c8a8-44d3-9f8b-fe6402f037f3';
            $saltIndex = 1;
    
            $string = $encode.'/pg/v1/pay'.$saltKey;
            $sha256 = hash('sha256',$string);
    
            $finalXHeader = $sha256.'###'.$saltIndex;
    
            // $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay')
            //         ->withHeader('Content-Type:application/json')
            //         ->withHeader('X-VERIFY:'.$finalXHeader)
            //         ->withData(json_encode(['request' => $encode]))
            //         ->post();
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => json_encode(['request' => $encode]),
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'X-VERIFY: '.$finalXHeader
              ),
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);
    
            $rData = json_decode($response);
  
            if($rData->success){
              // return $rData;
              return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
            }
        } catch (\Exception $th) {
          return redirect('checkout')->with('status',$th->getMessage());
        }
          
          
  
      }
  
      public function phonePeCallback(Request $request)
      {
        
          $input = $request->all();
  
        if($input['code'] == "PAYMENT_SUCCESS"){
          $saltKey = '4c1eba6b-c8a8-44d3-9f8b-fe6402f037f3';
          $saltIndex = 1;
  
          $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;
  
          // $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
          //         ->withHeader('Content-Type:application/json')
          //         ->withHeader('accept:application/json')
          //         ->withHeader('X-VERIFY:'.$finalXHeader)
          //         ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
          //         ->get();
  
          $curl = curl_init();
  
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'accept: application/json',
              'X-VERIFY: '.$finalXHeader,
              'X-MERCHANT-ID: '.$input['transactionId']
            ),
          ));
  
          $response = curl_exec($curl);
  
          curl_close($curl);
          
          $rData = json_decode($response);
          
          // ---- after payment was success ----

          if($rData->success){
          
            // ---- insert a buy product to database 
                    
        $order = new Order();
        $order->user_id = Auth::id();
        $order->address_id =  Session::get('addr_id');
        $order->tracking_no = 'shirt_inc-'.rand(1111,9999);
        $order->payment_mode = $rData->data->paymentInstrument->type;
        $order->payment_id = $response;

        // ----------- to calculate a total price --------------
        $tot_price = Cart::where('user_id',Auth::id())->get();
        $total = 0;
        foreach($tot_price as $price){
            $total += $price->product->selling_price * $price->product_qty;
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
 
     

        return redirect('/order-confirm');
          }


        }
          
         
      }
  
      // Refund API from api
      public function phonePeRefundAPI(Request $req)
      {
      //  return $req->input('trans_Id');  
       $tra_id = $req->trans_Id;

          $payload = [
              'merchantId' => 'PGTESTPAYUAT101',
              'merchantUserId' => 'MUID123',
              'merchantTransactionId' => ($tra_id),
              'originalTransactionId' => strrev($tra_id),
              'amount' => 1 * 100,
              'callbackUrl' => route('phonepe.payment.refund'),
          ];
  
          $encode = base64_encode(json_encode($payload));
  
          $saltKey = '4c1eba6b-c8a8-44d3-9f8b-fe6402f037f3';
          $saltIndex = 1;
  
          $string = $encode.'/pg/v1/refund'.$saltKey;
          $sha256 = hash('sha256',$string);
  
          $finalXHeader = $sha256.'###'.$saltIndex;
  
          // $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/refund')
          //         ->withHeader('Content-Type:application/json')
          //         ->withHeader('X-VERIFY:'.$finalXHeader)
          //         ->withData(json_encode(['request' => $encode]))
          //         ->post();
          
          $curl = curl_init();
  
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/refund',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(['request' => $encode]),
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'X-VERIFY: '.$finalXHeader
            ),
          ));
  
          $response = curl_exec($curl);
  
          curl_close($curl);
  
          $rData = json_decode($response);
  
          // return $rData;
  
          $finalXHeader1 = hash('sha256','/pg/v1/status/'.'PGTESTPAYUAT101'.'/'.$tra_id.$saltKey).'###'.$saltIndex;
  
          // $responsestatus = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.'PGTESTPAYUAT101'.'/'.$tra_id)
          //         ->withHeader('Content-Type:application/json')
          //         ->withHeader('accept:application/json')
          //         ->withHeader('X-VERIFY:'.$finalXHeader1)
          //         ->withHeader('X-MERCHANT-ID:'.$tra_id)
          //         ->get();
  
          $curl = curl_init();
  
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.'PGTESTPAYUAT101'.'/'.$tra_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'accept: application/json',
              'X-VERIFY: '.$finalXHeader1,
              'X-MERCHANT-ID: '.$tra_id
            ),
          ));
  
          $responsestatus = curl_exec($curl);
          $success_data = json_decode($responsestatus);
          curl_close($curl);
          
          // return $success_data;
          dd(json_decode($response),$success_data, $success_data->data->transactionId);
       // dd($rData);
      }

    // -------- razorpay -----
     
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

    //  Session::put('total',100);
    //  Session::put('order_id',$orderId);
    //  Session::put('addr_id',$req->addr_id);
        // return redirect('/checkout')->with('data', $data);
       
        

        // return \response()->json($data);


    }
}
