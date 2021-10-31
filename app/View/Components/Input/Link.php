<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Link extends Component
{

    public $link;
    public $target;
    public $class;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link = "", $target = "_self", $class = "", $type = "link")
    {
        $this->type = $type;
        $this->link = $link;   
        $this->target = $target;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input.link');
    }
}
