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
    protected $listeners = ['show_modal' => 'ShowCreateProjectForm', 'saved' => 'updateCount'];
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
        $this->message = $this->updateCount();

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

    public function updateCount()
    {
        $p_count = $this->project->where('created_by', auth()->id())->count();
        if ($p_count == 1) {
            $p_message = "You have 1 project.";
        } else if ($p_count > 1) {
            $p_message = "You have " . $p_count . " projects.";
        } else {
            $p_message = "You have no projects.";
        }
        return $p_message;
    }
}
