<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Product;
use Illuminate\Http\Request;
use App\Events\ContactMadeEvent;
use PHPUnit\Framework\MockObject\Stub\Exception;
// use Illuminate\Support\Facades\Request;

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
            $contact = Contact::create([
                'username' => $username,
                'email' => $email,
                'reason' => $reason,
                'comment' => $comment,
                'number' => $number
            ]);
            
            //Generate the Event;
            event(new ContactMadeEvent($contact));
            //Return the response
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

    public function user_passforgot()
    {
        // return redirect()->route('');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function privacypolicy()
    {
        return view('frontend.privacypolicy');
    }

    public function faqs()
    {
        return view('frontend.faqs');
    }

    
}

