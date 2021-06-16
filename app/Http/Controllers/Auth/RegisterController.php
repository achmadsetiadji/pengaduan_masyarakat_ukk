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
    protected $redirectTo = '/pengguna';

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
            'nik' => ['required', 'max:16', 'unique:users'],
            'telp' => ['required', 'max:13'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'name.required' => 'Nama Harus Di Isi',
            'email.required'=> 'Alamat Email Harus Di Isi',
            'email.email'=> 'Alamat Email Tidak Valid',
            'email.unique' => 'Alamat Email Sudah Terdaftar',
            'nik.required' => 'NIK Harus Di Isi',
            'nik.max' => 'NIK Maksimal 16 Karakter',
            'nik.unique' => 'NIK Sudah Terdaftar',
            'telp.required'=> 'Nomor Telepon Harus Di Isi',
            'telp.max'=> 'Nomor Telepon Maksimal 13 karakter',
            'password.required' => 'Password Harus Di Isi',
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
            'nik' => $data['nik'],
            'telp' => $data['telp'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
