<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Useraddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    // ---------- count cart -------------

    public function count_cart(){
        $count = Cart::where('user_id',Auth::id())->count();
        return \response()->json(['count'=>$count]);
    }

      // ------------------ my cart ------------------------

      public function my_cart(){
        $cart = Cart::where('user_id',Auth::id())->get();
        $category = Cart::join('products', 'carts.product_id', '=', 'products.id')
    ->join('category', 'products.category_id', '=', 'category.id')
    ->where('carts.user_id',Auth::id())
    ->select('category.name','category.slug')
    ->get();

        
        return view('cart.mycart',\compact('cart','category'));
    }
    
 // ---------- add to cart -------------

    public function add_to_cart(Request $req){

        $product_id = $req->pro_id;
        $product_qty = $req->pro_qty;
        $product_size = $req->size;
        $men_size = $req->has('men_size') ? $req->men_size : null ;
        $women_size = $req->has('women_size') ? $req->women_size : null ;

        if(Auth::check()){

            $pro_check = Product::where('id',$product_id)->first();
            if($pro_check){

                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['message'=> 'Already Added to Cart','status'=>'warning']);
                  
                }else{
                    $cart = new Cart();
                    $cart->user_id = Auth::id();
                    $cart->product_id = $product_id;
                    $cart->product_qty = $product_qty;
                    $cart->product_size = $product_size;
                    $cart->mens_size = $men_size;
                    $cart->womens_size = $women_size;
                    $cart->save();

                    return response()->json(['message'=> $pro_check->name.' Added to Cart','status'=>'success']);
                }
             
            }

        }else{
            return response()->json(['message'=> 'Login to Continue...','status'=>'error']);
        }

    

    }


    // --------------------- freq_both_tocart ----------------------

    public function freq_both_tocart(Request $req){
       $pro_id = $req->pro_ids;

       if(Auth::check()){

        if(Cart::where('product_id',$pro_id[1])->where('user_id',Auth::id())->exists()){
            return response()->json(['message'=> 'Already Added to Cart','status'=>'warning']);
        }
        else{
            foreach($pro_id as $val){
               Cart::create([
                   'user_id' => Auth::id(),
                   'product_id'=> $val,
                   'product_qty'=> 1,
                   'product_size'=> 'L',
               ]);
            }
            return response()->json(['message'=> 'Added to Cart Successfully','status'=>'success']);
        }
       }
       else{
        return response()->json(['message'=> 'Login to Continue','status'=>'error']);
       }
    }

  

    // ================== remove - cart ---------------------

    public function remove_cart(Request $req){
        $pro_id = $req->product_id;

        if(Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->exists()){
            $cart = Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->first();
            $cart->delete();
            return \response()->json(['message'=> 'Product remove from cart Successfully','status'=>'success']);
        }

    }

    // ------------------- update - cart quantity ------------

    public function update_cart(Request $req){
        $pro_id = $req->product_id;
        $pro_qty = $req->product_qty;

        if(Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->exists()){
            $cart = Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->first();
            $cart->product_qty = $pro_qty;
            $cart->save();
        }
       
    }

    // ---------------  update a cart size -------------------

    public function update_size(Request $req){
        $pro_id = $req->product_id;
        $pro_size = $req->product_size;

        if(Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->exists()){
            $cart = Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->first();
            $cart->product_size = $pro_size;
            $cart->save();
        }
        return 'success';
    }
    // ---------------  update a cart mens size -------------------

    public function update_men_size(Request $req){
        $pro_id = $req->product_id;
        $pro_size = $req->pro_men_size;

        if(Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->exists()){
            $cart = Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->first();
            $cart->mens_size = $pro_size;
            $cart->save();
        }
        return 'success';
    }
    // ---------------  update a cart womens size -------------------

    public function update_women_size(Request $req){
        $pro_id = $req->product_id;
        $pro_size = $req->pro_women_size;

        if(Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->exists()){
            $cart = Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->first();
            $cart->womens_size = $pro_size;
            $cart->save();
        }
        return 'success';
    }

    // ---------------------- check out ---------------------

    public function check_out(){
       $check_cart =  Cart::where('user_id',Auth::id())->get();
       $user_address = Useraddress::where('user_id',Auth::id())->get();
       $query = "SELECT * FROM states";
       $states = DB::select($query);
        // return $states;
       foreach($check_cart as $item){
            if(!Product::where('id',$item->product_id)->where('quantity','>=',$item->product_qty)->exists()){
                $removeItem = Cart::where('user_id',Auth::id())->where('product_id',$item->product_id)->first();
                $removeItem->delete();
            }
       }

      $cart =  Cart::where('user_id',Auth::id())->get();

       
        return view('cart.checkout',\compact('cart','user_address','states'));
    }
}
