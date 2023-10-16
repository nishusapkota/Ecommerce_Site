<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        // dd($orders);
        return view('admin.order.index',compact('orders'));
    }

    public function delivered($id){
        $order=Order::find($id);
        $order->delivery_status = "delivered";
        $order->payment_status = "paid";
        $order->save();
        return redirect()->back();
        
    }
}
