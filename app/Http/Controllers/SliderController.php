<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function index(){

        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){

        return view('admin.slider.create');
    }

    public function store(Request $request){
        
        $ValidateDate = $request->validate([
            // 'brand_name'=>'required|unique:brands|max:225',
            'image'=>'required|mimes:jpeg,jpg,png',
        ],
        [
            // 'brand_name.required'=>'Ce champs ne doit pas être vide',
            'image.min'=>'La longueur doit être superieure à 4 quatre caractères',
        ]
    );

    $slider_image = $request->file('image');
    $name_gen = hexdec(uniqid());
    $img_text = strtolower($slider_image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_text;
    $location = 'app/sliders/';
    $last_img = $location.$img_name;

    $slider_image->move($location,$img_name);

    $slider = new Slider();
    $slider->title = $request->title;
    $slider->description = $request->description;
    $slider->image = $last_img;

    $slider->save();

    return redirect()
            ->route('home-slider')
            ->with('success', 'Le Slider à été enrégistrer avec success');
}

public function edit($id){

    $slider = Slider::find($id);
    // dd($slider);
    return view("admin.slider.edit", compact('slider'));
}

public function update(Request $request, $id){
    

    $old_image = $request->old_image;
    $slider_image = $request->file('image');
    if ($slider_image) {
        $name_gen = hexdec(uniqid());
        $img_text = strtolower($slider_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_text;
        $location = 'app/sliders/';
        $last_img = $location.$img_name;
        
        $slider_image->move($location,$img_name);
        unlink($old_image);

        $update = Slider::find($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->image = $last_img;

        $update->update();
        
        return redirect()->back()->with('success', 'Le slider à été modifizer avec success');
    }
    else{
        
        $update = Slider::find($id);
        $update->title = $request->title;
        $update->description = $request->description;
        

        $update->update();
        
        return redirect()->back()->with('success', 'Le slider à été modifizer avec success');
        }

}

    public function delete($id){

        $delete = Slider::find($id);
        $old_image = $delete->image;

        unlink($old_image);
        $delete->delete();

        return redirect()->back()->with('message', 'Le slider à été supprimer avec success');
    }

}
