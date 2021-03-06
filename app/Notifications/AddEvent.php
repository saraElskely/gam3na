<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Event;

class Addevent extends Notification
{
    use Queueable;

    protected $event;
    public function __construct(Event $event)
    {
        $this->event = $event;
    }


    public function via($notifiable)
    {
        return ['database'];
    }
    public function toArray($notifiable)
    {
        return [
        'data' =>'we Have  Event today '.$this->event->event_name];
    }
}
