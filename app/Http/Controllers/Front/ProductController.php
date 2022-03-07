<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    public function index(){

        $products = Product::where('status', 1)->paginate(12);

        return view('front.products.index', ['products'=>$products]);
    }

    public function show(Product $product){

        if($product->status == 0) {
            $msg = ['Product not visible', 'danger'];
            return redirect()->route('front.products')->with('message', $msg);
        }

        $reviews = Review::where('product_id', $product->id)->paginate(5);

        return view('front.products.show', compact('product', 'reviews'));
    }
}
