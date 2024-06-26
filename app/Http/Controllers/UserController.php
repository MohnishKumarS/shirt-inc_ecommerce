<?php

namespace App\Http\Controllers;

use App\Models\Theme;
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

    // public function signUp(){
    //     return \view('account.register');
    // }
    // public function signIn(){
    //     return \view('account.login');
    // }

    // ---- home page ----

    public function index(){
        $trending = Product::where("trending",1)->latest('id')->take(12)->get(); 
        $category = Category::orderBy('id','desc')->take(12)->get();
        $popular = Product::where('status',1)->latest('id')->take(9)->get();
        // $slider_active = Slider::where('active',1)->latest('id')->take(1)->first();
        $slider = Slider::where('active',1)->latest('id')->take(3)->get();
        // $poster = Poster::where('active',1)->latest('id')->take(1)->first();
        $theme = Theme::all();
        $design = Product::where('designType',1)->latest()->take(10)->get();
        // return $design;
        return view('home',\compact('trending',"category","popular",'slider','theme','design'));
    }

   // ------------- view category -----------------------

    public function category(){
        $all_category = Category::orderBy('id','desc')->get();
        $categoryPoster = Category::where('poster','!=','')->where('popular','1')->latest()->get();
        // return $categoryPoster;
        return view('category',\compact('all_category','categoryPoster'));
    }

    // ------------- view themes -------------------
    public function view_themes(){
        $themes = Theme::orderBy('id','desc')->get();
        $themePoster = Theme::where('poster','!=','')->where('status','1')->latest()->get();
        return view('themes',\compact('themes','themePoster'));
    }

    // ---------   themes collections --------------

    public function theme_collections($theme_slug, Request $req){

        if($theme = Theme::where('slug',$theme_slug)->exists()){
            $theme = Theme::where('slug',$theme_slug)->first();
            $all_category = Category::orderBy('id','desc')->get();
            $all_themes = Theme::all();
        //   return   $themeProduct = Product::where('themes','All Superheroes')->latest()->paginate(15);

                        // -----  filter  a product ---------------    
   
        $themeProduct = Product::latest();
    
        if ($req->has('sort_price')) {
            $themeProduct = Product::orderBy('selling_price', $req->get('sort_price'));
        }
        if($req->has('theme_type')) {
            $themeProduct->where('themes',$req->get('theme_type'));
        }else{
            $themeProduct->where('themes',$theme->slug);
        }
        if ($req->has('cat_type')) {
            $cat =  Category::where('slug',$req->get('cat_type'))->first();
            $themeProduct->where('category_id', $cat->id);
        }
    
        if ($req->has('pro_type')) {
            $themeProduct->where('type', $req->get('pro_type'));
        }
    
    
        $themeProduct = $themeProduct->paginate(20);
            return view('product.themes-product',\compact('themeProduct','all_category','all_themes','theme'));
        }
     
    }

    // --------------- view new arrival product ---------------

    public function view_new_product(){
        $new_product = Product::latest()->take(15)->paginate(10);
        $category = category::latest()->take(1)->first();
        $themes = Theme::latest()->get();
        return view('product.new-arrival',compact('new_product','category','themes'));
    }

    // --------------- womens products -----------------

    public function womens_collections(){
        $womens_collect = Product::where('type','womens')->latest()->paginate(10);
        $themes = Theme::latest()->get();
        return view('product.womens-product',compact('womens_collect','themes'));
        
        }

    // --------------- mens products -----------------

    public function mens_collections(){
        $mens_collect = Product::where('type','mens')->latest()->paginate(10);
        $themes = Theme::latest()->get();
        return view('product.mens-product',compact('mens_collect','themes'));

        }

    // --------------- unisex products -----------------

    public function unisex_collections(){
        $unisex_collect = Product::where('type','unisex')->latest()->paginate(10);
        $themes = Theme::latest()->get();
        return view('product.unisex-product',compact('unisex_collect','themes'));

        }

    // --------------- view all product in search category -----------

    public function view_category($cat_slug,Request $req){
        if(Category::where('slug',$cat_slug)->exists()){
            $all_category = Category::orderBy('id','desc')->get();
            $all_themes = Theme::all();
            $category = category::where('slug',$cat_slug)->first(); 

            // -----  filter  a product ---------------    
   
        $all_product = Product::latest();
    
    if ($req->has('sort_price')) {
        $all_product = Product::orderBy('selling_price', $req->get('sort_price'));
    }
    if($req->has('theme_type')) {
        $all_product->where('themes',$req->get('theme_type'));
    }
    if ($req->has('cat_type')) {
        $cat =  Category::where('slug',$req->get('cat_type'))->first();
        $all_product->where('category_id', $cat->id);
    }else{
         $all_product->where('category_id', $category->id);
    }

    if ($req->has('pro_type')) {
        $all_product->where('type', $req->get('pro_type'));
    }


    $all_product = $all_product->paginate(20);
    // return $all_product;
           
           return view('product.product',\compact('all_product','all_category','category','all_themes'));
     

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
               
                // return $product;

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
