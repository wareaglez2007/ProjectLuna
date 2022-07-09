<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowSingleProjectForm extends Component
{
    public $project;
    public function render()
    {
        return view('livewire.project.show-single-project-form');
    }
}
