<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($product_slug){

        $product_check = Product::where('slug',$product_slug)->first();

        if($product_check)
        {
             // ---------- check product is already purchase or not --
             $verified_purchase = Order::where('orders.user_id',Auth::id())
            ->join('order_item','orders.id','order_item.order_id')
            ->where('order_item.product_id',$product_check->id)
            ->get();

            return view('review.index',\compact('product_check','verified_purchase'));
        }
        else
        {
            return \redirect()->back()->with('status','No product found...');
        }

        return $product_check;
    }

    // ------------------- create a review -------------------

    public function create(Request $req){

        $pro_id = $req->product_id;

        $product = Product::where('id',$pro_id)->first();

        if($product)
        {
            $user_review = $req->user_review;

            $new_review = Review::create([
                'user_id' => Auth::id(),
                'product_id' => $pro_id,
                'user_review' => $user_review
            ]);

            $category_slug = $product->category->slug;
            $product_slug = $product->slug;

            if($new_review){
                return redirect('category/'.$category_slug.'/'.$product_slug)->with('status','Thank you writing a review...');
            }
        }
        else
        {
            return \redirect()->back()->with('status','something went wrong ! No product found...');
        }
    }

    // ---------------- edit - review -----------------

    public function edit($pro_slug){

        $product = Product::where('slug',$pro_slug)->first();

        if($product)
        {
            $pro_id = $product->id;
            $review = Review::where('user_id',Auth::id())->where('product_id',$pro_id)->first();
            if($review)
            {
                return view('review.edit',\compact('product','review'));
            }
            else
            {
                return \redirect()->back()->with('status','something went wrong....');
            }
           
        }
        else
        {
            return \redirect()->back()->with('status','something went wrong ! No product found...');
        }
        
    }

    // ----------------- update - review ---------------

    public function update(Request $req){
        $user_review = $req->user_review;

        if($user_review != ''){

            $review_id = $req->review_id;

            $review = Review::where('id',$review_id)->first();

            if($review){
                $review->user_review = $req->user_review;
                $review->update();

                return \redirect('category/'.$review->product->category->slug.'/'.$review->product->slug)->with('status','Review updated successfully');
        
            }




        }else{
            return \redirect()->back()->with('status','You cannot submit a empty review');
        }
    }
}
