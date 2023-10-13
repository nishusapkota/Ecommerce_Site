<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
public function index(){
    $products=Product::paginate(6);
    return view('home.userpage',compact('products'));
}
  public function redirect(Request $request){
    $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.home');
        }
        else{
            $products=Product::paginate(6);
            return view('home.userpage',compact('products'));
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

public function productDetail($id){
    $product=Product::find($id);
    return view('home.product-detail',compact('product'));
}

public function addCart(Request $request,$id){
    if(Auth::id()){
        $user=Auth::user();
        $product=Product::find($id);
        if($product->discount_price!=" "){
            $price = $product->price - $product->discount_price;
        }else{
            $price = $product->price;
        }
        Cart::create([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'product_title' => $product->title,
            'quantity' => $request->quantity,
            'price' => $request->quantity * $price,
            'image' => $product->image,
            'product_id' =>$product->id,
            'user_id' => $user->id      
        ]);
        return redirect()->back();
    }
    else{
        return redirect('/login');
    }
}
}
