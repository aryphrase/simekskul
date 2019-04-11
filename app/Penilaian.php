<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    //
    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';

    protected $fillable = ['siswa_id', 'ekskul_id', 'semester_id', 'nilai_id', 'user_id', 'pembina_id'];
    
    public $timestamps = false;
}
