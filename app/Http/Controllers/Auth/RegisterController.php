<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
    protected $redirectTo = "";

    protected function changeRedirectTo($local){
        if($local == 'ar'){
           $this->redirectTo = 'ar/home';
        }
        else if($local == 'en'){
           $this->redirectTo = 'en/home';
        }
        else if($local == 'tr'){
            $this->redirectTo = 'tr/home';
         }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->changeRedirectTo(app()->getLocale());

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => [ 'required', 'mimes:jpg,jpeg,png'],
            'phone' => ['required', 'string', 'max:30', 'min:11'],
            'address' => ['required', 'string', 'max:255', 'min:15'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $path = '';
        if(request()->hasFile('image')){
            $path = request()->file('image')->store('');
            request()->file('image')->move('uploads/images', $path);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $path,
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);
    }

    public function showRegistrationForm()
    {
        return view('login.new_register');
    }
}
