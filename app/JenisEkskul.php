<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisEkskul extends Model
{
    //
    protected $table = 'ref_jenisekskul';
    protected $primaryKey = 'id_jenisekskul';

    protected $fillable = ['nama_jenisekskul'];

    public $timestamps = false;
}
