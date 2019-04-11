<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proposal', function (Blueprint $table) {
        $table->increments('id_proposal');
            $table->string('judul_proposal');
            $table->string('ketua_ekskul');
            $table->string('ketua_pelaksana');
            $table->string('pendahuluan');
            $table->string('nama_kegiatan');
            $table->string('dasar_kegiatan');
            $table->string('tujuan_kegiatan');
            $table->string('pelaksanaan_kegiatan'); 
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
        Schema::dropIfExists('proposal');
    }
}
