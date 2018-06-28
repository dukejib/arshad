<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        /** Authenticate User */
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))

        /** Get The User */
        {
            $user = User::where('email',$request->email)->first();
            // dd($user->all());
            switch ($user->role) {
                case '99':
                    return redirect()->route('dashboard');
                    break;
                
                case '1':
                    return 'This is Manager Slot';
                    break;
                case '2':
                    return 'This is Rider Slot';
                    break;
                
                default:
                    return redirect()->route('profile');
                    break;
            }
            
        }

        return redirect()->back();
    }
}
