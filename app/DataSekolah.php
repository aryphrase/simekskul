<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSekolah extends Model
{
    //
    protected $table = 'ref_datasekolah';
    protected $primaryKey = 'id_datasekolah';

    protected $fillable = ['nama_kepsek', 
    					'nama_wkkesiswaan', 
    					'nama_ketuaosis', 
    					'nama_kasie1',
    					'nama_kasie2',
    					'nama_kasie3',
    					'nama_kasie4',
    					'nama_kasie5',
    					'nama_kasie6',
    					'nama_kasie7',
    					'nama_kasie8',
    					'nama_kasie9',
    					'nama_kasie10',
    				];

    public $timestamps = false;
}
