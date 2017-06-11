<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use DB;
use Validator;
use Illuminate\Http\Request;

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
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
     * Redirect the user to the Facbook authentication page.
     *
     * @return Response    
     */

    protected function redirectTo()
    {
       $select=DB::table('users')->where('id','=',Auth::id())
            ->where('block','=',0)->get();
            
        if(($select)->isEmpty()){
             return '/';
        }else{
            return '/home';

        }
    }
    public function redirectToProvider($service)
    {

        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from Facbook.
     *
     * @return Response
     */
    public function handleProviderCallback($service)
    {
        if ($service == 'twitter') {
            $user = Socialite::driver($service)->user();
        }else{
            $user = Socialite::driver($service)->stateless()->user();
        }
        $findUser = User::where('email',$user->getEmail())->first();
        if ($findUser) {
            Auth::login($findUser);
        }else{
            $newUser = new User;
            $newUser->email = $user->getEmail();
            $newUser->name = $user->getName();
            $newUser->password = bcrypt('good');
            $newUser->user_photo = $user->getAvatar();
            $newUser->save();
            Auth::login($newUser);

        }
        return redirect('home');
    }

}
