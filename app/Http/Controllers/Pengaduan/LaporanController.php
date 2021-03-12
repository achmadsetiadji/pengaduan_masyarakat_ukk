<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use App\KategoriLaporan;
use App\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LaporanController extends Controller
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
            $data['laporan'] = Laporan::all();
        } elseif (auth()->user()->role == 'petugas') {
            $data['title'] = "Petugas | Data Laporan Pengaduan";
            $data['laporan'] = Laporan::all();
        } else {
            $data['title'] = "Pengguna | Data Laporan Pengaduan";
            $data['laporan'] = Laporan::where('user_id', Auth::user()->id)->get();
        }
        $data['layout'] = "pengaduan.laporan.index";
        return view('layouts.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role == 'admin') {
            $data['title'] = "Admin | Tambah Laporan Pengaduan";
        } elseif (auth()->user()->role == 'petugas') {
            $data['title'] = "Petugas | Tambah Laporan Pengaduan";
        } else {
            $data['title'] = "Pengguna | Tambah Laporan Pengaduan";
            $data['kategori'] = KategoriLaporan::all();
        }
        $data['layout'] = "pengaduan.laporan.form";
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
        // if ($request->type == "Pengaduan") {
            if ($request->hasfile('image')) {
                $request->validate([
                    'kategori_id' => 'required',
                    'judul_laporan' => 'required',
                    'isi_laporan' => 'required',
                    'tanggal_kejadian' => 'required',
                    'lokasi_id' => 'required',
                    'instansi_id' => 'required',
                    'lampiran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('upload/images'), $imageName);
            } else {
                $request->validate([
                    'kategori_id' => 'required',
                    'judul_laporan' => 'required',
                    'isi_laporan' => 'required',
                    'tanggal_kejadian' => 'required',
                    'lokasi_id' => 'required',
                    'instansi_id' => 'required',
                ]);
                $imageName = '-';
            }
        // } else {
            // if ($request->hasfile('image')) {
            //     $request->validate([
            //         'kategori_id' => 'required',
            //         'judul_laporan' => 'required',
            //         'isi_laporan' => 'required',
            //         'lokasi_id' => 'required',
            //         'instansi_id' => 'required',
            //         'lampiran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //     ]);
            //     $imageName = time() . '.' . $request->image->extension();
            //     $request->image->move(public_path('upload/images'), $imageName);
            // } else {
            //     $request->validate([
            //         'kategori_id' => 'required',
            //         'judul_laporan' => 'required',
            //         'isi_laporan' => 'required',
            //         'lokasi_id' => 'required',
            //         'instansi_id' => 'required',
            //     ]);
            //     $imageName = '-';
            // }
        // }
        Laporan::create([
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::user()->id,
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'lokasi_id' => $request->lokasi_id,
            'instansi_id' => $request->instansi_id,
            'tanggal_laporan' => Carbon::now()->format('Y-m-d H:i:s'),
            'lampiran' => $imageName,
            'type' => $request->type,
            'status_laporan' => 'Menunggu',
        ]);
        return redirect('/'.Auth::user()->role.'/laporan')->with('status', 'Data Laporan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->role == 'admin') {
            $data['title'] = "Admin | Detail Laporan Pengaduan";
        } elseif (auth()->user()->role == 'petugas') {
            $data['title'] = "Petugas | Detail Laporan Pengaduan";
        } else {
            $data['title'] = "Pengguna | Detail Laporan Pengaduan";
        }
        $data['layout'] = "pengaduan.laporan.show";
        $data['laporan'] = Laporan::find($id);
        return view('layouts.main', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role == 'admin') {
            $data['title'] = "Admin | Data Laporan Pengaduan";
        } elseif (auth()->user()->role == 'petugas') {
            $data['title'] = "Petugas | Data Laporan Pengaduan";
        } else {
            $data['title'] = "Pengguna | Data Laporan Pengaduan";
        }
        $data['layout'] = "pengaduan.laporan.form";
        $data['laporan'] = Laporan::find($id);
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
