<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\SoftDeletes;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use App\Models\TempData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

    /** Protected Vars */
    protected $validatedData;
    protected $rules = [

        'user' => 'required',
        'temp_data.name' => 'required',
        'temp_data.description' => 'required',
        'temp_data.phase' => 'required',
        'temp_data.due_date' => 'required',
        'temp_data.priority' => 'required|string',

    ];
    protected $listeners = [
        'reset-form' => 'resetValues',
        'savetempPhase' => 'savetempPhase',
        'savetempduedate' => 'savetempduedate',
        'savetempPriority' => 'savetempPriority'
    ];


    public function updated($propertyName, $value)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $query = TempData::where('user_id', Auth::user()->id)->first();
        return view('livewire.project.create-project-form', ['temp_data' => $query]);
    }
    /** Mount Model to the view */
    public function mount(Request $request, $temp_data)
    {
        $this->user = $request->user()->id;
        $this->project = new Project();
        $this->temp_data = $temp_data;

    }

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
    public function savetemp($val = null)
    {
        $this->temp_data->name = $this->temp_data->name ?? "";
        $this->temp_data->description = $this->temp_data->description ?? "";
        $this->temp_data->phase = $this->temp_data->phase ?? "Select Phase";
        $this->temp_data->priority = $this->temp_data->priority ?? "Unlabelled";
        $this->temp_data->due_date = $this->temp_data->due_date ?? Carbon::now()->format('Y-m-d H:i:s');
        $this->temp_data->user_id = $this->user;

        $this->temp =  new TempData();
        if ($this->temp->where('user_id', Auth::user()->id)->first() != null) {
            $this->temp->where('user_id', $this->user)->update([
                'name' => $this->temp_data->name,
                'description' => $this->temp_data->description,
                'phase' => $this->temp_data->phase,
                'priority' => $this->temp_data->priority,
                'due_date' => $this->temp_data->due_date,

            ]);
        } else {
            $this->temp_data->save();
        }
    }

    /** Save data to Database */
    public function save()
    {
        /** Validated data get saved */
        $this->validatedData = $this->validate();

        $this->project->created_by = Auth::user()->id;
        $this->project->assinged_to =  Auth::user()->id;
        $this->project->reassigned_by = Auth::user()->id;
        $this->project->create([
            "name" => $this->temp_data->name,
            "description" => $this->temp_data->description,
            "phase" => $this->temp_data->phase,
            "priority" => $this->temp_data->priority,
            "due_date" => $this->temp_data->due_date,
            "assinged_to" => $this->project->assinged_to,
            "reassigned_by" =>  $this->project->reassigned_by,
            "created_by" => $this->project->created_by,
        ]);

        /** Reset vars for save */
        $this->reset(['project', 'date', 'label','temp_data']);
        $this->emit('saved');
        /** POST SAVE */
        /** Reset Values for the next submissions */
        $this->project = new Project();
        $this->list_projects = $this->project->getall();
        $this->emit('refreshComponent', ['projects' => $this->list_projects]);
        /**
         * Delete the temp
         */

        $this->temp_data = new TempData();
        $this->list_projects = $this->temp_data::all();
        $this->temp_data->where('user_id', Auth::user()->id)->delete();
        $this->emit('refreshComponent', ['temp_data' => $this->list_projects]);


    }

    public function resetValues()
    {

        if ($this->temp_data->name != null) {
            $this->temp_data->name = null;
            $this->temp_data->description = null;
            $this->temp_data->due_date = null;
            $this->temp_data->phase = null;
            $this->temp_data->priority = null;
        } else {
            //do nothing
        }
    }
}
