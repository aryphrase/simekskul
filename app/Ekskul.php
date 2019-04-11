<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    //
    protected $table = 'ekskul';
    protected $primaryKey = 'id_ekskul';

    protected $fillable = ['nama_ekskul', 'logo_ekskul', 'jenis_ekskul_id', 'deskripsi_ekskul', 'user_id'];

    public $timestamps = false;
}
