<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
  
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'job' => 'required|max:255',
        ]);
    }
        


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create( array $data)
    {    

        // return view('auth.register');

         return User::create([
            'name' => $data['name'],
            'job' => $data['job'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);
       

    }
    // public function store()

    // {
    //     $this->validate(request(), [
    //     'user_name' => 'required|max:255',
    //     'user_email' => 'required|email|max:255|unique:users',
    //     'password' => 'required|min:6|confirmed',
    //     'job' => 'required|max:255',
    //     ]);

    //   $user =  User::create(request(['user_name','user_email','password','job']));

    //   auth()->login($user);

    //   return redirect()->home();
    // }
  
}

