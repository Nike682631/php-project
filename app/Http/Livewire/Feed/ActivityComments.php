<?php

namespace App\Http\Livewire\Feed;

use Livewire\Component;

class ActivityComments extends Component
{
    protected $rules = [
        'username' => 'required',
        'comment_text' => 'required'
    ];

    public function render()
    {

        return view('feed.components.comments.comments');

    }

    public function save_comment()
    {
        $this->validate();

        PostComment::create([
            'post_id' => $this->postId,
            'username' => $this->username,
            'comment_text' => $this->comment_text,
            'parent_id' => $this->replyCommentId
        ]);

        $this->username = '';
        $this->comment_text = '';
        $this->replyCommentId = NULL;
    }

    public function reply($commentId)
    {
        $this->replyCommentId = $commentId;
    }
}
