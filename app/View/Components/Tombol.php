<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tombol extends Component
{
    /**
     * Create a new component instance.
     */
    public $pesan = "Pesan";

    public function __construct($pesan)
    {
        $this->pesan = $pesan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tombol');
    }
}
