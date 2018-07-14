<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        Session::put('redirect', $request->input('redirectTo'));
        // $social = 
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookProviderCallback()
    {
        try{

            $socialUser = Socialite::driver('facebook')->user();
            
            //Check Info of User
            $findUser = User::where('email',$socialUser->email)->first();

            if($findUser){
                //If we have user , then Log Him In
                $this->loginAuthUser($findUser);
            }else{
                //User Not in Database, So Create one
                $user = $this->createNewUser($socialUser);
                //Login
                $this->loginAuthUser($user);
            }
            return redirect()->intended('/profile');
        // $user->token;

        }catch(\Exception $e){
            Session::flash('error',$e->getMessage());
            return redirect()->route('home');
        }
    }

     /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        try{

            $socialUser = Socialite::driver('google')->user();

            //Check Info of User
            $findUser = User::where('email',$socialUser->email)->first();

            if($findUser){
                //If we have user , then Log Him In
                $this->loginAuthUser($findUser);
            }else{
                //User Not in Database, So Create one
                $user = $this->createNewUser($socialUser);
                //Login
                $this->loginAuthUser($user);
            }
            return redirect()->intended('/profile');
        // $user->token;

        }catch(\Exception $e){
            Session::flash('error',$e->getMessage());
            return redirect()->route('home');
        }
    }

    public function createNewUser($socialUser)
    {
        //Create new User
        $user = new User();
        $user->name = $socialUser->name;
        $user->email = $socialUser->email;
        $user->password = bcrypt('rnc2018-123');
        $user->save();
        //create the profile page
        Profile::create([
            'user_id' => $user->id
        ]);
        //Send An Email
        event(new Registered(
            $user 
        ));

        return $user;
    }

    public function loginAuthUser($user)
    {
        Auth::login($user);
    }
}
