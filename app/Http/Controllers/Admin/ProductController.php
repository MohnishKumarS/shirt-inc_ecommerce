<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        $cat_list = Category::all();
        $product = Product::when($req->cat_id != null , function($q) use ($req){
            return $q->where('category_id',$req->cat_id);
        })
        ->when($req->action != null , function($q) use ($req){
            return $q->where($req->action,true);
        })
        ->latest()->paginate(10);
        return \view('admin/products/index', \compact('product','cat_list'));
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin/products/add', \compact('category'));
    }

    public function insert_product(Request $req)
    {

        // return $req->all();

        $req->validate([
            'category_id' => 'required',
            'size' => 'required'
        ]);


        $image = array();

        // return $req->file('image')[1];

        if ($files = $req->file('images')) {
            foreach ($files as $file) {
                $ext = \strtolower($file->getClientOriginalExtension());
                $img_name =  rand(100, 100000) . '.' . $ext;
                $destinate = \public_path('image/product');
                $file->move($destinate, $img_name);

                $image[] = $img_name;
            }
        }

        $offer_msg = $req->offer_msg ? $req->offer_msg : 'new';




        $data = [
            'category_id' => $req->category_id,
            'name' => $req->name,
            'slug' => $req->slug,
            'desc' => $req->desc,
            'original_price' => $req->original_p,
            'selling_price' => $req->selling_p,
            'image' => \implode(',', $image),
            'quantity' => $req->quantity,
            'type' => $req->product_type,
            'size_list' => \json_encode($req->size),
            'couple_men_size' => $req->men_size ? \json_encode($req->men_size) : null,
            'couple_women_size' => $req->women_size ? \json_encode($req->women_size) : null,
            'status' => $req->status  == true ? '1' : '0',
            'trending' => $req->trending  == true ? '1' : '0',
            'offer_menu' => $req->offer_menu  == true ? '1' : '0',
            'freq_bought' => $req->freq_bought  == true ? '1' : '0',
            'offer_msg' => $offer_msg
        ];

        $create = Product::create($data);



        return \redirect('/dashboard')->with('status', 'Product Added Successfully');
    }



    public function edit_product($id)
    {

        $data = Product::find($id);
        $category = Category::all();
        // return $category;
        return  view('admin/products/edit', \compact('data', 'category'));
    }

    public function update_product(Request $req, $id)
    {
        $pro = Product::find($id);
        // return $pro;
        $req->validate([
            'size' => 'required',
        ]);
        $images = array();
        if ($req->hasFile('images')) {
            // ----------- delete old image -----
            $old_img = explode(',', $pro->image);
            foreach ($old_img as $val) {
                $path = \public_path('image/product/'. $val);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            // ---------- insert a new image ------
            if ($files = $req->file('images')) {
                foreach ($files as $file) {
                    $ext = \strtolower($file->getClientOriginalExtension());
                    $img_name =  rand(100, 10000) . '.' . $ext;
                    $destinate = \public_path('image/product');
                    $file->move($destinate, $img_name);
    
                    $images[] = $img_name;
                }
                $pro->image = implode(',',$images);
            }
        }

        $offer_msg = $req->offer_msg ? $req->offer_msg : 'new';




        // -------------- update a  product data ---------

            $pro->category_id = $req->category_id;
            $pro->name = $req->name;
            $pro->slug = $req->slug;
            $pro->desc = $req->desc;
            $pro->original_price = $req->original_p;
            $pro->selling_price = $req->selling_p;
            $pro->quantity = $req->quantity;
            $pro->type = $req->product_type;
            $pro->size_list = \json_encode($req->size);
            $pro->couple_men_size = $req->men_size ? \json_encode($req->men_size) : null;
            $pro->couple_women_size = $req->women_size ? \json_encode($req->women_size) : null;
            $pro->status = $req->status  == true ? '1' : '0';
            $pro->trending = $req->trending  == true ? '1' : '0';
            $pro->offer_menu = $req->offer_menu  == true ? '1' : '0';
            $pro->freq_bought = $req->freq_bought  == true ? '1' : '0';
            $pro->offer_msg = $offer_msg;

            $pro->update();


            return \redirect('/products')->with('status', 'Product Updated Successfully');
    }


    public function delete_product($id){
        $pro = Product::find($id);

        if($pro->image){
            $all_img = explode(',',$pro->image);

            foreach($all_img as $val){
                $path = \public_path('image/product/'.$val);
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            // ---- delete in cart page 
            
            if(Cart::where('product_id',$id)->where('user_id',Auth::id())->exists()){
                $cart = Cart::where('product_id',$id)->where('user_id',Auth::id())->first();
                $cart->delete();
                
            }
           $pro->delete();
        }
        
        return \redirect('/products')->with('status', 'Product Deleted Successfully');
    }
}
