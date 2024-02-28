<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;


class PosterController extends Controller
{
  // --------------- slider image --------------

  public function slider_image()
  {
    $slider = Slider::latest('id')->get();
    return view('admin.slider-img.index', \compact('slider'));
  }

  public function add_slider_image(Request $req)
  {
    // return $req->all();

    if ($file = $req->file('image')) {
      $ext = $file->getClientOriginalExtension();
      $img_name = time() . '.' . $ext;
      $destinate = 'image/slider';
      $file->move($destinate, $img_name);
    }

    Slider::insert([
      'image' => $img_name,
      'timer' => $req->timer,
      'active' => $req->active == true ? '1' : 0
    ]);

    return \redirect('/slider-image')->with('status', 'Poster Added Successfully');
  }

  public function edit_slider($id)
  {

    $slider = Slider::find($id);
    return view('admin.slider-img.edit', \compact('slider'));
  }

  public function update_slider($id, Request $req)
  {
    // return $req->all();
    $slider = Slider::find($id);

    if ($req->hasFile('image')) {
      $path =  'image/slider/' . $slider->image;
      if (File::exists($path)) {
        File::delete($path);
      }
      $file = $req->file('image');
      $img_name = time() . '.' . $file->getClientOriginalExtension();
      $path = 'image/slider';
      $file->move($path, $img_name);

      $slider->image = $img_name;
    }

    $slider->timer = $req->timer;
    $slider->active = $req->active ? 1 : 0;
    $slider->update();

    return \redirect('/slider-image')->with('status', 'Poster Updated Successfully');
  }


  public function delete_slider($id)
  {
    $slider = Slider::find($id);
    if ($slider->image) {
      $path =  'image/slider/' . $slider->image;
      if (File::exists($path)) {
        File::delete($path);
      }
    }

    $slider->delete();

    return \redirect('/slider-image')->with('status', 'Poster Deleted Successfully');
  }
  // ------------------------------------
  // ----------- ads poster -------------
  // ------------------------------------
  public function ads_poster()
  {
    $poster = Poster::latest('id')->get();
    return view('admin.ads-poster.index', compact('poster'));
  }


  public function add_poster_ads(Request $req)
  {
    // return $req->all();

    if ($req->hasFile('image')) {
      $file = $req->file('image');
      $img_name = time() . '.' . $file->getClientOriginalExtension();
      $path = 'image/Ads-poster';
      $file->move($path, $img_name);
    }

    Poster::insert([
      'title' => $req->ads_title,
      'desc' => $req->ads_desc,
      'image' => $img_name,
      'active' => $req->active == true ? true : false
    ]);

    return redirect()->back()->with('status', 'Ads Poster created successfully');
  }

  public function edit_poster($id)
  {

    $poster = Poster::find($id);
    // return $poster;
    return view('admin.ads-poster.edit', \compact('poster'));
  }

  public function update_poster(request $req, $id)
  {
    // return $req->all();
    $poster = Poster::find($id);

    if ($req->hasFile('image')) {
      $path =  'image/Ads-poster/' . $poster->image;
      if (File::exists($path)) {
        File::delete($path);
      }
      $file = $req->file('image');
      $img_name = time() . '.' . $file->getClientOriginalExtension();
      $path = 'image/poster';
      $file->move($path, $img_name);

      $poster->image = $img_name;
    }

    $poster->title = $req->title;
    $poster->desc = $req->desc;
    $poster->active = $req->active ? 1 : 0;
    $poster->update();

    return \redirect('ads-poster')->with('status', 'Ads Poster Updated Successfully');
  }


  public function delete_poster($id)
  {
    $poster = Poster::find($id);
    if ($poster->image) {
      $path =  'image/Ads-poster/' . $poster->image;
      if (File::exists($path)) {
        File::delete($path);
      }
    }

    $poster->delete();

    return \redirect('/ads-poster')->with('status', 'Ads Poster Deleted Successfully');
  }
}
