<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusAnggota extends Model
{
    //
    protected $table = 'ref_statusanggota';
    protected $primaryKey = 'id_statusanggota';

    protected $fillable = ['nama_statusanggota'];

    public $timestamps = false;
}
