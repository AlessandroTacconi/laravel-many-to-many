<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;

use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $project = new Project();
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->image = $data['image'];
        $project->year = $data['year'];
        $project->category_id = $data['category_id'];


        $project->slug = Str::of($project->title)->slug('-');

        $project->save();

        return redirect()->route('admin.projects.show', ['project' => $project->slug])->with('message', 'proj creato con successo');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();

        return view('admin.projects.edit', compact('project', 'categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->image = $data['image'];
        $project->year = $data['year'];
        $project->category_id = $data['category_id'];
        $project->slug = Str::of($project->title)->slug('-');

        $project->update($data);

        return redirect()->route('admin.projects.show', ['project' => $project->slug])->with('message', 'proj aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
 
        $project_id = $project->id;
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', "Post $project_id cancellato correttamente");
    }
}