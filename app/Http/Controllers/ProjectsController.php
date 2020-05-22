<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects-list');
    }

    public function createProject()
    {
        $project = new Project();
        $project->content = '';
        $project->finish = 0;
        $project->start_at = '2020-05-21';
        $project->title = 'first project';
        $project->user()->associate(Auth::user());
        $project->save();
    }

    public function open($id)
    {
        $project = Project::find($id);

        return $project;
    }
}
