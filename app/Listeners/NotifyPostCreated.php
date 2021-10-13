<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use App\Events\PostCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyPostCreated
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
        // Access the post using $event->post...
        $users = User::all();

        foreach($users as $user) {
           Mail::to($user)->send('emails.post.created', $event->post);
        }
    }
}
