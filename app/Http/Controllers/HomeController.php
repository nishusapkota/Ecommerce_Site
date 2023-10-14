<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

public function showCart(){
    if(Auth::user()){
        $id=Auth::user()->id;
        $carts=Cart::where('user_id',$id)->get();
        return view('home.cart',compact('carts'));
    }else{
        return redirect('/login');
    }
}

public function deleteCart($id){
    $cart =Cart::find($id);
    $cart->delete();
    return redirect()->back();
}

public function cashOrder(){
    $user=Auth::user();
    $carts=Cart::where('user_id',$user->id)->get();
    foreach($carts as $cart){
        Order::create([
            'name'=>$cart->name,
            'email'=>$cart->email,
            'phone'=>$cart->phone,
            'address'=>$cart->address,
            'user_id'=>$cart->name,
            'product_title'=>$cart->product_title,
            'quantity'=>$cart->quantity,
            'price'=>$cart->price,
            'image'=>$cart->image,
            'product_id'=>$cart->product_id,
            'payment_status' => 'Cash On Delivery',
            'delivery_status'=> 'Processing'
        ]);
        if(File::exists($cart->image)){
            unlink(public_path($cart->image));
        }
        $cart->delete();
    }
    return redirect()->back()->with('success','We have received your order.We will connect with you soon');


   
    
}
}
