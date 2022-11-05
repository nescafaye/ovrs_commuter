<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Route;

class SearchComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $route = Route::get(['origin', 'destination']);
        return view('components.search-component', compact('route'));
    }
}
