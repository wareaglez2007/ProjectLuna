<?php

namespace App\Http\Controllers\livewire;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\TempData;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    use WithPagination;
    public $show_all = true;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, Request $request, TempData $tempData)
    {
        $this->show_all = true; //always true here
        $temp = $tempData->where('user_id', Auth::user()->id)->first();

        if ($temp ==  null) {
            $temp = $tempData;
        }
        $user = $this->getUserProperty();
        return view('livewire.project.show', [

            'projects' => Project::whereBelongsTo($user)->latest()->paginate(6),
            'user' => $request->user()->id,
            'temp_data' => $temp,
            'project' => '',
            'single_project' => '',
            'flag' => $this->show_all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Request $request, TempData $tempData)
    {
        $item = $project->find($request->pr_id);
    //    dd($item);
        $this->show_all = false;
        if ($item ==  null) {
            $item = $project;
        }
        $user = $this->getUserProperty();
        return view('livewire.project.show', [

            'projects' => Project::whereBelongsTo($user)->latest()->paginate(6),
            'user' => $request->user()->id,
            'temp_data' => $item,
            'project' => $item,
            'flag' => $this->show_all,
            'pr_id' => $request->pr_id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
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
