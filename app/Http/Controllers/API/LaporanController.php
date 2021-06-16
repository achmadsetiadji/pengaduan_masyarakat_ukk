<?php

namespace App\Http\Controllers\API;

use App\Laporan;
use App\Http\Controllers\Controller;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Throwable;

class LaporanController extends Controller
{
    public function store(Request $request)
    {
        try {
            $laporan = new Laporan;
            $laporan->kategori_id = $request->kategori_id;
            $laporan->kode = Str::random(10);
            $laporan->user_id = Auth::user()->id;
            $laporan->judul_laporan = $request->judul_laporan;
            $laporan->isi_laporan = $request->isi_laporan;
            $laporan->tanggal_kejadian = Date('Y-m-d', strtotime($request->tanggal_kejadian));
            $laporan->lokasi_id = $request->lokasi_id;
            $laporan->tanggal_laporan = Date(now());
            $laporan->lampiran = $request->lampiran;
            $laporan->status_laporan = 'Menunggu';
            $laporan->save();
        } catch (Throwable $th) {
            return $th;
        }
        return response()->json([
            'status' => 200,
            'message' => 'Success insert data laporan pengaduan',
            'laporan' => $laporan
        ]);
    }

    public function show($id)
    {
        $tanggapan = Tanggapan::where('laporan_id', $id)->get();

        return response()->json([
            'status' => 200,
            'message' => 'Success show data tanggapan by id laporan',
            'laporan' => $tanggapan
        ]);
    }
}
