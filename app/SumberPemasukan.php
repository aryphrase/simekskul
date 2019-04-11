<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumberPemasukan extends Model
{
    //
    protected $table = 'ref_sumberpemasukan';
    protected $primaryKey = 'id_sumberpemasukan';

    protected $fillable = ['nama_sumberpemasukan'];

    public $timestamps = false;
}
