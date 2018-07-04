<?php

namespace App\Http\Controllers\Auth;

use App\User;
use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Profile;

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
    // protected $redirectTo = '/home';

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
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
        if(auth()->check()){

            if( in_array( auth()->user()->email, config('app.administrators') ) ){
                //redirect user to dashboard
                // return 'you are the admin';
                return redirect()->route('dashboard');
            }else{
                //redirect user to profile page
                return redirect()->route('profile');
            }

        }
    }

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
                return response()->json(route('profile'));
            }
        }else {
            return response()->json("Unable to Log you in",400);
        }
        
    }

     /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
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
        $socialUser = Socialite::driver('facebook')->user();

        //Check Info of User
        $findUser = User::where('email',$socialUser->email)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect()->route('profile');
        }else{
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
            //Login
            Auth::login($user);
            return redirect()->route('profile');
        }
        // $user->token;
    }

     /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        // $social = 
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        $socialUser = Socialite::driver('google')->user();

        //Check Info of User
        $findUser = User::where('email',$socialUser->email)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect()->route('profile');
        }else{
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
            //Login
            Auth::login($user);
            return redirect()->route('profile');
        }
        // $user->token;
    }
}
