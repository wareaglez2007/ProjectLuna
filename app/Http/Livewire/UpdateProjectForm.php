<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Project;
use Livewire\Component;

class UpdateProjectForm extends Component
{
    /** Public properties for Edit
     * Name
     * Description
     * Labels
     * Phase
     * label
     * Due date
     */
    use WithPagination;

    protected $listeners = ['refreshComponent' => 'refreshComponent'];
    public function refreshComponent()
    {
        /**Refresh */
    }

    public function render()
    {
        return view('livewire.project.update-project-form', ['projects' => Project::latest()->paginate(8)]);
    }
}
