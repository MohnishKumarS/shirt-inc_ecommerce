<style>
.nav-link.active{
    background-image: linear-gradient(195deg, #EC407A 0%, #D81B60 100%);
}
    </style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-center" href="/" >
        <img src="{{asset('image/shirtinc-logo2.png')}}" width="100"  class="navbar-brand-img " alt="main_logo">
        {{-- <span class="ms-1 font-weight-bold text-white">Shirt-Inc</span> --}}
      </a>
    </div>
    <hr class="horizontal light mt-2 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white  {{Request::is('dashboard')? 'active':''}} " href="{{ url('/dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('category')? 'active':''}}" href="{{ url('category')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">post_add</i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('add-category')? 'active':''}}" href="{{ url('add-category')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Add Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('products')? 'active':''}}" href="{{ url('products')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">inventory</i>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('add-products')? 'active':''}}" href="{{ url('add-products')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">library_add</i>
            </div>
            <span class="nav-link-text ms-1">Add Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('orders')? 'active':''}}" href="{{ url('orders')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">content_paste</i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('themes-artist')? 'active':''}}" href="{{ url('themes-artist')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">smart_toy</i>
            </div>
            <span class="nav-link-text ms-1">Themes</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('slider-image')? 'active':''}}" href="{{ url('slider-image')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">slideshow</i>
            </div>
            <span class="nav-link-text ms-1">Slider Image</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('ads-poster')? 'active':''}}" href="{{ url('ads-poster')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add_a_photo</i>
            </div>
            <span class="nav-link-text ms-1">Ads Poster</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('coupons')? 'active':''}}" href="{{ url('/coupons')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">redeem</i>
            </div>
            <span class="nav-link-text ms-1">Coupons</span>
          </a>
        </li>
 

        {{-- <li class="nav-item">
          <a class="nav-link text-white " href="admin/pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li> --}}
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('users')? 'active':''}}" href="{{ url('users')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person_pin_circle</i>
            
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('admin_view')? 'active':''}}" href="{{ url('admin-view')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">manage_accounts</i>
            
            </div>
            <span class="nav-link-text ms-1">Admin Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('campaign')? 'active':''}}" href="{{ url('campaign')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">campaign</i>
            
            </div>
            <span class="nav-link-text ms-1">
              campaign</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('site-settings')? 'active':''}}" href="{{ url('site-settings')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">settings</i>
            
            </div>
            <span class="nav-link-text ms-1">Site settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('trash')? 'active':''}}" href="{{ url('trash-bin')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">auto_delete</i>
            
            </div>
            <span class="nav-link-text ms-1">Trash</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('logout')}}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
          
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>
      
      </ul>
    </div>
   
  </aside>
  