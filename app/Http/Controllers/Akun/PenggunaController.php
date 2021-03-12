<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Pengguna | Dashboard";
        $data['layout'] = "pengguna.index";
        $data['laporanDiajukanCount'] = Laporan::where('user_id', Auth::user()->id)->where('status_laporan', 'Menunggu')->count();
        $data['laporanSelesaiCount'] = Laporan::where('user_id', Auth::user()->id)->where('status_laporan', 'Selesai')->count();
        $data['laporanDitolakCount'] = Laporan::where('user_id', Auth::user()->id)->where('status_laporan', 'Ditolak')->count();
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
