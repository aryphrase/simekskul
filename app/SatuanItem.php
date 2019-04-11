<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatuanItem extends Model
{
    //
    protected $table = 'ref_satuanitem';
    protected $primaryKey = 'id_satuanitem';

    protected $fillable = ['nama_satuanitem'];

    public $timestamps = false;
}
