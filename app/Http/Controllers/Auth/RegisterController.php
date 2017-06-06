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


    public function __construct ()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator (array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'job' => 'nullable|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'user_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */

    protected function create (array $data)
    {
        $user_photo = $data['user_photo'];
        $data['user_photo'] = time() . '.' . $user_photo->getClientOriginalExtension();
        $user_photo->move(public_path('upload/image'), $data['user_photo']);
        return User::create([
            'name' => $data['name'],
            'job' => $data['job'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'date_of_birth' => $data['date_of_birth'],
            'user_photo' => $data['user_photo'],
            'gender' => $data['gender'],
            'user_address' =>$data['user_address'],
            'user_latitude' =>$data['user_latitude'],
            'user_longitude' =>$data['user_longitude'],
            'password' => bcrypt($data['password']),
        ]);

    }
}