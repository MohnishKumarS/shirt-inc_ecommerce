<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Useraddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Request $req){
        $star = $req->product_rating;
        $pro_id = $req->product_id;

        $product_check = Product::where('id',$pro_id)->first();

        if($product_check){
            // ---------- check product is already purchase or not --
             $verified_purchase = Order::where('orders.user_id',Auth::id())
            ->join('order_item','orders.id','order_item.order_id')
            ->where('order_item.product_id',$pro_id)
            ->exists();

            
            if($verified_purchase){
                $exist_rating = Rating::where('user_id',Auth::id())->where('product_id',$pro_id)->first();
                if($exist_rating)
                {
                    $exist_rating->star_rate =  $star;
                    $exist_rating->update();
                
                }
                else
                {
                    Rating::create([
                        'user_id'=> Auth::id(),
                        'product_id' => $pro_id,
                        'star_rate'=> $star
                    ]);
                }
                return \redirect()->back()->with('status','Thank you for Rating this product...');
            }
            else
            {
                return \redirect()->back()->with('status','You cannot rate this product without purchase');
            }

         
         
        }
        else
        {
            return \redirect()->back()->with('status','No product found...');
        }
       
    }



    // ------------- add_address -------------------

    public function add_address(Request $req){
        // return $req->all();
        // $data = $req->all() + ['user_id' => Auth::id()];
        Useraddress::create([
            'user_id'=>Auth::id(),
            'full_name'=>$req->full_name,
            'address'=>$req->address,
            'landmark'=>$req->landmark,
            'state'=>$req->state,
            'city'=>$req->city,
            'pincode'=>$req->pincode,
            'phone'=>$req->phone,
            'address_type'=>$req->address_type,
            'delivery_instr'=>$req->del_instr,
            'status'=>$req->current_address ? 1 : 0,
          
        ]);

        return \redirect()->back()->with('toast','Great!')->with('text','New Address added...')->with('type','success');
    }

    // -------------- edit - address ------------------

    public function edit_address(Request $req){
        $user_addr = $req->addr_id;
        
       $data =  Useraddress::find($user_addr);

       return \response()->json($data);
    }

     // -------------- update - address ------------------

     public function update_address(Request $req){
        //  return $req->all();
        $addr_id = $req->addr_id;
         Useraddress::where('id',$addr_id)->update([
            'full_name'=>$req->full_name,
            'address'=>$req->address,
            'landmark'=>$req->landmark,
            'state'=>$req->state,
            'city'=>$req->city,
            'pincode'=>$req->pincode,
            'phone'=>$req->phone,
            'address_type'=>$req->address_type,
            'delivery_instr'=>$req->del_instr,
            'status'=>$req->current_address ? 1 : 0,
          
        ]);

        return \redirect()->back()->with('toast','Great!')->with('text','Address Updated Successfully')->with('type','success');

     }

    //  ---------------- delete - address -----------------

    public function delete_address(Request $req){
        // return $req->all();
        $addr_id = $req->addr_id;
        Useraddress::where('id',$addr_id)->delete();

        return \redirect()->back()->with('toast','Great!')->with('text','Address Deleted Successfully')->with('type','success');
    }
}
