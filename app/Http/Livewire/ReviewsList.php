<?php

namespace App\Http\Livewire;
use App\Review;
use App\User;

use Livewire\Component;

class ReviewsList extends Component
{
    public $user;
    public $amount;
    public $offset;
    public $reviews;
    public $showLoadMoreButton;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->amount = 2;
        $this->offset = 0;
        $this->loadReviews();
    }

    public function render()
    {
        return view('livewire.reviews-list');
    }

    public function loadReviews()
    {
        $reviews = $this->user->reviews()->orderByDesc('created_at')->offset($this->offset)->limit($this->amount)->get();
        $this->reviews = isset($this->reviews) ? $this->reviews->merge($reviews) : $reviews;
        $this->offset += $this->amount;
        $this->showLoadMoreButton = $this->user->reviews()->count() > $this->offset;
    }
}
