<?php

namespace App\View\Components\Pemesanan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class button extends Component
{
    /**
     * Create a new component instance.
     */

     public $konten;
     public $idButton;

    public function __construct($konten, $idButton)
    {
        $this->konten = $konten;
        $this->idButton = $idButton;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pemesanan.button');
    }
}
