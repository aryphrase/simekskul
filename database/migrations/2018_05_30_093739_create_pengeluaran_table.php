<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengeluaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->increments('id_pengeluaran');
            $table->string('item_pengeluaran');
            $table->date('tanggal_pengeluaran');
            $table->string('jumlah_item');
            $table->integer('satuan_item_id');
            $table->integer('jenis_pengeluaran_id');
            $table->bigInteger('nominal_pengeluaran');
            $table->string('pic_pengeluaran');
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
        Schema::dropIfExists('pengeluaran');
    }
}
