<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WHMCS\Module\Addon\ewall_discount_center\Promo;

class WishlistController extends Controller
{

       // ---------- count cart -------------

       public function count_wishlist(){
        $count = Wishlist::where('user_id',Auth::id())->count();
        return \response()->json(['count'=>$count]);
    }

    public function index(){
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        $cat = Wishlist::join('products', 'wishlists.product_id', '=', 'products.id')
        ->join('category', 'products.category_id', '=', 'category.id')
        ->where('wishlists.user_id',Auth::id())
        ->select('category.name','category.slug')
        ->get();
        return view('profile.wishlist',\compact('wishlist','cat'));
    }

    // -----------add_to_wishlist ----------------

    public function add_to_wishlist(Request $req){
        if(Auth::check()){
            $product_id = $req->pro_id;
            $pro_name = Product::where('id',$product_id)->first();
            if(Product::find($product_id)){

                if(Wishlist::where('user_id',Auth::id())->where('product_id', $product_id)->exists()){
                    // return \response()->json(['status'=> $pro_name->name .' Already added ....']);
                    return ['message'=> 'Already added to Favourite','status'=>'warning'];
               

                }
                else{
                    $fav = new Wishlist();
                    $fav->user_id = Auth::id();
                    $fav->product_id = $product_id;
                    $fav->save();
    
                    return  \response()->json(['message'=> $pro_name->name . 'Added to Favourite','status'=>'success','pro_id'=>$product_id]);
                }
              
            }
           

            }
            else
            {
            return \response()->json(['message' => 'Login to continue...','status'=>'error']);
        }
    }

    // --------------------- remove_wislist ----------------------

    public function remove_wishlist(Request $req){

        $product_id = $req->product_id;

        $wish = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

        $wish->delete();

        // return \response()->json(['text'=> 'Product removed Successfully','toast'=>'Success !','type'=>'success']);

        return \response()->json(['message'=>'Product removed Successfully','status'=>'success']);

    }
}
