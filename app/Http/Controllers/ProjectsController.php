<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects-list');
    }

    public function createProject()
    {   
        return Request::all();
        // $project = new Project();
        // $project->content = '';
        // $project->finish = 0;
        // $project->start_at = '2020-05-21';
        // $project->title = 'first project';
        // $project->user()->associate(Auth::user());
        // $project->save();

        
        //return ['project' => $project];
    }

    public function getProjects()
    {
        $user = Auth::user();

        return ['projects' => $user->projects];
    }

    public function open($id)
    {
        $project = Project::find($id);

        return $project;
    }
}
