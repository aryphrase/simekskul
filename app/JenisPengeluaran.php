<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    //
    protected $table = 'ref_jenispengeluaran';
    protected $primaryKey = 'id_jenispengeluaran';

    protected $fillable = ['nama_jenispengeluaran'];

    public $timestamps = false;
}
