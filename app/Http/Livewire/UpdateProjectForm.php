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

    protected $listeners = ['refreshComponent' => 'refreshComponent'];
    public function refreshComponent()
    {
        /**Refresh */
    }

    public function render(Project $project)
    {
        $user = $this->getUserProperty();
        return view('livewire.project.update-project-form', ['projects' => Project::whereBelongsTo($user)->latest()->paginate(3)]);
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
}
