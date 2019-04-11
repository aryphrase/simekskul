<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Siswa;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->string('nama_siswa');
            $table->string('kelas_siswa');
            $table->integer('semester_id');
            $table->string('tempatlahir_siswa');
            $table->date('tanggallahir_siswa');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('alamat_siswa');
            $table->string('alamat_ayah');
            $table->string('alamat_ibu');
            $table->string('nomorhp_siswa');
            $table->string('nomorhp_ayah');
            $table->string('nomorhp_ibu');
            $table->string('ig_siswa');
            $table->string('foto_siswa');
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
        Schema::dropIfExists('siswa');
    }
}
