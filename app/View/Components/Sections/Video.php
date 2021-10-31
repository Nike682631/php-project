<?php

namespace App\View\Components\Sections;

use Illuminate\View\Component;

class Video extends Component
{

    public $image;
    public $videoURL;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $videoURL)
    {
        $this->image = $image;
        $this->videoURL = $videoURL;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sections.video');
    }
}
