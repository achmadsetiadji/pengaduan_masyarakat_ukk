<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->bigInteger('user_id');
            $table->string('judul_laporan');
            $table->text('isi_laporan');
            $table->date('tanggal_kejadian');
            $table->bigInteger('lokasi_id');
            $table->bigInteger('instansi_id');
            $table->date('tanggal_laporan');
            $table->text('lampiran');
            // $table->enum('type', ['Pengaduan', 'Aspirasi', 'Permintaan Informasi']);
            $table->enum('status_laporan', ['Menunggu', 'Selesai', 'Ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
