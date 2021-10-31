<?php

namespace App\View\Components\Headers;

use Illuminate\View\Component;

class CompanyCertificate extends Component
{

    public $certificate;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($certificate)
    {
        $this->certificate = $certificate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.headers.company-certificate');
    }
}
