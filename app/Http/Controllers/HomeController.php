<?php

namespace App\Http\Controllers;

// use auth;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Session;



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

    public function profile()
    {
        return view('profile')
        ->with('orders',Order::where('user_id',auth()->id())->orderBy('created_at','Desc')->get())
        ->with('user',auth()->user());
    }
    
    public function address_update(Request $request)
    {
        $this->validate($request,[
            'contact' => 'required|min:5',
            'cellnumber' => 'required|min:11|numeric',
            'address' => 'required'
        ]);

        $user = User::find(Auth::id());
        $user->profile->contact = $request->contact;
        $user->profile->cellnumber = $request->cellnumber;
        $user->profile->landline = $request->landline;
        $user->profile->address = $request->address;
        $user->profile->save();

        Session::flash('success','Information updated');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    
}
