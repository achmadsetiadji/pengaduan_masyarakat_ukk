<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use App\KategoriLaporan;
use App\Laporan;
use App\Lokasi;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
Use PDF;
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
            $data['layout'] = "pengaduan.laporan.index.petugas";
            $data['laporan'] = Laporan::all();
        } elseif (auth()->user()->role == 'petugas') {
            $data['title'] = "Petugas | Data Laporan Pengaduan";
            $data['layout'] = "pengaduan.laporan.index.petugas";
            $data['laporan'] = Laporan::all();
        } else {
            $data['title'] = "Pengguna | Data Laporan Pengaduan";
            $data['layout'] = "pengaduan.laporan.index.pengguna";
            $data['laporan'] = Laporan::where('user_id', Auth::user()->id)->get();
        }
        // $data['layout'] = "pengaduan.laporan.index";
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
            $data['layout'] = "pengaduan.laporan.form";
            return view('layouts.main', $data);
        } elseif (auth()->user()->role == 'petugas') {
            $data['title'] = "Petugas | Tambah Laporan Pengaduan";
            $data['layout'] = "pengaduan.laporan.form";
            return view('layouts.main', $data);
        } else {
            $data['title'] = "Pengguna | Tambah Laporan Pengaduan";
            $data['kategori'] = KategoriLaporan::all();
            $data['lokasi'] = Lokasi::all();
            $data['layout'] = "pengaduan.laporan.form";

            //lokasi
            // $provinsi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            $responseKabupaten = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32');
            $responseKecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3214');
            $responseKelurahan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=3214010');

            // $data['provinsi'] = $provinsi->json();
            $resultKabupaten = json_decode($responseKabupaten);
            $resultKecamatan = json_decode($responseKecamatan);
            $resultKelurahan = json_decode($responseKelurahan);

            foreach ($resultKabupaten as $kabupaten) {
                foreach ($resultKecamatan as $kecamatan) {
                    foreach ($resultKelurahan as $kelurahan) {
                        return view('layouts.main', $data, compact('kabupaten', 'kecamatan','kelurahan'));
                    }
                }
            }
        }
        // $data['layout'] = "pengaduan.laporan.form";
        // return view('layouts.main', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('lampiran')) {
            $request->validate([
                'lampiran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->lampiran->extension();
            $request->lampiran->move(public_path('upload/lampiran'), $imageName);

        } else {
            $imageName = '-';
        }

        Laporan::create([
            'kategori_id' => $request->kategori_id,
            'kode' => Str::random(10),
            'user_id' => Auth::user()->id,
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'tanggal_kejadian' => Date('Y-m-d',strtotime($request->tanggal_kejadian)),
            'lokasi_id' => $request->lokasi_id,
            'tanggal_laporan' => Date(now()),
            'lampiran' => $imageName,
            'status_laporan' => 'Menunggu',
        ]);
        return redirect('/'.Auth::user()->role.'/laporan')->with('status', 'Data Pengaduan Berhasil Ditambahkan!');
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
            $data['layout'] = "pengaduan.laporan.show.petugas";
        } elseif (auth()->user()->role == 'petugas') {
            $data['title'] = "Petugas | Detail Laporan Pengaduan";
            $data['layout'] = "pengaduan.laporan.show.petugas";
        } else {
            $data['title'] = "Pengguna | Detail Laporan Pengaduan";
            $data['tanggapan'] = Tanggapan::where('laporan_id', $id)->get();
            $data['layout'] = "pengaduan.laporan.show.pengguna";
        }
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
        $data['title'] = "Pengguna | Detail Laporan Pengaduan";
        $data['laporan'] = Laporan::find($id);
        $data['lokasi'] = Lokasi::all();
        $data['kategori'] = KategoriLaporan::all();
        $data['layout'] = "pengaduan.laporan.form";
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
        if ($request->hasfile('lampiran')) {
            $request->validate([
                'lampiran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->lampiran->extension();
            $request->lampiran->move(public_path('upload/lampiran'), $imageName);
        } else {
            $imageName = '-';
        }

        $laporan = Laporan::find($id);
        $laporan->kategori_id = $request->kategori_id;
        $laporan->kode = Str::random(10);
        $laporan->user_id = Auth::user()->id;
        $laporan->judul_laporan = $request->judul_laporan;
        $laporan->isi_laporan = $request->isi_laporan;
        $laporan->tanggal_kejadian = Date('Y-m-d', strtotime($request->tanggal_kejadian));
        $laporan->lokasi_id = $request->lokasi_id;
        $laporan->tanggal_laporan = Date(now());
        $laporan->lampiran = $imageName;
        $laporan->status_laporan = 'Menunggu';
        $laporan->save();
        return redirect('/' . Auth::user()->role . '/laporan')->with('status', 'Data Pengaduan Berhasil Diajukan Ulang!');
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

    public function exportPDF()
    {
        $laporan = Laporan::all();
        $pdf = 'PDF'::loadView('admin.report.index', compact('laporan'))->setPaper('a4', 'potrait');
        return $pdf->stream('laporan Pengaduan - ' . date('Y-m-d_H-i-s') . '.pdf');
    }

    public function gmaps()
    {
        return view('gmaps');
    }
}
