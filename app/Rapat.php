<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    //
    protected $table = 'rapat';
    protected $primaryKey = 'id_rapat';

    protected $fillable = ['nama_rapat', 'peserta_rapat', 'tempat_rapat', 'tanggal_rapat', 'waktumulai_rapat', 'waktuselesai_rapat', 'jenis_rapat_id', 'agenda_rapat', 'hasil_rapat', 'user_id', 'ekskul_id'];
    
    public $timestamps = false;
}
