<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id_ticket';
    protected $fillable = [
        'id_event', 'user_id', 'payment_status'
    ];
}
