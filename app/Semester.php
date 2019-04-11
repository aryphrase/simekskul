<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //
    protected $table = 'ref_semester';
    protected $primaryKey = 'id_semester';

    protected $fillable = ['nama_semester'];

    public $timestamps = false;
}
