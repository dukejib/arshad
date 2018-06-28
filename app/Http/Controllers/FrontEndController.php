<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contact;
use PHPUnit\Framework\MockObject\Stub\Exception;

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

    public function post_contactus(Request $request)
    {
        $username = $request->username;
        $email = $request->email;
        $reason = $request->reason;
        $comment = $request->comment;
        $number = $request->number;

        try{
            Contact::create([
                'username' => $username,
                'email' => $email,
                'reason' => $reason,
                'comment' => $comment,
                'number' => $number
            ]);
    
            return response()->json("Thankyou for contacting us.",200);

        }catch(Exception $e){
            return resoponse()->json("Errors Occured",$e->getCode());
        }
    }

    public function get_product($slug){
        $product = Product::where('slug',$slug)->first();
        return view('frontend.product')
        ->with('product',$product);
    }

    public function get_products($slug){
        $product = Product::where('category',$slug)->get();
        return view('frontend.products')
        ->with('category',$slug)
        ->with('products',$product);
    }
}

