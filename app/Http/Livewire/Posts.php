<?php

namespace App\Http\Livewire;

use App\Models\PostComment;
use App\Post;
use Livewire\Component;
use Auth;

class Posts extends Component
{
    public $post_content;

    protected $rules = [
        'post_content' => 'required'
    ];

    public function render()
    {
        
        return view('feed.components.new-feed-post');
    }

    public function save_post()
    {
        $this->validate();

        Post::create([
            'post_content' => $this->post_content,
            'user_id' => 1
        ]);

    }

    public function reply($commentId)
    {
        $this->replyCommentId = $commentId;
    }
}
