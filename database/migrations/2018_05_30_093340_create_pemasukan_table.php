<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemasukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->increments('id_pemasukan');
            $table->string('item_pemasukkan');
            $table->date('tanggal_pemasukkan');
            $table->string('sumber_pemasukan_id');
            $table->bigInteger('nominal_pemasukan');
            $table->string('pic_pemasukan');
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
        Schema::dropIfExists('pemasukan');
    }
}
