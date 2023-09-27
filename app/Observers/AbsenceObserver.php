<?php

namespace App\Observers;

use App\Models\Absence;
use Illuminate\Support\Str;

class AbsenceObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function creating (Absence $absence) {
        $absence->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Absence "created" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function created(Absence $absence)
    {
        //
    }

    /**
     * Handle the Absence "updated" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function updated(Absence $absence)
    {
        //
    }

    /**
     * Handle the Absence "deleted" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function deleted(Absence $absence)
    {
        //
    }

    /**
     * Handle the Absence "restored" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function restored(Absence $absence)
    {
        //
    }

    /**
     * Handle the Absence "force deleted" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function forceDeleted(Absence $absence)
    {
        //
    }
}
