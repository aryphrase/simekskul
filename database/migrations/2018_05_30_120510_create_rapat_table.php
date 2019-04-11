<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rapat', function (Blueprint $table) {
            $table->increments('id_rapat');
            $table->string('nama_rapat');
            $table->string('peserta_rapat');
            $table->string('tempat_rapat');
            $table->date('tanggal_rapat');
            $table->time('waktumulai_rapat');
            $table->time('waktuselesai_rapat');
            $table->integer('jenis_rapat_id');
            $table->text('agenda_rapat');
            $table->text('hasil_rapat');
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
        Schema::dropIfExists('rapat');
    }
}
