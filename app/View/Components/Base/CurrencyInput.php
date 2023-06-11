<?php

namespace App\View\Components\Base;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CurrencyInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $allow_minus = false;

    public function __construct($allowMinus = false)
    {
        $this->allow_minus = $allowMinus;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.currency-input', [
            'allow_minus' => $this->allow_minus,
        ]);
    }
}
