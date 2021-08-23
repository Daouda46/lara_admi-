<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Auth;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function index(){
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin/category/index', compact('categories', 'trashCat'));
    }

    public function store(Request $request){
        $validateData = $request->validate(
            [
            'category_name'=>'required|unique:categories|max:225',
            ],
            ['category_name.required' =>'Ce champ est obligatoire',]
    );
        $cat = new Category;
        $cat ->category_name = $request->input('category_name');
        $cat->user_id = Auth::user()->id;
        $cat->created_at = Carbon::now();

        $cat->save();

        return redirect()->back()->with('success', 'La catégorie à été ajouté avec succès');
    }

    public function edit($id){

        $categorie = Category::find($id);
        return view('admin/category/edit', compact('categorie'));
    }

    public function update(Request $request, $id){
        $categorie = Category::find($id);
        $categorie->category_name = $request->input('category_name');
        $categorie->user_id = Auth::user()->id;

        $categorie->update();
        return redirect()->route('categorie-all')->with('success', 'La catégorie '.$categorie->category_name.' à été ajouté avec succès');
    }

    public function SoftDelete($id){
        $categorie = Category::find($id);
        $categorie->delete();

        return redirect()->route('categorie-all')->with('success', 'La catégorie '.$categorie->category_name.' à été supprimé avec succès');
    }

    public function restaurer($id){
        $categorie = Category::withTrashed()->find($id)->restore();

        return redirect()->route('categorie-all')->with('success', 'La catégorie à été restaurer avec succès');
    }

    public function supprimer($id){
        $categorie = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('categorie-all')->with('success', 'La catégorie à été supprimer avec succès');
    }
}