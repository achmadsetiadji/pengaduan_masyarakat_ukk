<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';
    protected $fillable = [
        'kategori_id',
        'user_id',
        'judul_laporan',
        'isi_laporan',
        'tanggal_kejadian',
        'lokasi_kejadian',
        'instansi_tujuan',
        'tanggal_laporan',
        'lampiran',
        'status_laporan',
    ];

    public function user()
    {
        return $this->hasMany('App\user', 'id', 'user_id');
    }

    public function kategori()
    {
        return $this->hasMany('App\KategoriLaporan', 'id', 'kategori_id');
    }
}
