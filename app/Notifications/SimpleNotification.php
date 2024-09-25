<?php

namespace App\Notifications;

use Closure;
use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SimpleNotification extends Notification
{
    use Queueable;

    public static function make(Closure $modify_mail_using): static
    {
        return new static($modify_mail_using);
    }

    /**
     * Create a new notification instance.
     */
    public function __construct(public Closure $modify_mail_using)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $closure = $this->modify_mail_using;
        $m = new MailMessage;

        $closure($m);

        return $m;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
