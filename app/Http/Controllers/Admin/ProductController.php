<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Theme;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index(Request $req)
    {

        $cat_list = Category::all();
        $theme_list = Theme::all();
        $product = Product::when($req->cat_id != null, function ($q) use ($req) {
            return $q->where('category_id', $req->cat_id);
        })
            ->when($req->action != null, function ($q) use ($req) {
                return $q->where($req->action, true);
            })
            ->when($req->themes != null, function ($q) use ($req) {
                return $q->where('themes', $req->themes);
            })
            ->latest()->paginate(10);
        return \view('admin/products/index', \compact('product', 'cat_list', 'theme_list'));
    }

    public function add_product()
    {
        $category = Category::all();
        $theme = Theme::all();

        return view('admin/products/add', \compact('category', 'theme'));
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
                $img_name =  rand(100, 1000000) . '.' . $ext;
                $destinate = 'image/product/';
                $file->move($destinate, $img_name);

                $image[] = $img_name;
            }
        }
        $design = null;
        if ($req->hasFile('design')) {
            $file = $req->file('design');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('image/product/design/', $filename);
            $design = $filename;
        }

        $offer_msg = $req->offer_msg ? $req->offer_msg : 'new';

        $slug = preg_replace('/\s+/i', ' ', trim($req->slug));
        $slug =  strtolower(str_replace(' ', '-', $slug));


        $data = [
            'category_id' => $req->category_id,
            'name' => $req->name,
            'slug' => $slug ?: $req->slug,
            'desc' => $req->desc,
            'original_price' => $req->original_p,
            'selling_price' => $req->selling_p,
            'image' => $image ? \implode(',', $image) : null,
            'quantity' => $req->quantity,
            'colors' =>  $req->colors ? json_encode(explode(",", $req->colors)) : null,
            'type' => $req->product_type,
            'design' => $design ?: null,
            'designType' => $req->designType == true ? true : false,
            'themes' => $req->product_theme,
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

        $data = Product::findOrFail($id);
        $category = Category::all();
        $theme = Theme::all();
        // return $category;
        return  view('admin/products/edit', \compact('data', 'category', 'theme'));
    }

    public function update_product(Request $req, $id)
    {
        $pro = Product::findOrFail($id);
        // return $pro;
        $req->validate([
            'size' => 'required',
        ]);
        $images = array();
        if ($req->hasFile('images')) {
            // ----------- delete old image -----
            $old_img = explode(',', $pro->image);
            foreach ($old_img as $val) {
                $path = 'image/product/' . $val;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            // ---------- insert a new image ------
            if ($files = $req->file('images')) {
                foreach ($files as $file) {
                    $ext = \strtolower($file->getClientOriginalExtension());
                    $img_name =  rand(100, 100000) . '.' . $ext;
                    $destinate = 'image/product/';
                    $file->move($destinate, $img_name);

                    $images[] = $img_name;
                }
                $pro->image = implode(',', $images);
            }
        }

        if ($req->hasFile('design')) {
            $path =  'image/product/design/' . $pro->design;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $req->file('design');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('image/product/design/', $filename);
            $pro->design = $filename;
        }

        $offer_msg = $req->offer_msg ? $req->offer_msg : 'new';
        $slug = preg_replace('/\s+/i', ' ', trim($req->slug));
        $slug =  strtolower(str_replace(' ', '-', $slug));



        // -------------- update a  product data ---------

        $pro->category_id = $req->category_id;
        $pro->name = $req->name;
        $pro->slug = $slug ?: $req->slug;
        $pro->desc = $req->desc;
        $pro->original_price = $req->original_p;
        $pro->selling_price = $req->selling_p;
        $pro->quantity = $req->quantity;
        $pro->colors = $req->colors ? json_encode(explode(",", $req->colors)) : null;
        $pro->type = $req->product_type;
        $pro->themes = $req->product_theme;
        $pro->size_list = \json_encode($req->size);
        $pro->couple_men_size = $req->men_size ? \json_encode($req->men_size) : null;
        $pro->couple_women_size = $req->women_size ? \json_encode($req->women_size) : null;
        $pro->designType = $req->designType  == true ? true : false;
        $pro->status = $req->status  == true ? '1' : '0';
        $pro->trending = $req->trending  == true ? '1' : '0';
        $pro->offer_menu = $req->offer_menu  == true ? '1' : '0';
        $pro->freq_bought = $req->freq_bought  == true ? '1' : '0';
        $pro->offer_msg = $offer_msg;

        $pro->update();


        return \redirect('/products')->with('status', 'Product Updated Successfully');
    }


    public function delete_product($id)
    {

        if ($pro = Product::find($id)) {
            // delete the product from user cart and wishlist
            if (Cart::where('product_id', $id)->exists()) {
                $cartItems = Cart::where('product_id', $id)->get();
                
                foreach ($cartItems as $cartItem) {
                    $cartItem->delete();
                }
            }
            if (Wishlist::where('product_id', $id)->exists()) {
                $wishItems = Wishlist::where('product_id', $id)->get();
                
                foreach ($wishItems as $wishItem) {
                    $wishItem->delete();
                }
            }

            $pro->delete();
            return \redirect('/products')->with('status', 'Product Deleted Successfully');
        } else {
            return \redirect('/products')->with('status', 'No product found!....');
        }
    }


    // -------------delete_selected product  ------------

    public function delete_selected(Request $req)
    {
        // return \response()->json($req->ids);
        $pro_ids = $req->ids;
        if (count($pro_ids) > 0) {

            Cart::where('product_id',$pro_ids)->delete();
            Wishlist::where('product_id',$pro_ids)->delete();

            Product::whereIn('id', $pro_ids)->delete();

            return response()->json([
                'status' => 'Product Deleted Successfully',
                'message' => 'success'
            ]);
        }

        return count($pro_ids);
    }


    // ------------------ Trash Bin --- product --------------

    public function trash_bin()
    {
        $product = Product::onlyTrashed()->paginate(10);

        return view('admin.products.trash', compact('product'));
    }

    public function restore_product($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('trash');
    }

    public function delete_permanent_product($id)
    {

        if ($pro = Product::onlyTrashed()->findOrFail($id)) {

            if ($pro->image) {
                $all_img = explode(',', $pro->image);

                foreach ($all_img as $val) {
                    $path = 'image/product/' . $val;
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
            if ($pro->design) {
                $path = 'image/product/design/' . $pro->design;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            // ---- delete all product in cart page  and fav page 

            if (Cart::where('product_id', $id)->exists()) {
                $cartItems = Cart::where('product_id', $id)->get();
                // Loop through the retrieved items and delete each one
                foreach ($cartItems as $cartItem) {
                    $cartItem->delete();
                }
            }
            if (Wishlist::where('product_id', $id)->exists()) {
                $wishItems = Wishlist::where('product_id', $id)->get();
                // Loop through the retrieved items and delete each one
                foreach ($wishItems as $wishItem) {
                    $wishItem->delete();
                }
            }

            $pro->forceDelete();


            return \redirect()->route('trash')->with('status', 'Product Deleted Successfully');
        } else {
            return \redirect()->route('trash')->with('status', 'No product found!....');
        }
    }
}
