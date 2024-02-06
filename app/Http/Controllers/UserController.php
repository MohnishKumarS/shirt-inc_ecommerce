<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // --- login  --- register ----

    public function signUp(){
        return \view('account.register');
    }
    public function signIn(){
        return \view('account.login');
    }

    // ---- home page ----

    public function index(){
        $trending = Product::where("trending",1)->latest('id')->take(12)->get(); 
        $category = Category::orderBy('id','desc')->take(10)->get();
        $popular = Product::where('status',1)->latest('id')->take(9)->get();
        $slider_active = Slider::where('active',1)->latest('id')->take(1)->first();
        $slider = Slider::where('active',0)->latest('id')->take(4)->get();
        $poster = Poster::where('active',1)->latest('id')->take(1)->first();
        // return $slider_active;
        return view('home',\compact('trending',"category","popular",'slider_active','slider','poster'));
    }

   // ------------- view category -----------------------

    public function category(){
        $all_category = Category::orderBy('id','desc')->get();
        // return $all_category;
        return view('category',\compact('all_category'));
    }

    // --------------- view new arrival product ---------------

    public function view_new_product(){
        $new_product = Product::latest()->take(15)->get();
        $category = category::latest()->take(1)->first();
        return view('product.new-arrival',compact('new_product','category'));
    }

    // --------------- womens products -----------------

    public function womens_collections(){
        $womens_collect = Product::where('type','womens')->latest()->get();
        return view('product.womens-product',compact('womens_collect'));
        
        }

    // --------------- mens products -----------------

    public function mens_collections(){
        $mens_collect = Product::where('type','mens')->latest()->get();
        return view('product.mens-product',compact('mens_collect'));

        }

    // --------------- unisex products -----------------

    public function unisex_collections(){
        $unisex_collect = Product::where('type','unisex')->latest()->get();
        return view('product.unisex-product',compact('unisex_collect'));

        }

    // --------------- view all product in search category -----------

    public function view_category($slug,Request $req){
        if(Category::where('slug',$slug)->exists()){
            $all_category = Category::orderBy('id','desc')->get();
            $category = category::where('slug',$slug)->get(); 

            // -----  filter  a product ---------------
           if(isset($_GET['cat_side'])){
            $cat_name = $_GET['cat_side'];
            } ;
           if(isset($_GET['pro_type'])){
            $pro_type = $_GET['pro_type'];
            } ;
           if(isset($_GET['sort_price'])){
            $sort_price = $_GET['sort_price'];
            } ;

           
            if($req->get('cat_side') && $req->get('pro_type') && $req->get('sort_price')){
               
                $cat = Category::where('slug',$cat_name)->first();
                $all_product = Product::orderBy('selling_price',$sort_price)->where('category_id',$cat->id)
                ->where('type',$pro_type)->latest()->paginate(3);
            }
            elseif($req->get('cat_side') && $req->get('pro_type')){

                $cat = Category::where('slug',$cat_name)->first();
                $all_product = Product::where('category_id',$cat->id)->where('type',$pro_type)->latest()->paginate(30);
            }
            elseif($req->get('cat_side') && $req->get('sort_price')){

                $cat = Category::where('slug',$cat_name)->first();
                $all_product = Product::orderBy('selling_price',$sort_price)->where('category_id',$cat->id)
                ->where('type',$pro_type)->latest()->paginate(30);
            }
            elseif($req->get('sort_price') && $req->get('pro_type')){

                $all_product = Product::orderBy('selling_price',$sort_price)->where('type',$pro_type)
                ->where('category_id',$category[0]->id)->latest()->paginate(30);
            }
            elseif($req->get('cat_side')){

                $cat = Category::where('slug',$cat_name)->first();
                $all_product = Product::where('category_id',$cat->id)->latest()->paginate(30);
            }
            elseif($req->has('pro_type')){

                $all_product = Product::where('category_id',$category[0]->id)
                ->where('type',$pro_type)->latest()->paginate(30);
            }
            elseif($req->has('sort_price')){

                $all_product = Product::orderBy('selling_price',$sort_price)
                ->where('category_id',$category[0]->id)->latest()->paginate(30);
            }
            else{
                $all_product = Product::where('category_id',$category[0]->id)->latest()->paginate(30);
            }

           
           return view('product.product',\compact('all_product','all_category','category'));
     

        }else{
            return \redirect('/')->with('status','Category not found 🎁');
        }
       
    }

    // ------------- view product -----------------------

    public function view_product($cat_slug,$pro_slug){
        if(Category::where('slug',$cat_slug)->exists()){

            if(Product::where('slug',$pro_slug)->exists()){
                $category = Category::where('slug',$cat_slug)->first();
                $product = Product::where('slug',$pro_slug)->first();
                $freq_boug = Product::where('freq_bought','1')->latest()->first();
                $related_product = Product::where('category_id',$category->id)
                ->where('slug','!=',$pro_slug)->latest()->take(6)->get();
                $popular_product = Product::where('status',1)->latest()->take(6)->get();
                // return $related_products;

                $rating = Rating::where("product_id",$product->id);
                $rating_sum = Rating::where('product_id',$product->id)->sum('star_rate');
                $user_rate = Rating::where('product_id',$product->id)->where('user_id',Auth::id())->first();
                $review = Review::where('product_id',$product->id)->get();
                if($rating->count() > 0){
                    $rating_value = $rating_sum/$rating->count();
                }else{
                    $rating_value = 0;
                }
               

                return view('product.view-product',\compact('product','freq_boug','related_product','popular_product','rating','rating_value','user_rate','review'));
               
            }else{
            return \redirect('/')->with('status','Product not found 🎁');
        }

        }else{
            return \redirect('/')->with('status','Category not found 🎁');
        }
        

    }


    // --------------------search product ------------------

    public function search_product_list(){
        $product = Product::select('name')->get();
        // return $product;
        $data = [];
        foreach($product as $item){
            $data[] = $item->name;      
        }
        return $data;
       
    }



    public function search_product(Request $req){

        $search = $req->search_item;
        if($search != '')
        {
            $product = Product::where('name','LIKE','%'.$search.'%')->first();

            if($product){
                return \redirect('category/'.$product->category->slug.'/'.$product->slug);
            }else{
                return \redirect()->back()->with('text','Sorry, no results found! Try again....')->with('toast','Oops !')->with('type','error');
            }

         
           
        }
        else
        {
            return \redirect('collections');
        }

        return $search;


    }



    
}
