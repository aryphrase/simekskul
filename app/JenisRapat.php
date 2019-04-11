<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisRapat extends Model
{
    //
    protected $table = 'ref_jenisrapat';
    protected $primaryKey = 'id_jenisrapat';

    protected $fillable = ['nama_jenisrapat'];

    public $timestamps = false;
}
