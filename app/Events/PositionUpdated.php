<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PositionUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ladder;

    public function __construct($ladder)
    {
        $this->ladder = $ladder;
    }

    public function broadcastOn()
    {
        return new Channel('liveladder');
    }

    public function broadcastWith()
    {
        $ladder = [];

        foreach ($this->ladder as $team)
        {
            $ladder[] = [
                'id' => $team->id,
                'name' => $team->name,
                'position' => $team->position
            ];
        }

        return $ladder;
    }
}