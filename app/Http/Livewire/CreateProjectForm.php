<?php

/**
 * Author: Rostom Sahakian
 * Project Name: Luna - Livewire & Laravel Jetstream
 * This componetnt creates new projects for user
 * it saves the data in a temp table and upon submission,
 * it saves that data into projects table.
 * uodated: 07-01-2022
 */

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\SoftDeletes;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use App\Models\TempData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    public $user;
    public $temp = [];
    public $temp_data;
    public $td;
    public $due_date_options = null;

    /** Protected Vars */
    protected $validatedData;
    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [

        'user' => 'required',
        'temp_data.name' => 'required|min:2',
        'temp_data.description' => 'required|min:2',
        'temp_data.phase' =>  'required',
        'temp_data.due_date' =>  'required',
        'temp_data.priority' =>  'required',

    ];
    /**
     * Event listeners
     *
     * @var array
     */
    protected $listeners = [
        'reset-form' => 'resetValues',
        'savetempPhase' => 'savetempPhase',
        'savetempduedate' => 'savetempduedate',
        'savetempPriority' => 'savetempPriority'
    ];

    /**
     * Livewire default function call
     */
    public function updated($propertyName, $value)
    {

        $this->validateOnly($propertyName);
    }
    /**
     * Renders the components and shows the view
     *
     * @return void
     */
    public function render()
    {
        $query = TempData::where('user_id', auth()->id())->first();
        return view('livewire.project.create-project-form', ['temp_data' => $query, 'flag' => true]);
    }
    /** Mount Model to the view */
    public function mount(Request $request, $temp_data)
    {
        $this->user = auth()->id(); //Better use of it
        $this->project = new Project();
        $this->temp_data = $temp_data;
    }
    /**
     * Functions that will call temp save data
     * these utilize the evnet listenrs and then call the function savetemp()
     * @return void
     */
    public function savetempPhase()
    {
        $this->savetemp($this->temp_data->phase);
    }
    public function savetempduedate()
    {
        $this->savetemp($this->temp_data->due_date);
    }
    public function savetempPriority()
    {
        $this->savetemp($this->temp_data->priority);
    }
    /**
     * Saves the temporary data in temp table
     *  If user id data is in temp table then just update
     *  otherwise create a new record.
     * @return void
     */
    public function savetemp($data = null)
    {
        $this->temp_data->user_id = $this->user;

        $this->temp =  new TempData();
        if ($this->temp->where('user_id', auth()->id())->first() != null) {
            $this->temp->where('user_id', $this->user)->update([
                'name' => $this->temp_data->name ?? " ",
                'description' => $this->temp_data->description ?? " ",
                'phase' => $this->temp_data->phase,
                'priority' => $this->temp_data->priority,
                'due_date' => $this->temp_data->due_date,

            ]);
        } else {
            $this->temp_data->create([
                'name' => $this->temp_data->name ?? " ",
                'description' => $this->temp_data->description ?? " ",
                'phase' => $this->temp_data->phase,
                'priority' => $this->temp_data->priority,
                'due_date' => $this->temp_data->due_date,
                'user_id' => auth()->id()
            ]);
        }
    }

    /** Save data to Database */
    public function save(Request $request)
    {
        /** Validated data get saved */
        $this->validatedData = $this->validate();
        $this->project->created_by = Auth::user()->id;
        $this->project->assinged_to =  Auth::user()->id;
        $this->project->reassigned_by = Auth::user()->id;
        $this->project->create([
            "name" => $this->validatedData['temp_data']["name"],
            "description" => $this->validatedData['temp_data']["description"],
            "phase" => $this->validatedData['temp_data']["phase"],
            "priority" => $this->validatedData['temp_data']["priority"],
            "due_date" => $this->validatedData['temp_data']["due_date"],
            "assinged_to" => $this->project->assinged_to,
            "reassigned_by" =>  $this->project->reassigned_by,
            "created_by" => $this->project->created_by,
        ]);

        /** Reset vars for save */
        $this->reset(['project', 'date', 'label', 'temp_data']);
        /**
         * Event listener saved is called...
         */
        $this->emit('saved');
        /** POST SAVE */
        /** Reset Values for the next submissions */
        $this->project = new Project();
        $this->list_projects = $this->project->getall();
        //This ensures that the compontent is refreshed so it shows the added values.
        $this->emit('refreshComponent', ['projects' => $this->list_projects]);
        /**
         * Delete the temp
         */
        $this->resetValues();
    }
    /**
     * Reseting values for temp
     *
     * @return void
     */
    public function resetValues()
    {
        $this->resetErrorBag(); //Resets errors in component
        $this->temp_data = new TempData();
        $this->temp_data->where('user_id', auth()->id())->delete();
    }
}
