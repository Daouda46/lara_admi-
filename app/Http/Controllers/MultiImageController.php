<?php

namespace App\Http\Controllers;
use App\Models\MultiImage;
use Illuminate\Http\Request;

class MultiImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
     //Multi image
     public function images(){

        $images = MultiImage::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function store(Request $request){
       

    $image = $request->file('image');
    foreach ((array)$image as $brand_image) {
       
 
    $name_gen = hexdec(uniqid());
    $img_text = strtolower($brand_image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_text;
    $location = 'app/images/';
    $last_img = $location.$img_name;

    $brand_image->move($location,$img_name);

    // $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
    // Image::make($brand_image)->resize(300,200)->save('app/public/'.$name_gen);

    // $last_img = 'app/public/'.$name_gen;

    $brand = new MultiImage();
    
    $brand->image = $last_img;

    $brand->save();
        }
    return redirect()
            ->back()
            ->with('success', 'Le brand à été enrégistrer avec success');
    }
}
