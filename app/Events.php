<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id_event';
    protected $fillable = [
        'judul', 'tempat', 'provinsi', 'deskripsi', 'id_user','sampul','status'
    ];

    public function ticket(){
        return $this->hasMany('App\Tickets','id_event');
    }

    public function user(){
        return $this->hasOne('App\User','id','id_user');
    }
}
