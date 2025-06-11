<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{

    public function __construct($items){
        $this->items = $items;
    }

    public $items;

    public function render(): View|Closure|string{
        return view('components.pagination');
    }

}
