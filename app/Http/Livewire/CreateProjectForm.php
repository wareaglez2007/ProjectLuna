<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProjectForm extends Component
{
    public $project_count;

    public function render()
    {
        return view('livewire.project.create-project-form');
    }

    public function mount()
    {
        $this->project_count = 2;

    }
}
