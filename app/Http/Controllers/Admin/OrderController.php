<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;
use App\Notifications\SendEmailNotification;


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

    public function print($id){
        $order=Order::find($id);
        $pdf = PDF::loadView('admin.pdf',compact('order')); 
        return $pdf->download('order.pdf');
        // $pdf=PDF::loadView('admin.pdf',compact('order'));
        // return $pdf->download('order.pdf');
    }

    public function sendEmail($id){
        $order=Order::find($id);
        return view('admin.mail',compact('order'));
    }

    public function send(Request $request,$id){
        $order=Order::find($id);
        $details=[
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' =>$request->url,
            'lastline' => $request->lastline

        ];

        Notification::send($order,new SendEmailNotification($details));

        return redirect()->back();
    }
}
