<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontEndController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('frontend.landing')
        ->with('products',$products);
    }

    public function contactus(){
        return view('frontend.contactus');
    }

    public function get_product($slug){
        $product = Product::where('slug',$slug)->first();
        return view('frontend.product')
        ->with('product',$product);
    }

    public function get_products($slug){
        $product = Product::where('category',$slug)->get();
    }
}

