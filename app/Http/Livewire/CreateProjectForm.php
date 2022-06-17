<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\SoftDeletes;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class CreateProjectForm extends Component
{
    /** Public Vars */
    public $project_count;
    public $project_phase = null;
    public $project;
    public $date;
    public $label;
    public $list_projects;
    public $selectedPhase;
    public $show_projects;
    /** Protected Vars */
    protected $validatedData;
    protected $rules = [
        'project.name' => ['required','string','min:6'],
        'project.description' => 'required|string|max:500',
        'project.phase' => 'required|string|max:100',
        'date' => 'required|date',
        'label' => 'required|string'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.project.create-project-form');
    }
    /** Mount Model to the view */
    public function mount()
    {
        $this->project = new Project();
    }

    /** Save data to Database */
    public function save()
    {
        /** Validated data get saved */
        $this->validatedData = $this->validate();
        $this->project->created_by = Auth::user()->id;
        $this->project->assinged_to =  Auth::user()->id;
        $this->project->reassigned_by = Auth::user()->id;
        $this->project->save();
        /** Reset vars for save */
        $this->project->name = null;
        $this->project->description = null;
        $this->project->phase = null;
        $this->date = null;
        $this->label = null;
        $this->emit('saved');
        /** POST SAVE */
        /** Reset Values for the next submissions */
        $this->project = new Project();
        $this->list_projects = $this->project->getall();
        $this->emit('refreshComponent', ['projects' => $this->list_projects]);


    }

}
