<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $fillable = ['judul_laporan', 'ketua_ekskul', 'ketua_pelaksana', 'pendahuluan', 'tempat_kegiatan', 'waktu_kegiatan', 'hasil_yangdicapai', 'hambatan_kegiatan', 'pemecahan_masalah', 'penutup', 'sasaran', 'susunan_panitia', 'susunan_acara', 'pemasukan_kegiatan', 'pengeluaran_kegiatan', 'ekskul_id', 'user_id'];
            
    public $timestamps = false;
 }