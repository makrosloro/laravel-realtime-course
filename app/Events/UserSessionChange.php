<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserSessionChange implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function broadcastOn()
    {
        \Log::debug("{$this->message}");
        \Log::debug("{$this->type}");
        return new Channel('notifications');
    }
}
