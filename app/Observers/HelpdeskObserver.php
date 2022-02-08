<?php

namespace App\Observers;

use App\Events\HelpdeskCreated;
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
        // $users = User::where('role', 'admin')->get();
        $users = User::all();
        foreach($users as $user) {
            $user->notify(new NewHelpdesk($helpdesk, $created_by, $user));
        }
        HelpdeskCreated::dispatch('helpdesk test message');
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
