<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class ChangePasswordController extends Controller
{
    //

    public function change_password(){

        return view('admin.body.password');
    }

    public function update_password(Request $request){

        $ValidateData = $request->validate([
                'oldpassword'=> 'required',
                'password'=> 'required|confirmed',
        ]);

        $has_user_pwd = Auth::user()->password;
        if (Hash::check($request->oldpassword,$has_user_pwd)) {
           
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);

            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Le mot de pass a été changé avec success');
        }
        else{
            return redirect()->back()->with('error', 'Le mot de pass courant est invalide');
        }
    }

    public function update_profile(){

        if (Auth::user()) {
           $user = User::find(Auth::user()->id);
           if ($user) {
               return view('admin.body.update_profile', compact('user'));
           }
        }
    }

    public function save_profile(Request $request){

        $user = User::find(Auth::user()->id);
        if ($user) {
           
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('message', 'Le profile a été modifier avec success');
        }
        else{
            return redirect()->back();
        }

    }
}
