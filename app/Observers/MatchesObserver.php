<?php

namespace App\Observers;

use App\Models\Matches;

class MatchesObserver
{
    /**
     * Handle the Matches "created" event.
     *
     * @param  \App\Models\Matches  $matches
     * @return void
     */
    public function created(Matches $matches)
    {
        //
    }

    /**
     * Handle the Matches "updated" event.
     *
     * @param  \App\Models\Matches  $matches
     * @return void
     */
    public function updated(Matches $matches)
    {
        //
    }

    /**
     * Handle the Matches "deleted" event.
     *
     * @param  \App\Models\Matches  $matches
     * @return void
     */
    public function deleted(Matches $matches)
    {
        //
    }

    /**
     * Handle the Matches "restored" event.
     *
     * @param  \App\Models\Matches  $matches
     * @return void
     */
    public function restored(Matches $matches)
    {
        //
    }

    /**
     * Handle the Matches "force deleted" event.
     *
     * @param  \App\Models\Matches  $matches
     * @return void
     */
    public function forceDeleted(Matches $matches)
    {
        //
    }
}
