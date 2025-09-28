<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use PhpParser\Node\Expr\Cast\Object_;

class SignUpNotification extends Notification
{
    use Queueable;

    public function __construct() {}

    public function via(Object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(Object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting("Hello Dear {$notifiable->name},")
            ->line('Thank you for using our application!');
    }

    public function toArray(Object $notifiable): array
    {
        return [];
    }
}
