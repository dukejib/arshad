<?php

namespace App\Http\Controllers;

use App\User;
use DateTime;
use App\Product;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;


class PassportController extends Controller
{
    public $successStatus = 200;
    public $tokenName = "Ribsncuts-Android";


    public function get_products()
    {
        $products = Product::inRandomOrder()->get();
        $latest = Product::orderBy('updated_at','desc')->first();
        $date = new DateTime($latest->updated_at);

        $result['success'] = true;
        $result['lastUpdate'] = $date->format('Y-m-d'); 
        $result['products'] = $products;
        return $result;
    }

    /**
     * Register the User from mobile Device
     * @param name User Full Name 
     * @param email User Email Address
     * @param password User Password
     * @param confirm_password User Password Copy
     * @return token,name,unique_id,profile
     */
    public function register(Request $request)
    {
        $id = uniqid();

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails())
        {
            $result['success'] = false;
            $result['message'] = $validator->errors();
            return response()->json($result,462);
        }

        //Raise event and send to function for creation
        event(new Registered(
            $user = $this->create($request->all())
        ));

        //Create a profile for user as well
        Profile::create([
            'user_id' => $user->id
        ]);

        // $success = $this->login($request);
        $result['token'] = $user->createToken($this->tokenName . $id)->accessToken;
        $result['name'] = $user->name;
        $result['unique_id'] = $this->tokenName . $id;
        $result['profile'] = $user->profile;

        return response()->json($result, $this->successStatus);
    }

    /**
     * Login the User form mobile Device
     * @param email Email address of User
     * @param password Password of the User
     * @return token,unique_id
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $id = uniqid();
            $user = Auth::user();
            $result['success'] = true;
            $result['unique_id'] = $this->tokenName . $id;
            $result['token'] = $user->createToken($this->tokenName . $id)->accessToken;

            return response()->json($result, $this-> successStatus);
        }
        else
        {
            $result['success'] = false;
            $result['message'] = 'Unauthorized User';

            return response()->json($result, 461); 
        }
    }

    /**
     * Returns Details of the User after Token is verified
     * @param token
     * @return \App\User,profile,orders
     */
    public function details() 
    { 
        $result['user'] = Auth::user();
        $result['profile'] = Auth::user()->profile;
        $result['orders'] = Auth::user()->orders;

        return response()->json($result, $this-> successStatus); 
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
}
