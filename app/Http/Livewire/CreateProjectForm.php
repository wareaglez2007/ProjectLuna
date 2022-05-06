<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\SoftDeletes;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class CreateProjectForm extends Component
{
    // use SoftDeletes;
    //use WithPagination;

    public $project_count;
    public Project $project;

    protected $rules = [
        'project.name' => 'required|string|min:6',
        'project.description' => 'required|string|max:500',
        'project.phase' => 'required|string|max:100'
    ];
    public $selectedPhase;
    public function render()
    {
        return view('livewire.project.create-project-form');
    }

    public function mount()
    {
        $this->project = new Project();
    }
    public function save()
    {
        // $this->validate();

        $this->project->created_by = Auth::user()->id;
        $this->project->assinged_to =  Auth::user()->id;
        $this->project->reassigned_by = Auth::user()->id;
        $this->project->save();


        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
        //return redirect()->route('project.show');
    }

    /**
     * add function will add new project
     */
    // public function add()
    // {
    //     # code...
    // }

    public function Test()
    {
        //return $this->project = $project;
    }
}
