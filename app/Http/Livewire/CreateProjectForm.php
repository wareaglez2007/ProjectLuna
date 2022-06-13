<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\SoftDeletes;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class CreateProjectForm extends Component
{
    //use SoftDeletes;
    //use WithPagination;

    public $project_count;
    public $project_phase = null;
    public Project $project;
    public $date;
    public $label;
    public $list_projects;
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
    public $selectedPhase;
    public function render()
    {
        return view('livewire.project.create-project-form');
    }

    public function mount()
    {
        $this->project = new Project();
        $this->list_projects = $this->AllProjects();
    }
    public function save()
    {
        $this->validatedData = $this->validate();
        $this->project->created_by = Auth::user()->id;
        $this->project->assinged_to =  Auth::user()->id;
        $this->project->reassigned_by = Auth::user()->id;
        $this->project->save();
        $this->project->name = null;
        $this->project->description = null;
        $this->project->phase = null;
        $this->date = null;
        $this->label = null;
        $this->emit('saved',['project_phase' => $this->project_phase]);
        $this->emit('refresh-navigation-menu');

    }

    public function Test()
    {
        //return $this->project = $project;
    }

    public function AllProjects(){
        return $this->project->get();
    }
}
