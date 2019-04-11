<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProker extends Model
{
    //
    protected $table = 'ref_statusproker';
    protected $primaryKey = 'id_statusproker';

    protected $fillable = ['nama_statusproker'];

    public $timestamps = false;
}
