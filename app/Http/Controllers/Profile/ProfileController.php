<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $data['title'] = "Admin | Profile";
        } elseif (auth()->user()->role == 'petugas') {
            $data['title'] = "Petugas | Profile";
        } else {
            $data['title'] = "Pengguna | Profile";
        }
        $data['layout'] = "profile.index";
        return view('layouts.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|unique:users',
            'nik' => 'required|max:16|unique:users,nik',
            'telp' => 'required|max:13',
        ]);

        $profile = User::find($id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->nik = $request->nik;
        $profile->telp = $request->telp;
        $profile->save();
        return redirect('/profile')->with('status', 'Data Profil Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request)
    {
        $this->validate($request, [
            'currentPassword' => 'required',
            'newPassword' => 'required|max:255'
        ]);

        // Cross check the old password
        $oldPassword = Auth::user()->newPassword; // hashed
        if ($request->newPassword === $request->confirmPassword) {
            if (Hash::check($request->currentPassword, $oldPassword)) {
                // old pass shoud not be same as new pass
                if (!Hash::check($request->newPassword, $oldPassword)) {
                    $user = User::find(Auth::id());
                    $user->newPassword = Hash::make($request->newPassword);
                    $user->save();

                    // Logout
                    Auth::logout();
                    return redirect()->back();
                } else {
                    return redirect('/profile')->with('statusDelete', 'Password baru tidak boleh sama dengan password lama');
                }
            } else {
                return redirect('/profile')->with('statusDelete', 'Password lama tidak sesuai');
            }
        } else {
            return redirect('/profile')->with('statusDelete', 'Password baru dan password konfirmasi anda tidak cocok');
        }
    }
}
