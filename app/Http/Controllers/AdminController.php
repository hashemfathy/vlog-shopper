<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Hash;
class AdminController extends Controller
{
    public function getAdminLogin(){
        
        return view('admin.admin_login');
    }
    public function postAdminLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password'],'admin'=>'1'])){
            return redirect()->route('get.dashboard');
        }else{
           return redirect()->back();
        }
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function getAdminlogout(){
        
        Session::flush();
        return redirect('/admin')->with('flush_errors','logged out successfully');
    }
    public function settings(){
        return view('admin.settings');
    }
    public function checkPassword(Request $request){
        
        $currentpassword = $request['current_pwd'];
        $checkpassword = User::where(['admin'=>'1'])->first();
        if(Hash::check($currentpassword,$checkpassword->password)){
            echo 'true';die;
        }else{
            echo 'false';die;
        }
    }
    public function updatePassword(Request $request){
        $admin= User::where(['email'=>Auth::user()->email])->first();
        $currentpassword = $request['current_pwd'];
        if(Hash::check($currentpassword,$admin->password)){
            $admin->password=bcrypt($request->new_pwd);
            $admin->update();
            return redirect()->back()->with('flush_errors','updated successfully');
        }else{
            return redirect()->back()->with('flush_errors','unmatched passwords');
        }
    }
}
