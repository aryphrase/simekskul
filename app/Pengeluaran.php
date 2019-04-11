<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    //
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';

    protected $fillable = ['item_pengeluaran', 'tanggal_pengeluaran', 'jumlah_item', 'satuan_item_id', 'jenis_pengeluaran_id', 'nominal_pengeluaran', 'pic_pengeluaran', 'user_id', 'ekskul_id'];
    
    public $timestamps = false;
}
