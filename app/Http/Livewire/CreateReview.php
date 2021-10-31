<?php

namespace App\Http\Livewire;

use App\Review;
use App\User;
use Livewire\Component;

class CreateReview extends Component
{
    public $rating;
    public $description;
    public $company_id;
    public $author_id;
    public $created;

    protected $rules = [
        'rating' => 'required|numeric|min:1|max:5',
        'description' => 'required',
        'company_id' => 'required|numeric',
        'author_id' => 'required|numeric'
    ];

    public function mount(User $company, User $author) {
        $this->company_id = $company->id;
        $this->author_id = $author->id;
        $this->rating = 0;
        $this->created = false;
    }

    public function render()
    {
        return view('livewire.create-review');
    }

    public function save() {
        $this->validate();
        $review = Review::create([
            'company_id' => $this->company_id,
            'author_id' => $this->author_id,
            'rating' => $this->rating,
            'description' => $this->description,
            'approved' => false
        ]);
        if ($review)
        {
            $this->description = "";
            $this->rating = 0;
            $this->created = true;
        }        
    }
}
