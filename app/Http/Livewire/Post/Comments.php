<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class Comments extends Component
{
    public $post;
    public $comments;

    protected $listeners = ['refreshComments' => 'refresh'];

    public function refresh()
    {
        $this->render();
    }

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $this->comments = $this->post->comments()->with('author')->orderBy('updated_at', 'DESC')->get();
        return view('livewire.post.comments');
    }
}
