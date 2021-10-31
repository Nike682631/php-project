<?php

namespace App\Notifications;

use App\Category;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class MatchMade extends Notification
{
    use Queueable;

    public $category;
    public $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Category $category, $type)
    {
        $this->category = $category;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        Log::info("Here is new notification sender Mail");
        Log::info($this->category);
        Log::info($this->type);
        Log::info($notifiable);

        return (new MailMessage)->view(
                    'emails.match-made', 
                    ['category' => $this->category, 'buyer' => $notifiable, 'type' => $this->type]
                );
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
