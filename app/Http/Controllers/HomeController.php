<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Models\User;
use App\Models\Useraddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // ----------- user subscribe -------------

    public function user_subscribe(Request $req){
        // return $req->input('sub-mail');
        $mail = $req->input('sub-mail');

        $check = Subscribe::where('email',$mail)->exists();

        if(!$check){
            $sub = new Subscribe();
            $sub->email = $mail;
            $sub->save();

            return redirect()->back()->with('toast','Success...')->with('text','Thank for your subscription.')->with('type','success');
        }else{
            return redirect()->back()->with('toast','Whoops...')->with('text','Email ID already exists...')->with('type','error');
        }
        

    }

    // ------------  account profile ------------------
    public function user_profile(){
        $addr = Useraddress::where('user_id',Auth::id())->get();
        // return $addr;
        return view('account.profile',compact('addr'));
    }


    public function about_profile(Request $req){
        $req->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|min:4|max:30',
            'mobile' => 'required|numeric|digits:10',
        ]);
        $user = User::find(Auth::id());
        $user->update([
            'name' => $req->name,
            'mobile' => $req->mobile,
        ]);
        
        return redirect()->back()->with('toast','Success...')->with('text','User details changed successfully')->with('type','success');
    }

    // ----------------- change password -----------------

    public function change_pass_profile(Request $req){
        $req->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required','min:8','confirmed'],
        ]);

        $cur_pass = Hash::check($req->current_password,auth()->user()->password);

        if($cur_pass){

            user::findOrFail(Auth::id())->update([
                'password' => Hash::make($req->password)
            ]);

            return redirect()->back()->with('toast','Success...')->with('text','Password Updated successfully')->with('type','success');
        }
        else{
            return redirect()->back()->with('toast','Error !')->with('text','Your current password is incorrect')->with('type','error');
        }
        
    }


    // ------------------- remove address ---------------

    public function remove_addr_profile($id){
        $addr = Useraddress::find($id);
        if($addr){
            $addr->delete();
        }
        return  redirect()->back()->with('toast','Great !')->with('text','User address removed successfully')->with('type','success');
    }

    // -------------- change address -----------------

    public function change_addr_profile(Request $req){
        // return $req->all();
        $addr = Useraddress::find($req->addr_id);
        if($addr){
            $addr->update([
                'status' => 1
            ]);
    
            $addr_bal = Useraddress::where('id','!=',$req->addr_id)->where('user_id',Auth::id())
            ->update([
                'status' => 0
            ]);
        }
      
 
      
        return redirect()->back()->with('toast','Whoa !')->with('text','User address changed successfully')->with('type','success');
    }








}
