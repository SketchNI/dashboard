<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Email implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public $service;

    /**
     * @var array|null
     */
    public $mails;

    /**
     * Create a new event instance.
     *
     * @param string $service
     * @param array|null $mails
     */
    public function __construct(string $service, ?array $mails)
    {
        $this->service = $service;
        $this->mails = $mails;
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
        return strtolower($this->service);
    }

    public function broadcastWith()
    {
        return $this->mails;
    }
}
