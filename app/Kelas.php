<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'ref_kelas';
    protected $primaryKey = 'id_kelas';

    protected $fillable = ['nama_kelas'];

    public $timestamps = false;
}
