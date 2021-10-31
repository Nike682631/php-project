<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use App\Category;
use Illuminate\Support\Facades\Log;

class CategoryTree extends Component
{

    public $arrChecked = [];

    public function render()
    {
        return view('livewire.forms.category-tree', [
            'categories' => Category::topLevelCategories()->get()
        ]);
    }

    public function handleCheck($id) {
        $pos = array_search($id, $this->arrChecked);
        if ($pos > -1) {
            // Remove from array
            unset($this->arrChecked[$pos]);
        }else {
            array_push($this->arrChecked, $id);
        }

        $this->emitUp('updatedCategory', $this->arrChecked);
    }
}
