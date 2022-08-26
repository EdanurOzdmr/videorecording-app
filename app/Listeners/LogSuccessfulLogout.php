<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        if (Auth::user()->role=='user'){
             User::find( Auth::user()->id)
                ->update([
                    'user_status'=>'0'
                ]);
        }

    }
}
