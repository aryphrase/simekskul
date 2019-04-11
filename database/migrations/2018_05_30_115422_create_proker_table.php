<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proker', function (Blueprint $table) {
            $table->increments('id_proker');
            $table->string('nama_proker');
            $table->text('deskripsi_proker');
            $table->integer('frekuensi_proker_id');
            $table->date('waktu_proker');
            $table->string('tempat_proker');
            $table->integer('jenis_proker_id');
            $table->string('target_proker');
            $table->string('anggaran_proker');
            $table->integer('ekskul_id');
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
        Schema::dropIfExists('proker');
    }
}
