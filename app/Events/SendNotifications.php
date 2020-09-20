<?php

namespace App\Events;

use App\Notification;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class SendNotifications implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification;

    public function __construct(Notification $notification)
    {
        Log::info('from class');
        Log::info($notification);
        $this->notification=$notification;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notifications.'.$this->notification->user_id);
    }

    public function broadcastAs()
    {
        return 'notify';
    }
}
