<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
	
    //
    protected $table = 'proker';
    protected $primaryKey = 'id_proker';

    protected $fillable = ['nama_proker', 'deskripsi_proker', 'frekuensi_proker_id', 'waktu_proker', 'tempat_proker', 'jenis_proker_id', 'target_proker', 'anggaran_proker', 'status_proker_id', 'user_id', 'ekskul_id'];
    
    public $timestamps = false;
    
}