<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLike extends Notification
{
    use Queueable;

    protected Post $post;
    protected User $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
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
            ->subject(__('You have a new like!'))
            ->greeting(__('Howdy :name!', ['name' => $notifiable->preferred_name]))
            ->line(__(':profile liked your post titled \':title\'.', ['profile' => $this->user->preferred_name, 'title' => $this->post->title]))
            ->line(__('The post now has a score of :score.', ['score' => $this->post->rating]))
            ->line(__('You can view the post by clicking the button below.'))
            ->action(__('View Post'), route('post', $this->post));
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
