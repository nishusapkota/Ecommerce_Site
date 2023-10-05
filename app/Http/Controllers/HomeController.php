<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function redirect(Request $request){
    $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.home');
        }
        else{
            return view('dashboard');
        }
    // $input = $request->all();
    // $request->validate([
    //     'email' =>'required|email',
    //     'password' => 'required'
    // ]);
    // if(Auth::attempt(array('email' => $input['email'],'password' => $input['password']))){
    //     $usertype = Auth::user()->usertype;
    //     if($usertype == '1'){
    //         return redirect('/admin');
    //     }
    //     else{
    //         return redirect('/dashboard');
    //     }
    // }else{
    //     return redirect('/login')->with('error','Invalid login credentials!!');
    // }
 }

//  public function adminDashboard(){
//     return view('admin.home');
//  }
}
