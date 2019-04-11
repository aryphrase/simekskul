<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    //
    protected $table = 'pembina';
    protected $primaryKey = 'id_pembina';

    protected $fillable = ['id_pembina', 'nama_pembina', 'foto_pembina', 'jeniskelamin_pembina', 'tempatlahir_pembina', 'tanggallahir_pembina', 'alamat_pembina', 'nomorhp_pembina', 'ig_pembina', 'user_id'];

    
    public $timestamps = false;
}
