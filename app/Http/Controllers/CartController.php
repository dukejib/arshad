<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
        
    public function cart()
    {
        if(!Session::has('cart')){
            // return view('cart.cart')
            // ->with(Helper::getBasicData());
            Session::flash('info','You Don\'t have any item in Cart');
            return redirect()->route('home');
        }
        return view('frontend.cart');
    }

    public function cartAdd($id, $qty)
    {  
        /** Product to Add */
        $product = Product::find($id);
        /** Add to cart */
        for ($i=0; $i < (int)$qty; $i++) { 
            $cartItem = Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'qty' => 1,
                'price' => $product->price_per_kg
            ]);
            //Associate the cart with item
            Cart::associate($cartItem->rowId, 'App\Product');
        }

        
        //Add Extra Order - If user selected more than 1
        
        // Session::flash('success','Product added to cart');
        // return redirect()->back();
        return response()->json('product added',200);
    }

    public function cartRemove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function clear_cart(){
        if(Session::has('cart')){
            Cart::destroy();
            Session::forget('cart');
        }
        Session::flash('success','Cart Cleared');
        return redirect()->route('home');
    }

     //Increase the item in Cart
    public function increase_item($id,$qty)
    {
        Cart::update($id,$qty + 1);
        return redirect()->back();
    }
 
    //decrease the Item in cart
    public function decrease_item($id,$qty)
    {
        Cart::update($id,$qty -1);
        return redirect()->back();
    }

    public function cartCheckout()
    {
        return 'Cart Checkout Route';
    }
}
