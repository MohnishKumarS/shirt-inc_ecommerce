<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $req)
    {
        $cat_list = Category::all();
        $category = Category::when($req->cat != null, function ($q) use ($req) {
            return $q->where('slug', $req->cat);
        }, function ($q) {
            $q->latest();
        })

            ->get();

        return view('admin.category.index', \compact('category', 'cat_list'));
    }

    public function add_category()
    {
        return view('admin.category.add');
    }

    public function insert_category(Request $req)
    {
        $cat = new Category();

        if ($req->hasFile('images')) {
            $file = $req->file('images');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('image/category/', $filename);
            $cat->image = $filename;
        }
        if ($req->hasFile('poster')) {
            $file = $req->file('poster');
            $ext = $file->getClientOriginalExtension();
            $fileimg = time() . '.' . $ext;
            $file->move('image/category/', $filename);
            $cat->poster = $fileimg;
        }

        $cat->name = $req->name;
        $cat->slug = $req->slug;
        $cat->desc = $req->desc;
        $cat->product_type = $req->product_type ? \json_encode($req->product_type) : null;
        $cat->status = $req->status == true ? '1' : '0';
        $cat->popular = $req->popular == true ? '1' : '0';
        $cat->meta_title = $req->meta_title;
        $cat->meta_keywords = $req->meta_keywords;
        $cat->meta_desc = $req->meta_desc;

        $cat->save();

        return \redirect('/dashboard')->with('status', 'Category Added Successfully');
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit', \compact('data'));
    }

    public function update_category(Request $req, $id)
    {
        $data = Category::find($id);
        if ($req->hasFile('images')) {
            $path =  'image/category/' . $data->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $req->file('images');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('image/category/', $filename);
            $data->image = $filename;
        }
        if ($req->hasFile('poster')) {
            $path =  'image/category/' . $data->poster;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $req->file('poster');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('image/category/', $filename);
            $data->poster = $filename;
        }

        $data->name = $req->name;
        $data->slug = $req->slug;
        $data->desc = $req->desc;
        $data->status = $req->status == true ? '1' : '0';
        $data->popular = $req->popular == true ? '1' : '0';
        $data->meta_title = $req->meta_title;
        $data->meta_keywords = $req->meta_keywords;
        $data->meta_desc = $req->meta_desc;

        $data->update();

        return \redirect('/dashboard')->with('status', 'Category Updated Successfully');
    }

    public function delete_category($id)
    {


        // ------ delete all products related with this category ----
        $product_check = Product::where('category_id', $id)->exists();
        if ($product_check) {
            $product_all = Product::where('category_id', $id)->get();

            if (count($product_all) > 0) {
                foreach ($product_all as $val) {

                    $img = explode(',', $val->image);
                    if (count($img) > 0) {
                        foreach ($img as $image) {
                            $path = 'image/product/' . $image;

                            if (File::exists($path)) {
                                File::delete($path);
                            }
                        }
                    }
                    // -------- delete all product in cart and wishlist ------

                    Cart::where('product_id', $val->id)->delete();

                    Wishlist::where('product_id', $val->id)->delete();
                }

                // ----- delete all product-------

                $product_all = Product::where('category_id', $id)->delete();
            }
        }


        // ---- delete category  

        // Category::destroy($id);
        $data = Category::find($id);
        // // --- delete category  image -----
        if ($data->image) {
            $path = 'image/category/' . $data->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        if ($data->poster) {
            $path = 'image/category/' . $data->poster;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $data->delete();

        return \redirect('/category')->with('status', 'Category deleted Successfully');
    }
}
