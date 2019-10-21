<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    protected $fillable = [
        'id_event', 'user_id', 'payment_status'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function event(){
        return $this->belongsTo('App\Events','id_event');
    }
}
