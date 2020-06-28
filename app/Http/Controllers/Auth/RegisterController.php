<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'reg_password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required'],
            'address' => ['required', 'string', 'max:100'],
            'city' =>['required', 'string', 'max:100'],
            'telephone' => ['required']

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
        //check if user has avatar
        if(isset($data['avatar'])){
            $filenameWithExt=$data['avatar']->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$data['avatar']->getClientOriginalExtension();
            $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
            $data['avatar']->move(public_path('avatar'), $fileNameToStore);  

     }else{
           // if no file from request , then put one no-image.jpeg in public/img folder
           $fileNameToStore='avatar_placeholder.jpg';
      }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['reg_password']),
            'is_admin' => false,
            'avatar' => $fileNameToStore,
            'gender' => $data['gender'],
            'address' => $data['address'],
            'city' => $data['city'],
            'phone_number' => $data['telephone']
        ]);
    }

    //override showRegistrationForm()
    public function showRegistrationForm()
    {
        return view('storefront.register');
    }   
}
