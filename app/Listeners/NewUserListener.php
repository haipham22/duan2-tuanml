<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use App\Mail\NewUserEmail;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserListener
{
    /**
     * @var User
     */
    private $user;

    /**
     * Create the event listener.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  NewUserEvent  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        \Mail::to($this->user)
            ->queue(new NewUserEmail($this->user));
    }
}
