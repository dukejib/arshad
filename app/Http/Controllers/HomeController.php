<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use App\Order;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('profile')
        ->with('orders',Order::where('user_id',auth()->id()))
        ->with('user',auth()->user());
    }

}
