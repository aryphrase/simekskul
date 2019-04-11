<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkskulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ekskul', function (Blueprint $table) {
            $table->increments('id_ekskul');
            $table->string('nama_ekskul');
            $table->string('logo_ekskul');
            $table->string('foto_ekskul');
            $table->text('deskripsi_ekskul');
            $table->string('jenis_ekskul_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('ekskul');
    }
}
