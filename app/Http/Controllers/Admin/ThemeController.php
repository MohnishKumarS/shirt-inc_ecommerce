<?php

namespace App\Http\Controllers\Admin;



use App\Models\Theme;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ThemeController extends Controller
{
    public function index(){
        $theme = Theme::all();
       return view('admin.themes.index',compact('theme'));
    }

    public function add_theme(Request $req){

        $data = new Theme();
        $data->name = $req->themes;
        $data->slug = Str::slug($req->slug);
        $data->status = $req->active ? '1' : '0';

        if ($req->hasFile('icon')) {
            $file = $req->file('icon');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(\public_path('image/themes/icon'), $filename);
            $data->icon = $filename;
        }
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(\public_path('image/themes/'), $filename);
            $data->image = $filename;
        }
        if ($req->hasFile('poster')) {
            $file = $req->file('poster');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(\public_path('image/themes/poster'), $filename);
            $data->poster = $filename;
        }

        $data->save();

        return redirect()->back()->with('status','Theme Added successfully');
    }


    public function edit_theme($id){
        $theme = Theme::findOrFail($id);
        return view('admin.themes.edit',compact('theme'));
    }   


    public function update_theme($id,Request $req){

        $theme = Theme::findOrFail($id);

        $theme->name = $req->themes;
        $theme->slug = Str::slug($req->slug);
        if ($req->hasFile('icon')) {
            $path =  'image/themes/icon' . $theme->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $req->file('icon');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('image/themes/icon', $filename);
            $theme->icon = $filename;
        }
        if ($req->hasFile('image')) {
            $path =  'image/themes/' . $theme->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('image/themes/', $filename);
            $theme->image = $filename;
        }
        if ($req->hasFile('poster')) {
            $path =  'image/themes/poster' . $theme->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $req->file('poster');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('image/themes/poster', $filename);
            $theme->poster = $filename;
        }
        $theme->status = $req->active? '1' : '0';
        $theme->save();

        return redirect('/themes-artist')->with('status','Theme Updated successfully');

    }


    public function delete_theme($id){
        $theme = Theme::findOrFail($id);
        if($theme){
            if ($theme->image) {
                $path = 'image/themes/' . $theme->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $theme->delete();
        return redirect()->back()->with('status','Theme Deleted successfully');
        }else{
            return redirect()->back()->with('status','something went wrong');
        }
        
    }
}
