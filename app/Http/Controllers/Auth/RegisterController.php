<?php

namespace App\Http\Controllers\Auth;

use App\regencies;
use App\User;
use App\provinces;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
              'alamat'=> 'required',
                'villages'=> 'required',
              'districts'=> 'required',
              'regencies'=> 'required',
              'provinces'=> 'required',
              'level'=> 'required',
              'noRek'=> 'required|string|max:16',
              'noTelepon'=> 'required|string|max:13',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'villages' => $data['villages'],
            'districts' => $data['districts'],
            'regencies' => $data['regencies'],
            'password' => bcrypt($data['password']),
            'provinces' => $data['provinces'],
            'level' => $data['level'],
            'noRek' => $data['noRek'],
            'noTelepon' => $data['noTelepon'],
          ])
        ;
    }
    public function showRegistrationForm()
    {
        $provinces = provinces::all();
        return view('auth/register',compact('provinces'));
    }


    public function getRegencies($id) {
        $regencies = regencies::where("provinces",$id)->pluck("regencies","id");

        return json_encode($regencies);
    }


}
