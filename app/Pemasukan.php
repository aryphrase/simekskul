<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    //
    protected $table = 'pemasukan';
    protected $primaryKey = 'id_pemasukan';

    protected $fillable = ['item_pemasukan', 'tanggal_pemasukan', 'sumber_pemasukan_id', 'nominal_pemasukan', 'pic_pemasukan', 'user_id', 'ekskul_id'];
    
    public $timestamps = false;
}
