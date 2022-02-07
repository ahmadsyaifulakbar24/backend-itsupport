<?php
namespace App\Observers;

use App\Models\Helpdesk;
use App\Models\User;
use App\Notifications\NewHelpdesk;

class HelpdeskObserver {
    public function craeted(Helpdesk $helpdesk) 
    {
        $created_by = $helpdesk->user;
        $users = User::where('role', 'admin')->get();
        foreach ($users as $user) {
            $user->notify(New NewHelpdesk($helpdesk, $created_by));
        }
    }
}