<?php

namespace App\Observers;

use App\Models\Presence;
use Illuminate\Support\Str;

class PresenceObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Presence  $presence
     * @return void
     */
    public function creating (Presence $presence) {
        $presence->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Presence "created" event.
     *
     * @param  \App\Models\Presence  $presence
     * @return void
     */
    public function created(Presence $presence)
    {
        //
    }

    /**
     * Handle the Presence "updated" event.
     *
     * @param  \App\Models\Presence  $presence
     * @return void
     */
    public function updated(Presence $presence)
    {
        //
    }

    /**
     * Handle the Presence "deleted" event.
     *
     * @param  \App\Models\Presence  $presence
     * @return void
     */
    public function deleted(Presence $presence)
    {
        //
    }

    /**
     * Handle the Presence "restored" event.
     *
     * @param  \App\Models\Presence  $presence
     * @return void
     */
    public function restored(Presence $presence)
    {
        //
    }

    /**
     * Handle the Presence "force deleted" event.
     *
     * @param  \App\Models\Presence  $presence
     * @return void
     */
    public function forceDeleted(Presence $presence)
    {
        //
    }
}
