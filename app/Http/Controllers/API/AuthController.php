<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = User::where('username', $request->username)->first();
        if (!$credentials) {
            return response()->json([
                'status' => 404,
                'message' => 'user not found!'
            ]);
        }
        if (!Hash::check($request->password, $credentials->password)) {
            return response()->json([
                'status' => 401,
                'message' => 'please check your password!'
            ]);
        }
        $credentials->update(['api_token' => Str::random(20)]);
        return response()->json([
            'status' => 200,
            'message' => 'Success Login',
            'user' => $credentials
        ]);
    }

    public function logout(Request $request)
    {
        $header = $request->header('Authorization');
        $token = explode(' ', $header)[1];
        $user = User::where('api_token', $token)->first();
        $user->api_token = null;
        $user->save();
        return response()->json([
            'status' => 200,
            'message' => 'Success logout',
            'user' => $user
        ]);
    }

    public function register(Request $request)
    {
        try {
            $user = new User;
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make($request->username);
            $user->nik = $request->nik;
            $user->telp = $request->telp;
            $user->save();
        } catch (Throwable $th) {
            return $th;
        }
        return response()->json([
            'status' => 200,
            'message' => 'Success register',
            'user' => $user
        ]);
    }
}
