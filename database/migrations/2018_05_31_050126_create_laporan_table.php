<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('laporan', function (Blueprint $table) {
        $table->increments('id_laporan');
            $table->string('judul_laporan');
            $table->string('ketua_ekskul');
            $table->string('ketua_pelaksana');
            $table->string('pendahuluan');
            $table->string('tempat_kegiatan');
            $table->string('waktu_kegiatan');
            $table->string('hasil_yangdicapai');
            $table->string('hambatan_kegiatan');
            $table->string('pemecahan_masalah');
            $table->string('penutup');
            $table->string('sasaran');
            $table->string('susunan_panitia');
            $table->string('susunan_acara');
            $table->string('pemasukan_kegiatan');
            $table->string('pengeluaran_kegiatan');
            $table->string('ekskul_id');
            $table->string('user_id');
            $table->rememberToken();
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
        //
        Schema::dropIfExists('laporan');
    }
}
