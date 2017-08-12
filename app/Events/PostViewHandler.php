<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostViewHandler
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Handle event
     *
     * @param $model
     */
    public function handle($model)
    {
        if (!$this->isPostViewed($model)) {
            $model->increment('view');
            $this->storePost($model);
        }
    }

    /**
     * Check session for post
     *
     * @param $model
     * @return bool
     */
    private function isPostViewed($model)
    {
        $viewed = request()->session()->get('viewed_posts', []);

        return array_key_exists($model->id, $viewed);
    }


    /**
     * Save session for post
     * @param $model
     */
    private function storePost($model)
    {
        $key = 'viewed_posts.' . $model->id;

        request()->session()->put($key, time());
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
