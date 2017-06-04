<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\NexmoMessage;
use App\Event;
use App\User;
class tomEvent extends Notification
{
    use Queueable;

    protected $event;
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function via($notifiable)
    {
        return ['nexmo'];
    }

   
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                   ->content('You Have event Tomorrow'.$this->event->event_name);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
