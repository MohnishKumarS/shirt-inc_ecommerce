
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PosterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// ------------------- user controls --------------------

// <!-- ---------------------------------------------
// ^^^^^^^^^^^^^ ~~ login  /// register  ~~  ^^^^^^^^^^^^^^
//  --------------------------------------------- -->

Route::get('acc/signin', [UserController::class,'signIn'])->name('signin');

Route::get('acc/signup', [UserController::class,'signUp'])->name('signup');

// -- /////////////////////////////
//  ------------ home page  ------

Route::get('/',[UserController::class,'index']);

Route::get('/collections',[UserController::class,'category']);

Route::get('/category/{id}',[UserController::class,'view_category']);

Route::get('/category/{cate_slug}/{prod_slug}',[UserController::class,'view_product']);

Route::get('/new-arrival',[UserController::class,'view_new_product']);

// ----------- payment gateway ---------------

Route::post('/proceed-to-pay',[PaymentController::class,'payment']);

// --------------- search  product --------------

Route::get('/product-list',[UserController::class,'search_product_list']);

Route::post('/search-product',[UserController::class,'search_product']);

// ---------------- policy page  -----------------------

Route::get('/cancellation-policy', function () {
   return view('policy.cancellation-policy');
});

Route::view('privacy-policy', 'policy.privacy-policy'); 

Route::view('terms-and-conditions', 'policy.terms-condition'); 

Route::view('return-policy', 'policy.return-policy'); 

Route::view('shipping-and-delivery-policy', 'policy.shipping-and-delivery-policy'); 

// -------------  controls ----------------
   Route::middleware(['auth'])->group(function(){

      Route::get('/my-cart',[CartController::class,'my_cart']);

      Route::get('/checkout',[CartController::class,'check_out']);

      Route::post('/place-order',[OrderController::class,'place_order']);

      Route::get('/my-order',[OrderController::class,'my_order']);

      Route::get('/view-order/{id}',[OrderController::class,'view_order']);

      // ------------ wish list --------------------

      Route::get('/wishlist',[WishlistController::class,'index']);

      // ----------------- add a rating ------------------

      Route::post('/add-rating',[RatingController::class,'rating']);

      // ------------------- add a review ------------------

      Route::get('/add-review/{slug}/user-review',[ReviewController::class,'index']);

      Route::post('/add-review',[ReviewController::class,'create']);

      Route::get('/edit-review/{slug}/user-review',[ReviewController::class,'edit']);

      Route::post('/update-review',[ReviewController::class,'update']);

      // ------------------ add a address -------------------------

      Route::post('/add-address',[RatingController::class,'add_address']);

      Route::post('/edit-address',[RatingController::class,'edit_address']);

      Route::post('/update-address',[RatingController::class,'update_address']);

      Route::post('/delete-address',[RatingController::class,'delete_address']);

    //  -------------------- invoice generate ----------------

   Route::controller(AdminOrderController::class)->group(function(){
      Route::get('invoice/{orderid}','viewInvoice');
      Route::get('invoice/{orderid}/download','downloadInvoice');
   });

   // ----------------- -- account   profile -------------------
   Route::controller(HomeController::class)->group(function(){

      Route::get('/profile','user_profile');

      Route::post('/profile-about','about_profile');

      Route::post('/profile-change-password','change_pass_profile');

      Route::get('/profile-rv-addr/{id}','remove_addr_profile');

      Route::post('/profile-change-addr','change_addr_profile');


   });




   });
      // -------------- add to  Cart  ------------------

   Route::post('/add-to-cart',[CartController::class,'add_to_cart']);

   Route::post('/remove-cart',[CartController::class,'remove_cart']);

   Route::post('/update-cart',[CartController::class,'update_cart']);

   Route::post('/update-size',[CartController::class,'update_size']);

   Route::post('/update-men-size',[CartController::class,'update_men_size']);

   Route::post('/update-women-size',[CartController::class,'update_women_size']);
   
   // ---------------- frequent bought to cart ------------------

   Route::post('/add-both-tocart',[CartController::class,'freq_both_tocart']);

   // --------------  wish list ------------------

   Route::post('/add-to-wishlist',[WishlistController::class,'add_to_wishlist']);

   Route::post('/remove-wishlist',[WishlistController::class,'remove_wishlist']);


   // ------------------- count cart and wishlist ------------

   Route::get('/count-cart',[CartController::class,'count_cart']);

   Route::get('/count-wishlist',[WishlistController::class,'count_wishlist']);





Auth::routes();

// <!-- ---------------------------------------------
// ^^^^^^^^^^^^^ ~~ admin control ~~  ^^^^^^^^^^^^^^
//  --------------------------------------------- -->


 Route::middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard', [AdminController::class,'index']);

    Route::get('/orders',[AdminOrderController::class,'orders']);

    Route::get('order/{id}',[AdminOrderController::class,'view']);

    Route::put('update-order-status/{id}',[AdminOrderController::class,'update_order_status']);

    Route::get('order-history',[AdminOrderController::class,'order_history']);

   //  --- user --

    Route::get('/users',[AdminController::class,'users']);

    Route::get('user/{id}',[AdminController::class,'view_user']);

    Route::post('user-role/{id}',[AdminController::class,'user_role']);

   //  ---- admin profile 

   Route::get('/admin-profile/{id}',[AdminController::class,'admin_profile']);

   Route::get('/admin-view',[AdminController::class,'admin_view']);

   Route::post('/admin-profile-set/{id}',[AdminController::class,'admin_profile_set']);

   Route::post('/admin-profile-password/{id}',[AdminController::class,'admin_profile_password']);

   // ---- trash --

   Route::get('/trash-bin',[AdminController::class,'trash_bin']);

   Route::get('/coupons',[AdminController::class,'coupons']);

   // ----- site settings ---

   Route::get('/site-settings',[SettingController::class,'index']);

   Route::post('/site-setting-store',[SettingController::class,'site_setting_store']);

   // ------- campaign ----

   Route::get('/campaign',[SettingController::class,'campaign']); 

   Route::get('/campaign-users',[SettingController::class,'campaign_users']);

   Route::get('/campaign-users/download',[SettingController::class,'campaign_users_download']);





    // --------------------- category ------------------------

     Route::get('/category',[CategoryController::class,'index']);

     Route::get('/add-category',[CategoryController::class,'add_category']);

     Route::post('/insert-category',[CategoryController::class,'insert_category']);

     Route::get('/edit-category/{id}',[CategoryController::class,'edit_category']);

     Route::post('/update-category/{ids}',[CategoryController::class,'update_category']);

     Route::get('/delete-category/{ids}',[CategoryController::class,'delete_category']);

      // --------------------- products ------------------------

      Route::get('/products',[ProductController::class,'index']);

      Route::get('/add-products',[ProductController::class,'add_product']);

      Route::post('/insert-product',[ProductController::class,'insert_product']);

      Route::get('/edit-product/{id}',[ProductController::class,'edit_product']);

      Route::post('/update-product/{id}',[ProductController::class,'update_product']);

      Route::get('/delete-product/{id}',[ProductController::class,'delete_product']);



      // ---------------------- slider poster adding ---------------

      Route::controller(PosterController::class)->group(function () {
         Route::get('/slider-image','slider_image');

         Route::post('/add-slider-image','add_slider_image');
   
         Route::get('/edit-slider/{id}','edit_slider');
   
         Route::post('/update-slider/{id}','update_slider');
   
         Route::get('/delete-slider/{id}','delete_slider');
      });

     
    
      Route::get('/clear-cache', function() {
         $exitCode = Artisan::call('cache:clear');
         // return what you want
     });
     
 });

 







