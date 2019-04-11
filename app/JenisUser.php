<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    //
    protected $table = 'ref_jenisuser';
    protected $primaryKey = 'id_jenisuser';

    protected $fillable = ['nama_jenisuser'];

    public $timestamps = false;
}
