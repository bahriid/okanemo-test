<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('home.index')->layoutData([
            'title' => 'Home',
            'breadcrumb' => null
        ]);
    }
}
