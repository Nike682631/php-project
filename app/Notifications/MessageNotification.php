<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Log;

class MessageNotification extends Notification
{
    use Queueable;
    private $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($receiver)
    {
        $sender = auth()->user()->name;
        $this->details['greeting'] = `Hi {$receiver->name}`;
        $this->details['body'] = 'You have a new message.\n';
        $this->details['info'] = `{$sender} just messaged you.`;
        $this->details['actionText'] = 'View Message';
        $this->details['actionURL'] = url('/message/1');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->details['greeting'])
                    ->line($this->details['body'])
                    ->line($this->details['info'])
                    ->action($this->details['actionText'], $this->details['actionURL']);
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

    /**

     * Get the array representation of the notification.

     *

     * @param  mixed  $notifiable

     * @return array

     */

    public function toDatabase($notifiable)
    {
        Log::info("test log", ['notifiable' => $notifiable]);
        return [
            "sender" => auth()->user()->email
        ];
    }
}
