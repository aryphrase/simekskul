<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //
    protected $table = 'ref_nilai';
    protected $primaryKey = 'id_nilai';

    protected $fillable = ['nama_nilai', 'deskripsi_nilai'];

    public $timestamps = false;
}
