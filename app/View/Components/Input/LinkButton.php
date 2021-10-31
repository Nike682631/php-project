<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class LinkButton extends Component
{

    public $text;
    public $link;
    public $target;                 // _blank|_self|_parent|_top
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $link, $target = "_self", $color = "primary")
    {
        $this->text = $text;
        $this->link = $link;   
        $this->target = $target;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input.link-button');
    }
}
