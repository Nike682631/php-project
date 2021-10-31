<?php

namespace App\View\Components\Feed\Components;

use Illuminate\View\Component;

class ActivityCard extends Component
{


    public $item;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        //
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.feed.components.activity-card');
    }
}
