<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProject;
use App\Http\Requests\Project\UpdateProject;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Project::class);

        $projects = Project::paginate(20);

        return view('project.index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Project::class);

        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request)
    {
        $this->authorize('create', Project::class);

        $project = new Project($request->all());
        $project->save();
        session()->flash('success', 'Project created');

        return redirect()->route('projects.edit', ['id' => $project->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return redirect()->route('projects.edit', ['id' => $project->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('project.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project      $project
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProject $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->update($request->all());
        session()->flash('success', 'Project updated');

        return redirect()->route('projects.edit', ['id' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $projectName = $project->name;
        $project->delete();
        session()->flash('success', "Project '{$projectName}' deleted");

        return redirect()->route('projects.index');
    }
}
