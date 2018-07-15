<?php

namespace App\Http\Controllers;


use App\User;
use App\Order;
// use \Illuminate\Http\Request;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    
        /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    // protected $redirectTo = '/profile';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /* Login User - Frontend */
    public function user_login(Request $request)
    {
        
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        // return response()->json("Validated.",200);
        if(Auth::attempt(['email' => $request->email,'password' => $request->password]))
        {
            if( in_array( auth()->user()->email, config('app.administrators') ) ){
                return response()->json(route('dashboard'));
            }else{
                // return response()->json(route('profile'));
                return response()->json(URL::previous());
            }
        }else {
            return response()->json("Unable to Log you in",400);
        }
        
    }

    /* Show Registeration Form - FrontEnd */
    public function showRegisterForm(){
        return view('frontend.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered(
            $user = $this->create($request->all())
        ));

        //Create a profile for user as well
        Profile::create([
            'user_id' => $user->id
        ]);
        //Here we actually put user lgged in-so validate it and show other page
        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

      /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

     /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        // Send to specifi page here etc
        // dd($user);
        if(auth()->check()){

            if( in_array( auth()->user()->email, config('app.administrators') ) ){
                //redirect user to dashboard
                // return 'you are the admin';
                return redirect()->route('dashboard');
            }else{
                //redirect user to profile page
                return redirect()->route('profile');
                // return redirect()->back();
            }

        }

    }

}
