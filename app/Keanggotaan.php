<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{
    //
    protected $table = 'keanggotaan';
    protected $primaryKey = 'id_keanggotaan';

    protected $fillable = ['siswa_id', 'ekskul_id', 'statusanggota_id', 'jabatan', 'alasan_bergabung'];
    
    public $timestamps = false;
}
