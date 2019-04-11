<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembinaan extends Model
{
    //
    protected $table = 'pembinaan';
    protected $primaryKey = 'id_pembinaan';

    protected $fillable = ['ekskul_id', 'pembina_id', 'user_id'];
    
    public $timestamps = false;
}
