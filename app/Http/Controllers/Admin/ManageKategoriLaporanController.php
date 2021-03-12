<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KategoriLaporan;
use Illuminate\Http\Request;

class ManageKategoriLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Admin | Data Kategori Laporan";
        $data['layout'] = "admin.manage_kategori.index";
        $data['kategoriLaporan'] = KategoriLaporan::all();
        return view('layouts.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Admin | Tambah Kategori Laporan";
        $data['layout'] = "admin.manage_kategori.form";
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
            'nama_kategori' => 'required',
        ]);
        KategoriLaporan::create($request->all());
        return redirect('/admin/manage_kategori_laporan')->with('status', 'Data ' . $request->nama_kategori . ' Berhasil Ditambahkan!');
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
        $data['title'] = "Admin | Edit Kategori Laporan";
        $data['kategoriLaporan'] = KategoriLaporan::find($id);
        $data['layout'] = "admin.manage_kategori.form";
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
            'nama_kategori' => 'required',
        ]);
        $kategoriLaporan = KategoriLaporan::find($id);
        $kategoriLaporan->nama_kategori = $request->nama_kategori;
        $kategoriLaporan->save();
        return redirect('/admin/manage_kategori_laporan')->with('status', 'Data ' . $request->nama_kategori . ' Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriLaporan = KategoriLaporan::find($id);
        $namaKategori = $kategoriLaporan->nama_kategori;
        $kategoriLaporan->delete();
        return redirect('/admin/manage_kategori_laporan')->with('statusDelete', 'Data ' . $namaKategori . '  Berhasil Dihapus!');
    }
}
