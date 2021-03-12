<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lokasi;
use Illuminate\Http\Request;

class ManageLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Admin | Data Lokasi";
        $data['layout'] = "admin.manage_lokasi.index";
        $data['lokasi'] = Lokasi::all();
        return view('layouts.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Admin | Tambah Lokasi";
        $data['layout'] = "admin.manage_lokasi.form";
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
            'nama_lokasi' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);
        Lokasi::create($request->all());
        return redirect('/admin/manage_lokasi')->with('status', 'Data ' . $request->nama_lokasi . ' Berhasil Ditambahkan!');
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
        $data['title'] = "Admin | Edit Lokasi";
        $data['layout'] = "admin.manage_lokasi.form";
        $data['lokasi'] = Lokasi::find($id);
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
            'nama_lokasi' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);
        $lokasi = Lokasi::find($id);
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->lat = $request->lat;
        $lokasi->long = $request->long;
        $lokasi->save();
        return redirect('/admin/manage_kategori_laporan')->with('status', 'Data ' . $request->nama_lokasi . ' Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);
        $namaLokasi = $lokasi->nama_lokasi;
        $lokasi->delete();
        return redirect('/admin/manage_lokasi')->with('statusDelete', 'Data ' . $namaLokasi . ' Berhasil Dihapus!');
    }
}
