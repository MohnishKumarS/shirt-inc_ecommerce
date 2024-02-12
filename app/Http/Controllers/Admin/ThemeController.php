<?php

namespace App\Http\Controllers\admin;



use App\Models\Theme;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    public function index(){
        $theme = Theme::all();
       return view('admin.themes.index',compact('theme'));
    }

    public function add_theme(Request $req){

        $data = new Theme();
        $data->theme = $req->themes;
        $data->slug = Str::slug($req->slug);
        $data->status = $req->active ? '1' : '0';

        $data->save();

        return redirect()->back()->with('status','Theme Added successfully');
    }


    public function delete_theme(Theme $id){
        $id->delete();
        return redirect()->back()->with('status','Theme Deleted successfully');
    }
}
