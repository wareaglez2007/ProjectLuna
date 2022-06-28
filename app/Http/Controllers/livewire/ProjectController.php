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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $temp = $tempData->where('user_id', Auth::user()->id)->first();
       // dd($request);
        if ($temp ==  null) {
            // $tempData->name = "";
            // $tempData->description = "";
            // $tempData->phase = "Not Started";
            // $tempData->due_date = date('Y-m-d H:i:s');
            // $tempData->priority = "Unlabled";
            $temp = $tempData;
        }
        $user = $this->getUserProperty();
        return view('livewire.project.show', [

            'projects' => Project::whereBelongsTo($user)->latest()->paginate(6),
            'user' => $request->user()->id,
            'temp_data' => $temp
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
