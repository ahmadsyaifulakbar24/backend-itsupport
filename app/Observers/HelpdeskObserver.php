<?php

namespace App\Observers;

use App\Models\Helpdesk;
use App\Models\User;
use App\Notifications\NewHelpdesk;

class HelpdeskObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */

    public $afterCommit = true;

    /**
     * Handle the Helpdesk "created" event.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return void
     */
    public function created(Helpdesk $helpdesk)
    {
        $created_by = $helpdesk->user;
        $users = User::whereIn('role', ['admin', 'kasubag'])->get();
        foreach($users as $user) {
            $user->notify(new NewHelpdesk($helpdesk, $created_by, $user));
        }
    }

    /**
     * Handle the Helpdesk "updated" event.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return void
     */
    public function updated(Helpdesk $helpdesk)
    {
        //
    }

    /**
     * Handle the Helpdesk "deleted" event.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return void
     */
    public function deleted(Helpdesk $helpdesk)
    {
        //
    }

    /**
     * Handle the Helpdesk "restored" event.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return void
     */
    public function restored(Helpdesk $helpdesk)
    {
        //
    }

    /**
     * Handle the Helpdesk "force deleted" event.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return void
     */
    public function forceDeleted(Helpdesk $helpdesk)
    {
        //
    }
}
