<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultiImage;
use App\Models\Contact;
use App\Models\ContactForm;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function create(){

        return view('admin.contact.create');
    }

    public function store(Request $request){

        $contacts = new Contact();
        $contacts->address = $request->address;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;

        $contacts->save();
        return redirect()->route('admin.contact')->with('success', 'Le contact  à été ajouté avec success');

    }

    public function edit($id){

        $contact = Contact::find($id);

        return view('admin.contact.edit', compact('contact'));
    }
    public function update(Request $request, $id){

        $update = Contact::find($id);
        $update->address = $request->address;
        $update->email = $request->email;
        $update->phone = $request->phone;

        $update->update();
        return redirect()->back()->with('success', 'Le contact à été modifier avec success');
    }

    public function delete($id){
        $delete = Contact::find($id);

        $delete->delete();
        return redirect()->back()->with('message', 'Le contact à été supprimer avec success');
    }

    
    public function portfolio()
    {
        $images = MultiImage::all();
         return view("pages.portfolio", compact('images'));
      
    }
    public function client_contact()
    {
        $contacts = Contact::all();
         return view("pages.contact", compact('contacts'));
      
    }
    public function client_message(Request $request)
    {
        $messages = new ContactForm();
        $messages->name = $request->name;
        $messages->email = $request->email;
        $messages->subject = $request->subject;
        $messages->message = $request->message;
        
        $messages->save();
        return redirect()->route('contact')->with('message', 'Le message  à été envoyé avec success');
        
    }
    public function messages()
    {
        $messages = ContactForm::latest()->get();
         return view("admin.contact.message", compact('messages'));
      
    }

    public function delete_admin_message($id){
        $delete = ContactForm::find($id);

        $delete->delete();
        return redirect()->back()->with('success', 'Le contact à été supprimer avec success');
    }


}
