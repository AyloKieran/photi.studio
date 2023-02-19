<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class CommentBox extends Component
{
    public $post;
    public $canSubmit = false;
    public $comment = "";
    public $length = 0;
    public $minLength = 5;
    public $maxLength = 300;

    public function save()
    {
        if ($this->canSubmit) {
            $this->post->comments()->create([
                'user_id' => auth()->user()->id,
                'commentText' => $this->comment
            ]);
            $this->comment = "";
            $this->length = 0;
            $this->canSubmit = false;
            $this->emit('refreshComments');
        }
    }

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $this->length = strlen($this->comment);
        $this->canSubmit = $this->length >= $this->minLength && $this->length <= $this->maxLength;
        return view('livewire.post.comment-box');
    }
}
