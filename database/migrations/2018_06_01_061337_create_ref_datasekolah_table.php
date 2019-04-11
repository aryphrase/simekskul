<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefDatasekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ref_datasekolah', function (Blueprint $table) {
         $table->increments('id_datasekolah');
            $table->string('nama_kepsek');
            $table->string('nama_wkkesiswaan');
            $table->string('nama_ketuaosis');
            $table->string('nama_kasie1');
            $table->string('nama_kasie2');
            $table->string('nama_kasie3');
            $table->string('nama_kasie4');
            $table->string('nama_kasie5');
            $table->string('nama_kasie6');
            $table->string('nama_kasie7');
            $table->string('nama_kasie8');
            $table->string('nama_kasie9');
            $table->string('nama_kasie10');
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
        Schema::dropIfExists('ref_datasekolah');
    }
}
