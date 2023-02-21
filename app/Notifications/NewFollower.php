<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewFollower extends Notification
{
    use Queueable;

    protected User $profile;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $profile)
    {
        $this->profile = $profile;
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
        return (new MailMessage)
            ->subject(__('You have a new follower!'))
            ->greeting(__('Howdy :name!', ['name' => $notifiable->preferred_name]))
            ->line(__(':profile is now following you!', ['profile' => $this->profile->preferred_name]))
            ->line(__('This means that you now have :count follower(s)!', ['count' => $notifiable->followers->count()]))
            ->line(__('You can view their profile by clicking the button below.'))
            ->action(__('View :profile\'s Profile', ['profile' => $this->profile->username]), route('profile', $this->profile));
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
