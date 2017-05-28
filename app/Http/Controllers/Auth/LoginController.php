<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
     * Redirect the user to the Facbook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {

        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facbook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        $facebook_user = Socialite::driver('facebook')->user();

        // return $facebook_user->name;
        $authUser=$this->findOrCreateUser($facebook_user);
        Auth::login($authUser,true);
        return view('welcome');
    }

    private  function  findOrCreateUser($facebookUser){
        $authUser=User::where('email','=',$facebookUser->email)->first();

        if ($authUser){
            return $authUser;
        }
        return User::create([
                'name'=>$facebookUser->name,
                'email'=>$facebookUser->email,
                'password'=>bcrypt('good'),
                'user_photo'=>$facebookUser->avatar]);
    }



}
