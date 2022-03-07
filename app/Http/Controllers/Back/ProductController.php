<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function index(){

        $products = Product::paginate(25);

        return view('back.products.index', ['products'=>$products]);
    }

    public function delete(Product $product){

        if($product->delete()) {
            $msg = ['Product deleted succesfully', 'success'];
        } else {
            $msg = ['Error deleting product', 'danger'];
        }

        return redirect()->back()->with('message', $msg);
    }

    public function edit(Product $product) {

        $categories = Category::all();
        return view('back.products.edit', compact('product', 'categories'));
    }

    public function create() {
        $product = new Product;
        $categories = Category::all();
        return view('back.products.edit', compact('product', 'categories'));
    }

    public function store(ProductRequest $request){
        
        $input = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $destination_path = 'public/images/products';
            $image_name = $file->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            $input['image'] = $path;
        }

        if($product = Product::create($input)){
            $msg = ['Product created succesfully', 'success'];
        }else{
            $msg = ['Error creating product', 'danger'];
        }

        return redirect()->route('back.products')->with('message', $msg);
    }

    public function update(ProductRequest $request, Product $product) {
        
        $input = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $destination_path = 'public/images/products';
            $image_name = $file->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            $input['image'] = $path;
        }

        if($product->update($input)) {
            $msg = ['Product updated succesfully', 'success'];
        } else {
            $msg = ['Error updating product', 'danger'];
        }

        return redirect()->back()->with('message', $msg);
    }

}
