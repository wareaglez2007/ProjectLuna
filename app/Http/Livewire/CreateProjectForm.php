<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\SoftDeletes;
use Livewire\Component;
use Livewire\WithPagination;

class CreateProjectForm extends Component
{
   // use SoftDeletes;
    //use WithPagination;

    public $project_count;
    public $project = ['name' => 'rostom'];


    /**
     * Parameters for projects
     * 1. name ->project table ****
     * 2. description (details)->project table ****
     * 3. project documents
     * 4. project due date ->project table ****
     * 5. project point of contacts ->project table ****
     * 6. assets -> separate module which project should use
     * 7. contracts
     * 8. permits
     * 9. location (address) (additional tables)
     * 10. insurance
     * 11. polocies
     * 12. project cost
     * 13. discounts
     * 14. risk assessments
     * 15. project phase
     * 16. suppliers -> seperate module
     * 17. issues
     * 18. employees
     * 19. unique features
     * 20. site blue print
     * 21. images ->project table ****
     * 22. progress  ->project table ****
     * 23. daily jurnals
     * 24. roles & responsibilities
     * 25. timesheets
     * 26. tasks
     * 27. created by
     * 28. update by
     * 29. soft delete
     * 30. status ****
     * 31. priority ****
     * 32. assigned to
     * 33. reminders
     */

    public $name = '';
    public $description = '';
    public $due_date = null;
    public $status = [
        'Not Started',
        'In Progress',
        'On Hold',
        'Pending Customer',
        'Pending Supplier',
        'Pending Other',
        'Completed',
        'Cancelled',
        'Resolved',
        'Delayed',
        'On Time'
    ];
    public $priority = [
        'Low',
        'Medium',
        'High'
    ];
    public function render()
    {
        return view('livewire.project.create-project-form');
    }

    public function mount()
    {
        $this->project_count = 2;
    }

    /**
     * add function will add new project
     */
    // public function add()
    // {
    //     # code...
    // }

    public function Test($project)
    {
        return $this->project = $project;
    }
}
