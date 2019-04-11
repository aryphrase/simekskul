<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = ['nama_siswa', 'kelas_id', 'tempatlahir_siswa', 'tanggallahir_siswa', 'nama_ayah', 'nama_ibu', 'alamat_siswa', 'alamat_ayah', 'alamat_ibu', 'nomorhp_siswa', 'nomorhp_ayah', 'nomorhp_ibu', 'ig_siswa', 'foto_siswa', 'user_id'];

    
    public $timestamps = false;
}
