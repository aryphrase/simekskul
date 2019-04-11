<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('penilaian', function (Blueprint $table) {
        $table->increments('id_nilai');
            $table->integer('siswa_id');
            $table->integer('ekskul_id');
            $table->string('semester_id');
            $table->integer('nilai_id');
            $table->integer('pembina_id');
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
        Schema::dropIfExists('penilaian');
    }
}
