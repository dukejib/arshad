<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\PendingTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewOrderGeneratedEvent;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\User;

class OrderController extends Controller
{

    public $user; 
    public $order;


    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index($type)
    {

        switch ($type) {
            case 'pending':
                //Send Pending Orders
                return view('backend.orders.index')
                ->with('type','Pending')
                ->with('orders',Order::where('status','Pending')->orderBy('created_at','DESC')->with('order_details')->get());
                break;

            case 'transit':
                //Send Pending Orders
                return view('backend.orders.index')
                ->with('type','Transit')
                ->with('orders',Order::where('status','Transit')->orderBy('created_at','DESC')->with('order_details')->get());
                break;
            
            case 'completed':
                //Send COmpleted Orders
                return view('backend.orders.index')
                ->with('type','Completed')
                ->with('orders',Order::where('status','Completed')->orderBy('created_at','DESC')->with('order_details')->get());
                break;
        }

        
    }

    public function store()
    {
        //TODO: Add The ORder to Tables, Process it, Send Emails and move forward
        /* Pseduo Code
        create pending transaction
        send email to shop@ribsncuts.com 
        */
        
        // dd(Cart::content());

        $order = $this->createNewOrder();
    
        $orderDetails = $this->createNewOrderDetails($order);
        
        $pendingTransaction = $this->createNewPendingTransaction($order);

        //Clear Cart & Session
        Cart::destroy();
        Session::forget('cart');

        //Now Send the Email to User
        event(new NewOrderGeneratedEvent($order,Auth::user()));
        //Now Return Response or Redirect

        // $this->user = new User();
        // $this->user = Auth::user();
        // $this->order = new Order();
        // $this->order = $order;
        
        return redirect()->route('thanks',['order' => $order,'user' => Auth::user()]);
    }

    public function createNewOrder()
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->subtotal = Cart::subtotal();
        $order->grandtotal = Cart::total();
        $order->status = 'Pending';
        $order->city = 'Multan';
        $order->save();
      
        return $order;
    }

    public function createNewOrderDetails(Order $order) 
    {
        foreach(Cart::content() as $purchase){
            
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $purchase->id;
            $order_detail->product_name = $purchase->name;
            $order_detail->product_qty = $purchase->qty;
            $order_detail->product_price = $purchase->price;
            $order_detail->save();
        }
    }

    public function createNewPendingTransaction(Order $order)
    {
        $pending_transaction = new PendingTransaction(); 
        $pending_transaction->order_id = $order->id;
        $pending_transaction->order_total = $order->grandtotal;
        $pending_transaction->save();

        return $pending_transaction;
    }

    public function thankyou(Order $order,User $user)
    {
      
        return view('frontend.thankyou')
        ->with('order',$order)
        ->with('user',$user);
    }

    public function statusToggler($toggle,$id)
    {
        switch ($toggle) {
            case 'Transit':
                $order = Order::where('id',$id)->first();
                $order->status = 'Transit';
                $order->save();
                Session::flash('success','Order in Transit');
                return redirect()->back();
                break;

            case 'Completed':
                $order = Order::where('id',$id)->first();
                $order->status = 'Completed';
                $order->save();
                Session::flash('success','Order Completed');
                return redirect()->back();
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //TODO: show the order fully
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
