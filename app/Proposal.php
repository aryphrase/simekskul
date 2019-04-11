<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //
    protected $table = 'proposal';
    protected $primaryKey = 'id_proposal';

    protected $fillable = ['judul_proposal', 'ketua_ekskul', 'ketua_pelaksana', 'pendahuluan', 'nama_kegiatan', 'dasar_kegiatan', 'tujuan_kegiatan', 'pelaksanaan_kegiatan', 'penutup', 'sasaran', 'susunan_panitia', 'susunan_acara', 'pemasukan_kegiatan', 'pengeluaran_kegiatan', 'ekskul_id', 'user_id'];
    
    public $timestamps = false;
}
