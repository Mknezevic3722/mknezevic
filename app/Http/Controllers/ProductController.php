<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('products.index',[
            'products' => $products,
            'categories' => $categories
        ]);
    }
    function category($category_id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($category_id);



        return view('products.category', [
            'category' =>$category,
            'categories' => $categories,
        ]);
    }
    function show($product_id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product_id);
        return view('products.show',[
            'product' =>$product,
            'categories' => $categories
        ]);
    }
    function list(){
        return view("admin.product.list",[
            'products'=> Product::all(),
        ]);
    }
    function create(){
        return view("admin.product.create",[
            'categories'=> Category::all()
        ]);
    }
    function insert(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('admin.product')->with('success', 'Product create successfully.');
    }
    function edit($id){
        $product = Product::findOrFail($id);
        return view("admin.product.edit",[
            'product' => $product,
            'categories'=> Category::all()
        ]);
    }
    function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('admin.product.edit', $product->id)->with('success', 'Product create successfully.');
    }
    function delete($id){
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('admin.product')->with('success', 'Product create successfully.');
    }
    public function istaknuto()
{
    $products = Product::where('category_id', 7)->get();
    return view('products.istaknuto', compact('products'));
}

}
