<?php
namespace App\Observers;

use App\Notifications\NewTicket;
use App\Tickets;
use App\User;

class ItemObserver
{
    public function created(Tickets $ticket)
    {
        $author = $ticket->user;
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new NewTicket($ticket,$author));
        }
    }
}