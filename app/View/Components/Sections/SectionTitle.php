<?php

namespace App\View\Components\Sections;

use Illuminate\View\Component;

class SectionTitle extends Component
{

    public $subtext;
    public $text;
    public $tag;            // default-h3, h1, h2, h3, h4, h5, h6 .... 

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subtext = "", $text, $tag="h3")
    {
        $this->subtext = $subtext;
        $this->text = $text;
        $this->tag = $tag;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sections.section-title');
    }
}
