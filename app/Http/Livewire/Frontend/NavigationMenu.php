<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class NavigationMenu extends Component
{
    public $menu_attributes = [

    ];
    public function render()
    {
        return view('livewire.frontend.navigation-menu');
    }
}
