<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Project;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


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

    /**
     * Public properties
     */
    public $project; //Use this for updating values
    public $p_id; // use this to get the ID
    protected $listeners = ['refreshComponent' => 'refreshComponent', 'confirmingUserDeletion' => 'confirmingUserDeletion'];
    public $confirmingUserDeletion = false;
    /** Protected Vars */
    protected $validatedData;
    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [

        'project.user_id' => 'required',
        'project.name' => 'required|min:2',
        'project.description' => 'required|min:2',
        'project.phase' =>  'required',
        'project.due_date' =>  'required',
        'project.priority' =>  'required',
        'project.id' => 'numeric'

    ];

    public function refreshComponent()
    {
        /**Refresh */
    }
    /**
     * Livewire default function call
     */
    public function updated($propertyName, $value)
    {

        $this->validateOnly($propertyName);
    }
    /**
     * Mount
     *
     * @param Project $project
     * @return void
     */
    public function mount($id)
    {
        $this->project = new Project();
        $this->project->id = $id;
    }
    /**
     * Render
     *
     * @param Project $project
     * @return void
     */
    public function render()
    {
        $user = $this->getUserProperty();
        return view('livewire.project.update-project-form', [
            'projects' => Project::whereBelongsTo($user)->latest()->paginate(6),
            'user' => $user,
            'project' => $this->project,
            'id' => $this->project->id ?? null


        ]);
    }
    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Update or Edit function
     * When button for edit is clikced
     */
    public function edit($id)
    {
        $this->confirmingUserDeletion = true;
        $pt = new Project();
        $this->project = $pt->find($id);
    }

    public function confirmingUserDeletion()
    {
        $this->confirmingUserDeletion = true;
    }

    public function show_item()
    {
        return redirect()->to('/secured/projects/' . $this->project->id . '');
    }
}
