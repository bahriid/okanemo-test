<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $list;

    public $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($list, $link = null)
    {
        $this->list = $list;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.breadcrumb');
    }
}
