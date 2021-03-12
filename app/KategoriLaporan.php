<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriLaporan extends Model
{
    protected $table = 'kategori_laporans';
    protected $fillable = [
        'nama_kategori',
    ];
    
    public function laporan()
    {
        return $this->belongsTo('App\Laporan');
    }
}
