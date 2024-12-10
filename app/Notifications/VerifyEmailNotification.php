<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    public $verificationUrl;

    public function __construct($verificationUrl)
    {
        $this->verificationUrl = $verificationUrl;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Verify Your Email Address')
                    ->greeting('Hello, ' . $notifiable->name . '!')
                    ->line('Please click the button below to verify your email address.')
                    ->action('Verify Email', $this->verificationUrl)
                    ->line('If you did not create an account, no further action is required.');
    }
}
