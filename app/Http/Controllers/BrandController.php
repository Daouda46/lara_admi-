<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
class BrandController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $brands = Brand::latest()->paginate(3);
        return view('admin.brand.index', compact('brands'));
    }

    public function BrandStore(Request $request){
        
            $ValidateDate = $request->validate([
                'brand_name'=>'required|unique:brands|max:225',
                'brand_image'=>'required|mimes:jpeg,jpg,png',
            ],
            [
                'brand_name.required'=>'Ce champs ne doit pas être vide',
                'brand_image.min'=>'La longueur doit être superieure à 4 quatre caractères',
            ]
        );

        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_text = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_text;
        $location = 'app/public/';
        $last_img = $location.$img_name;

        $brand_image->move($location,$img_name);

        // $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        // Image::make($brand_image)->resize(300,200)->save('app/public/'.$name_gen);

        // $last_img = 'app/public/'.$name_gen;

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $last_img;

        $brand->save();

        return redirect()
                ->back()
                ->with('success', 'Le brand à été enrégistrer avec success');
    }

    public function BrandEdit($id){

        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function BrandUpdate(Request $request, $id){
        $ValidateDate = $request->validate([
            'brand_name'=>'required|unique:brands|max:225',
            
        ],
        [
            'brand_name.required'=>'Ce champs ne doit pas être vide',
            'brand_image.min'=>'La longueur doit être superieure à 4 quatre caractères',
        ]
        );
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if ($brand_image) {
        
        $name_gen = hexdec(uniqid());
        $img_text = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_text;
        $location = 'app/public/';
        $last_img = $location.$img_name;
        $brand_image->move($location,$img_name);

        unlink($old_image);

        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $last_img;
        $brand->update();

        return redirect()
            ->back()
            ->with('success', 'Le brand à été modifizer avec success');
            
        }
        else{
            $brands = Brand::find($id);
            $brands->brand_name = $request->brand_name;
            $brands->update();
    
            return redirect()
                ->back()
                ->with('success', 'Le brand à été modifizer avec success');
        }
        
    }
    public function delete($id){

        $image = Brand::find($id);
        $old_image = $image->brand_image;

        unlink($old_image);

        $image->delete();

        return redirect()->back()->with('message', 'Le brand à été supprimer avec success');
    }

   
   
}
