<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrekuensiProker extends Model
{
    //
    protected $table = 'ref_frekuensiproker';
    protected $primaryKey = 'id_frekuensiproker';

    protected $fillable = ['nama_frekuensiproker'];

    public $timestamps = false;
}
