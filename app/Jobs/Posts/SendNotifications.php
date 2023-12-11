<?php

namespace App\Jobs\Posts;

use App\Enums\PreferencesEnum;
use App\Jobs\BasePostJob;
use App\Models\Post;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewPost;
use App\Managers\User\Preference\UserPreferenceManager;

class SendNotifications extends BasePostJob
{
    protected $__UserPreferenceManager;

    public function __construct(Post $post)
    {
        parent::__construct($post);
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function handle()
    {
        $allFollowers = $this->post->author->followers->pluck('user');

        $notifcationUsers = [];

        foreach ($allFollowers as $user) {
            if ($this->__UserPreferenceManager->getUserPreference(PreferencesEnum::COMMUNICATIONS_NEW_POST, $user) == 'true') {
                array_push($notifcationUsers, $user);
            }
        }

        if (!empty($notifcationUsers)) {
            Notification::send(collect($notifcationUsers), new NewPost($this->post));
        }
    }
}
