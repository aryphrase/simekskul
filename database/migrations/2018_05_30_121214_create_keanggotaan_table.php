<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeanggotaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('keanggotaan', function (Blueprint $table) {
            $table->increments('id_keanggotaan');
            $table->integer('siswa_id');
            $table->integer('ekskul_id');
            $table->integer('statusanggota_id');
            $table->string('jabatan');
            $table->string('alasan_bergabung');
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
        Schema::dropIfExists('keanggotaan');
    }
}
