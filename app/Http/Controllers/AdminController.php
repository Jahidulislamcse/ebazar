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
        return redirect('show_products')->with('message','Product added successfully');    
    } 

    public function show_products(){
        $products = Product::all();
         return view('admin.product_showcase', compact('products'));
    } 

    public function edit_product($id){
        $product = Product::find($id);
        $category = Category::all();
        return view ('admin.update_product', compact('product', 'category'));

    } 

    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted successfully');            
    } 

        public function update_product(Request $request ,$id){
        $product = Product::find($id);

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
        $product->update();

        return redirect('show_products')->with('message','Product updated successfully');    
    } 
}

