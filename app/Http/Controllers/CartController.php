<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart;
use App\Product;

class CartController extends Controller
{
    
    public function add_to_cart(Request $request){
        $product = $product::find($request->id);

        /** Add to cart */
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => 1,
            'price' => $item->price_per_kg
        ]);
        //Associate the cart with item
        Cart::associate($cartItem->rowId, 'App\Product');
        Session::flash('success','Item added to cart');
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
}
