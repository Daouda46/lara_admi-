<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;

class HomeAboutController extends Controller
{
    //
    public function index(){

        $abouts = HomeAbout::latest()->get();

        return view('admin.about.index', compact('abouts'));
    }

    public function create(){

        return view('admin.about.create');
    }

    public function store(Request $request){

        $store = new HomeAbout();
        $store ->title = $request->title;
        $store ->description = $request->description;
        $store ->long_text = $request->long_text;

        $store->save();

        return redirect()->route('home-about')->with('success', 'La  description à été ajouté avec success');
    }

    public function edit($id){

        $about = HomeAbout::find($id);

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id){

        $update = HomeAbout::find($id);

        $update->title = $request->title;
        $update->description = $request->description;
        $update->long_text = $request->long_text;

        $update->update();
        return redirect()->back()->with('success', 'La page about à été modifier avec success');
    }

    public function delete($id){
        $delete = HomeAbout::find($id);

        $delete->delete();
        return redirect()->back()->with('message', 'La description à été supprimer avec success');
    }
}
