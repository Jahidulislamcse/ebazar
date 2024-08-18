<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view ('admin.category', compact('data'));
    }

    public function add_category(Request $request ){
        $data = new Category;
        $data->category_name = $request->category_name;

        $data->save();
        return redirect()->back()->with('message','Category added successfully');
    }
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category deleted successfully');
    }

    public function add_product(){
        $category = Category::all();
        return view('admin.product', compact('category'));
    } 

    public function store_product( Request $request){
        $product = new Product;

        $image = $request->image;
        $imagetitle=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product_image', $imagetitle);
        $product->image = $imagetitle;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->save();
        return redirect()->back()->with('message','Product added successfully');    
    } 

    public function show_products(){
        $products = Product::all();
         return view('admin.product_showcase', compact('products'));
    }
}

