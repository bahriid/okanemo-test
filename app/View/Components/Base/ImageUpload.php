<?php

namespace App\View\Components\Base;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageUpload extends Component
{

    public $image;

    public $thumbnail;

    public $label;

    public $model;

    public $remove;

    public function __construct(
        $image, $thumbnail, $label, $model, $remove
    ) {
        $this->image = $image;
        $this->thumbnail = $thumbnail;
        $this->label = $label;
        $this->model = $model;
        $this->remove = $remove;
    }

    public function render(): View|Closure|string
    {
        return view('components.base.image-upload');
    }
}
