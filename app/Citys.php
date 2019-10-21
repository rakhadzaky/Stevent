<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    protected $table = 'kota';
    protected $primaryKey = 'id_kota';
    protected $fillable = [
        'id_provinsi','nama_kota'
    ];
}
