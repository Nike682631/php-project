<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\User;

class AllProducts extends Component
{
    public $perPage = 9;
    public $userId;
    public $order = 'desc';

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount(User $user)
    {
        $this->userId = $user->id;
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 9;
    }

    public function render()
    {
        $user = User::findOrFail($this->userId);
        $products = $user->products()->orderBy('price_from', $this->order)->paginate($this->perPage);
        
        return view('livewire.products.all-products', ['products' => $products]);
    }
}
