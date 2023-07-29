<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class AdminController extends Controller
{
   
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function passwordchange(){
        
        return view('admin.profile.passwordchange');
    }
    public function passwordupdate(Request $request){
        
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
        ]);
        $current_password=Auth::user()->password;

        $old_pass= $request->old_password;
        $new_password= $request->password;
        if(Hash::check($old_pass,$current_password)){
            $user=User::findorfail(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('admin.login');
        }
        else{
            return redirect()->back();
        }
    }
}