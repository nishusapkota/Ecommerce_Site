<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function viewCategory(){
        $categories= Category::all();
        return view('admin.category.create',compact('categories'));
    }

    public function addCategory(Request $request){
        // dd($request->all());
        $request->validate([
            'category_name' => 'string|required',
        ]);
        Category::create([
            'category_name' => $request->category_name,
        ]);
        return redirect()->back()->with('success','Category added successfully');
    }

    public function deleteCategory($id) {
        $category =Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Deleted successfully');
    }

}