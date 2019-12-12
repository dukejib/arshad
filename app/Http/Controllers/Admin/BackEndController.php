<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BackEndController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('admin');
    // }

    public function showLogin()
    {
        return view('backend.login');
    }

    public function postLogin(Request $request)
    {
        // dd($request->all());
        $attempt = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($attempt)
        {
            //  Move the User to Dashboard
            return  redirect()->route('admin.dashboard');
        }
        abort('False User',403);
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }
}
