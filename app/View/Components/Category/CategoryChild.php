<?php

namespace App\View\Components\Category;

use Illuminate\View\Component;

class CategoryChild extends Component
{

    public $childs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($childs)
    {
        $this->childs = $childs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category.category-child');
    }
}
