<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = 'provinsi';
    protected $primaryKey = 'id_provinsi';
    protected $fillable = [
        'provinsi'
    ];
}
