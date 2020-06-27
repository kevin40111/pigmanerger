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

    public function createOrUpdateProeject()
    {
        $project = Project::updateOrCreate(['id' => Request::input('id')], array_merge(Request::all(), ['user_id' => Auth::id()]));

        return $this->getProjects();
    }

    public function getProjects()
    {
        $user = Auth::user();

        return ['projects' => $user->projects];
    }

    public function deleteProjects()
    {
        Project::where('id', Request::input('deleted'))->where('user_id', Auth::id())->delete();

        return $this->getProjects();
    }
}
