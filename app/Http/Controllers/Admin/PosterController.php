<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;


class PosterController extends Controller
{
      // --------------- slider image --------------

      public function slider_image(){
        $slider = Slider::latest('id')->get();
        return view('admin.slider-img.index',\compact('slider'));
      }
  
      public function add_slider_image(Request $req){
        // return $req->all();
      
        if($file = $req->file('image')){
          $ext = $file->getClientOriginalExtension();
          $img_name = time(). '.' . $ext;
          $destinate = \public_path('image/slider');
          $file->move($destinate,$img_name);
          
        }
  
        Slider::insert([
          'image' => $img_name,
          'timer' => $req->timer,
          'active' => $req->active == true ? '1' : 0
        ]);
  
        return \redirect('/slider-image')->with('status', 'Poster Added Successfully');
      }

      public function edit_slider($id){

        $slider = Slider::find($id);
        return view('admin.slider-img.edit',\compact('slider')); 

      }

      public function update_slider($id,Request $req){
            // return $req->all();
            $slider = Slider::find($id);

            if($req->hasFile('image')){
                $path =  'image/slider/'.$slider->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $req->file('image');
                $img_name = time() . '.'. $file->getClientOriginalExtension();
                $path = \public_path('image/slider');
                $file->move($path,$img_name);

                $slider->image = $img_name;

            }

            $slider->timer = $req->timer;
            $slider->active = $req->active ? 1 : 0;
            $slider->update();

            return \redirect('/slider-image')->with('status','Poster Updated Successfully');

      }


      public function delete_slider($id){
        $slider = Slider::find($id);
        if($slider->image){
            $path =  'image/slider/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }

        $slider->delete();

        return \redirect('/slider-image')->with('status','Poster Delete Successfully');
      
      }
  
}
