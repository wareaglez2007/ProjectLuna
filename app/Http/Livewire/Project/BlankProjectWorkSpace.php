<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\TempData;
use App\Models\User;

class BlankProjectWorkSpace extends Component
{
    public int $count = 0; // if the count is zero, then  it should show no project
    public $project;
    public String $message = "";
    public bool $open = false; //Default to false
    protected $listeners = ['show_modal' => 'ShowCreateProjectForm'];
    public $user;
    /**
     * We will need some rules for validation
     */
    protected $rules = [

        'user' => 'required',
        'project.name' => 'required|min:2',
        'project.description' => 'required|min:2',
        'project.phase' =>  'required',
        'project.due_date' =>  'required',
        'project.priority' =>  'required'

    ];

    /**
     * Renders Components
     *
     * @return void
     */
    public function render()
    {
       $this->project = new Project();
        $this->count = $this->project->where('created_by', auth()->id())->count();

        return view(
            'livewire.project.blank-project-work-space',
            [
                'project' => $this->project->where('created_by', auth()->id())->get(),
                'count' => $this->count,
                'message' => $this->message,
                'open' => $this->open,
                'user' => auth()->id(),
            ]
        );
    }

    /**
     * ShowCreateProjectForm
     */
    public function ShowCreateProjectForm()
    {
        $this->open = true;
        $this->user = auth()->id();
    }
}
