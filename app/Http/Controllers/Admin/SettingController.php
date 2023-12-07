<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(){
        $set = Setting::first();
        return view('admin.settings.index',compact('set'));
    }

    public function site_setting_store(Request $req){
        
        $set = Setting::first();
        if($set){

            $set->update([
                'website_name'  => $req->web_name,
                'website_url'  => $req->web_url,
                'page_title'  => $req->web_title ,
                'meta_keyword'  => $req->meta_keyword ,
                'meta_description'  => $req->meta_desc ,
                'address1'  => $req->addr1 ,
                'address2'  => $req->addr2 ,
                'phone1'  => $req->mobile1 ,
                'phone2'  => $req->mobile2 ,
                'email1'  => $req->email1 ,
                'email2'  => $req->email2 ,
                'facebook'  => $req->fb ,
                'instagram'  => $req->insta ,
                'youtube'  => $req->youtube ,
                'twitter' => $req->twitter ,
                'promo_status' => $req->promo_ads ? $req->promo_ads : null,
            ]);
            return redirect()->back()->with('status','Site Settings updated successfully');
        }
        else{
            Setting::create([
                'website_name'  => $req->web_name,
                'website_url'  => $req->web_url,
                'page_title'  => $req->web_title ,
                'meta_keyword'  => $req->meta_keyword ,
                'meta_description'  => $req->meta_desc ,
                'address1'  => $req->addr1 ,
                'address2'  => $req->addr2 ,
                'phone1'  => $req->mobile1 ,
                'phone2'  => $req->mobile2 ,
                'email1'  => $req->email1 ,
                'email2'  => $req->email2 ,
                'facebook'  => $req->fb ,
                'instagram'  => $req->insta ,
                'youtube'  => $req->youtube ,
                'twitter' => $req->twitter ,
                'promo_status' => $req->promo_ads ? $req->promo_ads : null,
            ]);
            return redirect()->back()->with('status','Site Settings created successfully');
        }

        
    }



    // -----------campaign----------------------

    public function campaign(){
        return view('admin.invoice.campaign');
    }
    public function campaign_users(){
        $user = User::all();
        return view('admin.invoice.campaign-users',compact('user'));
    }

    public function campaign_users_download(){
        $user = User::all();
        $data = ['user' => $user];
        $todayDate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.invoice.campaign-users', $data);
        return $pdf->download('users-'.$todayDate.'.pdf');
    }
}
