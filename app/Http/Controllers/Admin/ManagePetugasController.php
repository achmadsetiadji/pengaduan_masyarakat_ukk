<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagePetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Admin | Data Petugas";
        $data['layout'] = "admin.manage_petugas.index";
        $data['petugas'] = User::where('role', 'petugas')->get();
        return view('layouts.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Admin | Tambah Petugas";
        $data['layout'] = "admin.manage_petugas.form";
        return view('layouts.main', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|unique:users',
            'nik' => 'required|max:16|unique:users,nik',
            'telp' => 'required|max:13',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'telp' => $request->telp,
            'role' => 'petugas',
            'password' => Hash::make('000000'),
        ]);
        return redirect('/admin/manage_petugas')->with('status', 'Data ' . $request->name . ' Berhasil Ditambahkan sebagai Petugas!');
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
        $data['title'] = "Admin | Edit Petugas";
        $data['layout'] = "admin.manage_petugas.form";
        $data['petugas'] = User::find($id);
        return view('layouts.main', $data);
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
            'name' => 'required',
            'email' => 'required',
            'nik' => 'required',
            'telp' => 'required',
        ]);
        $petugas = User::find($id);
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->nik = $request->nik;
        $petugas->telp = $request->telp;
        $petugas->save();
        return redirect('/admin/manage_petugas')->with('status', 'Data Petugas dengan Nama ' . $request->name . ' Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = User::find($id);
        $namaPetugas = $petugas->name;
        $petugas->delete();
        return redirect('/admin/manage_petugas')->with('statusDelete', 'Data Petugas dengan Nama ' . $namaPetugas . ' Berhasil Dihapus!');
    }
}
