<?php

namespace App\Http\Controllers;

use App\User;
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
            return response()->json(['error' => $validator->errors()],401);
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
        $success['token'] = $user->createToken($this->tokenName . $id)->accessToken;
        $success['name'] = $user->name;
        $success['unique_id'] = $this->tokenName . $id;
        $success['profile'] = $user->profile;

        return response()->json(['success'=>$success], $this->successStatus);
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
            $success['token'] = $user->createToken($this->tokenName . $id)->accessToken;
            $success['unique_id'] = $this->tokenName . $id;

            return response()->json(['success' => $success], $this-> successStatus);
        }
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401); 
        }
    }

    /**
     * Returns Details of the User after Token is verified
     * @param token
     * @return \App\User,profile,orders
     */
    public function details() 
    { 
        $success['user'] = Auth::user();
        $success['profile'] = Auth::user()->profile;
        $success['orders'] = Auth::user()->orders;
        return response()->json(['success' => $success], $this-> successStatus); 
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
