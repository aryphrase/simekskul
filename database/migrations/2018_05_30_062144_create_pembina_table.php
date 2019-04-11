<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Pembina;

class CreatePembinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pembina', function (Blueprint $table) {
            $table->increments('id_pembina');
            $table->string('nama_pembina');
            $table->string('foto_pembina');
            $table->string('tempatlahir_pembina');
            $table->date('tanggallahir_pembina');
            $table->string('alamat_pembina');
            $table->string('nomorhp_pembina');
            $table->string('ig_pembina');
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
        Schema::dropIfExists('pembina');
    }
}
