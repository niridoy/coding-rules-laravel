<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use App\Events\PostCreated;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewUserSub
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
        $user = $event->user;

        Subscription::create([
            'user_id' => $user,
            'days' => 30,
            'start_date',
            'end_date'
        ]);

    }
}
