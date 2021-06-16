<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Laporan;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Admin | Dashboard";
        $data['layout'] = "admin.index";
        $data['adminCount'] = User::where('role','admin')->count();
        $data['petugasCount'] = User::where('role','petugas')->count();
        $data['userCount'] = User::where('role','pengguna')->count();
        $data['laporanMenungguCount'] = Laporan::where('status_laporan', 'Menunggu')->count();
        $data['laporanSelesaiCount'] = Laporan::where('status_laporan', 'Selesai')->count();
        $data['laporanDitolakCount'] = Laporan::where('status_laporan', 'Ditolak')->count();
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
        //
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
}
