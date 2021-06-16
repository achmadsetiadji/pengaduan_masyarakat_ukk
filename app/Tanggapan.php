<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    protected $fillable = [
        'laporan_id',
        'user_id',
        'tanggal_tanggapan',
        'tanggapan',
        'status_tanggapan',
    ];

    public function user()
    {
        return $this->hasMany('App\user', 'id', 'user_id');
    }

    public function laporan()
    {
        return $this->hasMany('App\Laporan', 'id', 'laporan_id');
    }
}
