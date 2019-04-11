<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisProker extends Model
{
    //
    protected $table = 'ref_jenisproker';
    protected $primaryKey = 'id_jenisproker';

    protected $fillable = ['nama_jenisproker'];

    public $timestamps = false;
}
