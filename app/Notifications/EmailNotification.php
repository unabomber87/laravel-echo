<?php

namespace App\Notifications;

use App\Group;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    private $group;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Group $group)
    {
        //
        $this->group = $group;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    public function broadcast($notifiable)
    {
        return (new BroadcastMessage([
            'time' => time(),
            'group' => $this->group->id,
        ]));
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
