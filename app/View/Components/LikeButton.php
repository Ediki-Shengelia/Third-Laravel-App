<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LikeButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $market;
    public function __construct($market)
    {
        $this->market = $market;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.like-button');
    }
}
