<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use App\Laporan;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $data['title'] = "Admin | Data Laporan Pengaduan";
        } else {
            $data['title'] = "Petugas | Data Laporan Pengaduan";
        }
        $data['layout'] = "pengaduan.tanggapan.index";
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
        $request->validate([
            'tanggapan' => 'required',
        ]);

        $tanggapan = new Tanggapan;
        $tanggapan->laporan_id = $request->laporan_id;
        $tanggapan->user_id = Auth::user()->id;
        $tanggapan->tanggal_tanggapan = Date(now());
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->status_tanggapan = 'Selesai';
        $tanggapan->save();

        $laporan = Laporan::find($request->laporan_id);
        $laporan->status_laporan = 'Selesai';
        $laporan->save();
        return redirect('/'.Auth::user()->role.'/laporan')->with('status', 'Data Laporan Berhasil Ditanggapi!');
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

    public function tolak(Request $request)
    {
        $tanggapan = new Tanggapan;
        $tanggapan->laporan_id = $request->laporan_id;
        $tanggapan->user_id = Auth::user()->id;
        $tanggapan->tanggal_tanggapan = Date(now());
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->status_tanggapan = 'Ditolak';
        $tanggapan->save();

        $laporan = Laporan::find($request->laporan_id);
        $laporan->status_laporan = 'Ditolak';
        $laporan->save();
        return redirect('/' . Auth::user()->role . '/laporan')->with('status', 'Data Laporan Berhasil Ditanggapi!');
    }
}
