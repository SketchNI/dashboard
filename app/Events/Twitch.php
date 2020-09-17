<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Twitch implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var array|null
     */
    public $channels;

    /**
     * Create a new event instance.
     *
     * @param array|null $channels
     */
    public function __construct(?array $channels)
    {
        $this->channels = $channels;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel
     */
    public function broadcastOn(): PrivateChannel
    {
        return new PrivateChannel('App.Models.User.1');
    }

    public function broadcastAs(): string
    {
        return "twitch";
    }

    public function broadcastWith()
    {
        return $this->channels;
    }
}
