<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'image'=>'required|mimetypes:jpg,png,jpeg',
        // ]);
       
        $image_name = time().".".$request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('product'),$image_name);
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'product/'.$image_name,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount ?: " "
        ]);

        return redirect()->back()->with('success','product created successfully');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =Product::find($id);
        $categories=Category::all();
        return view('admin.product.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        if($request->file('image')){
            unlink(public_path($product->image));
            $image_name = time().".".$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('product'),$image_name);
            $product->image = 'product/'.$image_name;
        }
        
        $product->update([
            'title' => $request->title,
            'description' => $request->description,
          
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount ?: " "
        ]);
        return redirect()->route('showProduct')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product=Product::find($id);
        unlink(public_path($product->image));
        $product->delete();
        return redirect()->back()->with('message','Product deleted successfully');
    }
}
